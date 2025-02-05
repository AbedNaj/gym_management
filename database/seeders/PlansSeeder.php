<?php

namespace Database\Seeders;

use App\Models\plans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        plans::factory()->count(10)->create();
    }
}
