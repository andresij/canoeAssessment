<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FundsManagerSeeder::class,
            CompanySeeder::class,
            AliasSeeder::class,
            FundsCompanySeeder::class,
        ]);
    }
}
