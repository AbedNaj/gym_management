<?php

namespace Database\Seeders;

use App\Models\debts;
use Database\Factories\DebtsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DebtsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        debts::factory()->count(10)->create();
    }
}
