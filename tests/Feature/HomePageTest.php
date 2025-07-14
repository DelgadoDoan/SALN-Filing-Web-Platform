<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_is_redirected_to_login_page()
    {
        $response = $this->get('/home');
        $response->assertRedirect('/login');
    }

}
