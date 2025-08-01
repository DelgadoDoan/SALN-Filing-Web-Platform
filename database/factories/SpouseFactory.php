<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SALN;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spouse>
 */
class SpouseFactory extends Factory
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
            'family_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'mi' => $this->faker->randomLetter,
            'house_number' => $this->faker->buildingNumber,
            'house_street' => $this->faker->streetName,
            'house_subdivision' => $this->faker->word,
            'house_barangay' => $this->faker->word,
            'house_city' => $this->faker->city,
            'house_region' => $this->faker->state,
            'house_zip' => $this->faker->postcode,
            'position' => $this->faker->jobTitle,
            'office_name' => $this->faker->company,
            'office_number' => $this->faker->buildingNumber,
            'office_street' => $this->faker->streetName,
            'office_city' => $this->faker->city,
            'office_region' => $this->faker->state,
            'office_zip' => $this->faker->postcode,
        ];
    }
}
