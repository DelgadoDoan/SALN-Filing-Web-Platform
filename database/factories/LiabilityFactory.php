<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SALN;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Liability>
 */
class LiabilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'saln_id' => SALN::factory(),
            'nature' => $this->faker->randomElement(['Credit Card', 'Mortgage', 'Car Loan', 'Personal Loan']),
            'name_creditor' => $this->faker->company,
            'outstanding_balance' => $this->faker->randomFloat(2, 1000, 500000),
        ];
    }
}
