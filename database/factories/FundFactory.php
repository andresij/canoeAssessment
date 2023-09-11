<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FundsManager;

class FundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'funds_manager_id' => FundsManager::factory(),
            'name' => $this->faker->company(),
            'start_year' => $this->faker->numberBetween(2000, 2060)
        ];
    }
}
