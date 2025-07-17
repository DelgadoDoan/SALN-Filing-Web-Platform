<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\MagicToken;

class DeleteAccountTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_delete_account(): void {
        $user = User::factory()->create();

        $this->actingAs($user);

        $magicToken = MagicToken::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get('/home/delete-account');

        $response->assertRedirect('/login');
    }
}
