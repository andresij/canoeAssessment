<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fund;
use App\Models\Company;

class FundsCompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fund_id' => Fund::factory(),
            'company_id' => Company::factory()
        ];
    }
}
