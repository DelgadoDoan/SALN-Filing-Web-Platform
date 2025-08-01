<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Support\Str;

use App\Models\User;
use App\Models\MagicToken;

class SignupTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_signup_page(): void {
        $response = $this->get('/signup');

        $response->assertOk();
    }

    public function test_user_signup(): void {
        $response = $this->post('/signup/magic-link', [
            'name' => 'example name',
            'email' => 'test@example.com',
        ]);

        $response->assertRedirectContains('/link-sent/');

        $user = User::where('email', 'test@example.com')->first();
        $this->assertNotNull($user);

        $magicToken = MagicToken::factory()->create([
            'user_id' => $user->id,
        ]);
        $this->assertNotNull($magicToken);

        $randomStr = Str::random(30);

        $response = $this->get("/magic-link/{$magicToken->id}/{$randomStr}");

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/home');
    }

    public function test_email_exists(): void {
        User::factory()->create([
            'email' => 'test@example.com',
        ]);

        $response = $this->post('/signup/magic-link', [
            'name' => 'example name',
            'email' => 'test@example.com',
        ]);
        $response->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_username_exists(): void {
        User::factory()->create([
            'name' => 'example name',
        ]);

        $response = $this->post('/signup/magic-link', [
            'name' => 'example name',
            'email' => 'test@example.com',
        ]);
        $response->assertSessionHasErrors('name');

        $this->assertGuest();
    }

    public function test_authenticated_is_redirected_to_home_on_signup(): void {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/signup');

        $response->assertRedirect('/home');
    }
}
