<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SALN;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnmarriedChild>
 */
class UnmarriedChildFactory extends Factory
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
            'name' => $this->faker->name,
            'date_of_birth' => $this->faker->date('Y-m-d', '-10 years'),
        ];
    }
}
