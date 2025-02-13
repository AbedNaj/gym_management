<?php

namespace Database\Factories;

use App\Models\Gym;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\plans>
 */
class PlansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'duration_in_days' => fake()->randomElement(['30', '60', '90']),
            'price' => fake()->randomElement(['150', '300', '450']),
            //  'gym_id' => Gym::factory()
        ];
    }
}
