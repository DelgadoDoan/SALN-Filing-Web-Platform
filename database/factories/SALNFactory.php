<?php

namespace Database\Factories;

use App\Models\SALN;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SALNFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'asof_date' => $this->faker->date(),
            'filing_type' => $this->faker->randomElement(['Original', 'Joint', 'Separate']),
            'declarant_family_name' => $this->faker->lastName,
            'declarant_first_name' => $this->faker->firstName,
            'declarant_mi' => $this->faker->randomLetter,
            'declarant_house_number' => $this->faker->buildingNumber,
            'declarant_house_street' => $this->faker->streetName,
            'declarant_house_subdivision' => $this->faker->secondaryAddress,
            'declarant_house_barangay' => 'Barangay ' . $this->faker->numberBetween(1, 100),
            'declarant_house_city' => $this->faker->city,
            'declarant_house_region' => 'Region ' . $this->faker->numberBetween(1, 13),
            'declarant_house_zip' => $this->faker->postcode,
            'declarant_position' => $this->faker->jobTitle,
            'declarant_office_name' => $this->faker->company,
            'declarant_office_number' => $this->faker->buildingNumber,
            'declarant_office_street' => $this->faker->streetName,
            'declarant_office_city' => $this->faker->city,
            'declarant_office_region' => 'Region ' . $this->faker->numberBetween(1, 13),
            'declarant_office_zip' => $this->faker->postcode,

            'subtotal_real' => 1500000,
            'subtotal_personal' => 600000,
            'total_assets' => 2100000,
            'subtotal_liabilities' => 100000,
            'net_worth' => 2000000,

            'cert_date' => $this->faker->date(),
            'gov_id_declarant' => 'Passport',
            'id_no_declarant' => $this->faker->numerify('##########'),
            'id_date_declarant' => $this->faker->date(),

            'gov_id_spouse' => 'Driver\'s License',
            'id_no_spouse' => $this->faker->numerify('##########'),
            'id_date_spouse' => $this->faker->date(),

            'no_business_interest' => false,
            'no_relatives_in_government' => false,
            'is_completed' => true,
        ];
    }
}
