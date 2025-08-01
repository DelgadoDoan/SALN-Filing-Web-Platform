<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SALN;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessInterest>
 */
class BusinessInterestFactory extends Factory
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
            'name_business' => $this->faker->company,
            'address_business' => $this->faker->address,
            'nature_business' => $this->faker->randomElement(['Retail', 'Consulting', 'Manufacturing', 'Real Estate']),
            'date_interest' => $this->faker->date('Y-m-d', '-5 years'),
        ];
    }
}
