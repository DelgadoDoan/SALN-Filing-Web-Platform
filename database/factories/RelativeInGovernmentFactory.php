<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SALN;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RelativeInGovernment>
 */
class RelativeInGovernmentFactory extends Factory
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
            'relative_family_name' => $this->faker->lastName,
            'relative_first_name' => $this->faker->firstName,
            'relative_mi' => $this->faker->randomLetter,
            'relationship' => $this->faker->randomElement(['Spouse', 'Sibling', 'Parent', 'Child', 'Cousin']),
            'position' => $this->faker->jobTitle,
            'name_agency' => $this->faker->company,
        ];
    }
}
