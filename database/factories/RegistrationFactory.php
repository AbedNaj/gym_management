<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Gym;
use App\Models\plans;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //    'plans_id' => plans::factory(),
            //    'gym_id' => Gym::factory(),
            //    'customer_id' => Customer::factory(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),

        ];
    }
}
