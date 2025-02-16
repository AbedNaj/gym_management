<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Gym;
use App\Models\Plan;
use App\Models\Customer;
use App\Models\Registration;
use App\Models\Debts;
use App\Models\plans;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::factory(3)->create();


        $users->each(function ($user) {

            $gym = Gym::factory()->create([
                'user_id' => $user->id
            ]);


            $plans = plans::factory(3)->create([
                'gym_id' => $gym->id
            ]);


            $customers = Customer::factory(100)->create([
                'gym_id' => $gym->id
            ]);


            $customers->each(function ($customer) use ($gym, $plans) {
                $registrations = Registration::factory(count: 1)->create([
                    'plans_id' => $plans->random()->id, // اختيار خطة عشوائية
                    'gym_id' => $gym->id,
                    'customer_id' => $customer->id
                ]);


                $registrations->each(function ($registration) use ($gym, $customer) {
                    Debts::factory(1)->create([
                        'gym_id' => $gym->id,
                        'customer_id' => $customer->id,
                        'registration_id' => $registration->id,
                    ]);
                });
            });
        });
    }
}
