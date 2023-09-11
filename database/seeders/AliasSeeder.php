<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fund;
use App\Models\Alias;

class AliasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funds = Fund::all();
        foreach ($funds as $fund) {
            Alias::factory()
            ->count(4)
            ->create([
                'fund_id' => $fund->id
            ]);

        }
    }
}
