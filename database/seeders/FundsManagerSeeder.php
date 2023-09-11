<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FundsManager;

class FundsManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FundsManager::factory()
            ->count(6)
            ->hasFunds(3)
            ->create();

        FundsManager::factory()
            ->count(3)
            ->hasFunds(4)
            ->create();

        FundsManager::factory()
            ->count(3)
            ->create();
    }
}
