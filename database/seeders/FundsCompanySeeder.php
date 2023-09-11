<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fund;
use App\Models\Company;
use App\Models\FundsCompany;
class FundsCompanySeeder extends Seeder
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
            for ($x = 1; $x < 5; $x++) {
                FundsCompany::factory()
                    ->create([
                        'fund_id' => $fund->id,
                        'company_id' => $x
                    ]);
            }

        }
    }
}
