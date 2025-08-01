<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SALN;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealProperty>
 */
class RealPropertyFactory extends Factory
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
            'description' => $this->faker->words(3, true),
            'kind' => $this->faker->randomElement(['Residential', 'Commercial', 'Agricultural', 'Industrial']),
            'location' => $this->faker->address,
            'assessed_value' => $this->faker->numberBetween(100000, 500000),
            'market_value' => $this->faker->numberBetween(200000, 1000000),
            'acquisition_year' => $this->faker->year(),
            'acquisition_mode' => $this->faker->randomElement(['Purchase', 'Inheritance', 'Donation']),
            'acquisition_cost' => $this->faker->numberBetween(50000, 300000),
        ];
    }
}
