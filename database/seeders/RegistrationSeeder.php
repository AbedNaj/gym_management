<?php

namespace Database\Seeders;

use App\Models\registration;
use Database\Factories\RegistrationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        registration::factory()->count(10)->create();
    }
}
