<?php

namespace Database\Seeders;


use App\Models\Gym;
use Illuminate\Database\Seeder;

class GymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Gym::factory()->count(10)->create();
    }
}
