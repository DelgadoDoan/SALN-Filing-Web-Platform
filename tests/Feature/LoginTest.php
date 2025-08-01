<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Support\Str;

use App\Models\User;
use App\Models\MagicToken;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_login_page(): void {
        $response = $this->get('/login');

        $response->assertOk();
    }

    public function test_user_login(): void {
        $user = User::factory()->create();

        $email = $user->email;

        $response = $this->post('/login/magic-link', ['email' => $email]);
    
        $response->assertRedirectContains('/link-sent/');

        $magicToken = MagicToken::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertNotNull($magicToken);

        $randomStr = Str::random(30);

        $response = $this->get("/magic-link/{$magicToken->id}/{$randomStr}");

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/home');
    }

    public function test_login_if_no_account_exists(): void {
        $email = 'nonexistent@email.com';

        $response = $this->post('/login/magic-link', ['email' => $email]);
    
        $response->assertRedirectContains('/link-sent/');
    }

    public function test_authenticated_is_redirected_to_home_on_login(): void {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/login');

        $response->assertRedirect('/home');
    }
}
