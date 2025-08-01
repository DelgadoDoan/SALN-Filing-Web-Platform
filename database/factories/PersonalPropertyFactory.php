<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SALN;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalProperty>
 */
class PersonalPropertyFactory extends Factory
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
            'year_acquired' => $this->faker->year(),
            'acquisition_cost' => $this->faker->randomFloat(2, 1000, 100000),
        ];
    }
}
