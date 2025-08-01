<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        
        $response = $this->get('/home');
        $response->assertOk();

        $this->assertDatabaseHas('salns', [
            'user_id' => $user->id,
        ]);
    }

    public function test_guest_is_redirected_to_login_page()
    {
        $this->assertGuest();

        $response = $this->get('/home');
        $response->assertRedirect('/login');
    }
}
