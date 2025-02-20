<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Freeze>
 */
class FreezeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'freeze_start_date' => fake()->dateTimeBetween('-1 months', 'now'),
            'freeze_end_date' => fake()->dateTimeBetween('now', '+1 months'),
            'registration_end_date' => fake()->dateTimeBetween('-1 months', '+1 months'),
            'freeze_duration' => fake()->numberBetween('1', '30'),
            'end_date_remening_days' => fake()->numberBetween('1', '30'),
            'status' => 'active'
        ];
    }
}
