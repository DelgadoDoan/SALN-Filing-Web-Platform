<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\MagicToken;

class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_logout(): void {
        $user = User::factory()->create();

        $this->actingAs($user);

        $magicToken = MagicToken::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get('/home/logout');

        $this->assertGuest();

        $response->assertRedirect('/login');
    }
}
