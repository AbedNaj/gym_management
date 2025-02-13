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
        // إنشاء 3 مستخدمين
        $users = User::factory(3)->create();

        // لكل مستخدم، إنشاء الجيم والبيانات المرتبطة به
        $users->each(function ($user) {
            // إنشاء الجيم وربطه بالمستخدم
            $gym = Gym::factory()->create([
                'user_id' => $user->id
            ]);

            // إنشاء 10 خطط مرتبطة بهذا الجيم
            $plans = plans::factory(3)->create([
                'gym_id' => $gym->id
            ]);

            // إنشاء 10 عملاء مرتبطين بهذا الجيم
            $customers = Customer::factory(10)->create([
                'gym_id' => $gym->id
            ]);

            // لكل عميل، إنشاء 10 تسجيلات مرتبطة به
            $customers->each(function ($customer) use ($gym, $plans) {
                $registrations = Registration::factory(count: 1)->create([
                    'plans_id' => $plans->random()->id, // اختيار خطة عشوائية
                    'gym_id' => $gym->id,
                    'customer_id' => $customer->id
                ]);

                // لكل تسجيل، إنشاء 10 ديون مرتبطة به
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
