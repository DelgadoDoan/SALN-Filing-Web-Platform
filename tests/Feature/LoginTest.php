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
}
