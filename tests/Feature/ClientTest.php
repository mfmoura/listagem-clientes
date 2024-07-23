<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
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
    public function test_index($token)
    {
        $response = $this->get(
            '/api/v1/client',
            ['Authorization' => "Bearer {$token}"]
        );

        $response->assertStatus(200);
    }

    /**
     * @depends test_login
     */
    public function test_store($token)
    {
        $response = $this->post(
            '/api/v1/client',
            [
                "name" => fake()->name(),
                "email" => fake()->email(),
                "address" => fake()->address(),
                "position" => fake()->jobTitle(),
                "income" => fake()->randomFloat(2, 1024, 999999.99)
            ],
            ['Authorization' => "Bearer {$token}"]
        );

        $response->assertStatus(201);

        return $response->json('data.id'); 
    }

    /**
     * @depends test_login
     * @depends test_store
     */
    public function test_show($token, $id)
    {
        $response = $this->get(
            "/api/v1/client/{$id}",
            ['Authorization' => "Bearer {$token}"]
        );

        $response->assertStatus(200);
    }

    /**
     * @depends test_login
     * @depends test_store
     */
    public function test_update($token, $id)
    {
        $response = $this->put(
            "/api/v1/client/{$id}",
            [
                "name" => fake()->name(),
                "email" => fake()->email(),
                "address" => fake()->address(),
                "position" => fake()->jobTitle(),
                "income" => fake()->randomFloat(2, 1024, 999999.99)
            ],
            ['Authorization' => "Bearer {$token}"]
        );

        $response->assertStatus(200);
    }

    /**
     * @depends test_login
     * @depends test_store
     */
    public function test_delete($token, $id)
    {
        $response = $this->delete(
            "/api/v1/client/{$id}",
            [],
            ['Authorization' => "Bearer {$token}"]
        );

        $response->assertStatus(204);
    }
}
