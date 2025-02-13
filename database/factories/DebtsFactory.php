<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Gym;
use App\Models\registration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\debts>
 */
class DebtsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //  'gym_id' => Gym::factory(),
            //  'customer_id' => Customer::factory(),
            //    'registration_id' => registration::factory(),
            'debt_amount' => fake()->numberBetween(100, 150),
            'paid_amount' => fake()->numberBetween(0, 150),
            'last_payment_date' => fake()->date(),
            'debt_date' => fake()->date(),
            'details' => fake()->text(),
        ];
    }
}
