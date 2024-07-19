<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "address" => fake()->address(),
            "email" => fake()->email(),
            "position" => fake()->jobTitle(),
            "income" => fake()->randomFloat(2, 1024, 999999.99)
        ];
    }
}
