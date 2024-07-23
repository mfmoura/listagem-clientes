<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{

    public function test_login()
    {
        $response = $this->post('/api/auth/login', [
            "email" => "admin@admin.com",
            "password" => "456789"
        ]);

        $response->assertStatus(200);

        return $response->json('access_token');
    }

    /**
     * @depends test_login
     */
    public function test_refresh($token)
    {
        $response = $this->post(
            '/api/auth/refresh', 
            [],
            ['Authorization' => "Bearer {$token}"]
        );

        $response->assertStatus(200);
        return $response->json('access_token');
    }

    /**
     * @depends test_refresh
     */
    public function test_me($token)
    {
        $response = $this->post(
            '/api/auth/me',
            [],
            ['Authorization' => "Bearer {$token}"]
        );

        $response->assertStatus(200);
    }

    /**
     * @depends test_refresh
     */
    public function test_logout($token)
    {
        $response = $this->post('/api/auth/logout',
            [],
            ['Authorization' => "Bearer {$token}"]
        );

        $response->assertStatus(200);
    }
}
