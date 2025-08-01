<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\MagicToken;
use App\Models\User;
use App\Models\BusinessInterest;
use App\Models\Liability;
use App\Models\PersonalProperty;
use App\Models\RealProperty;
use App\Models\RelativeInGovernment;
use App\Models\SALN;
use App\Models\Spouse;
use App\Models\UnmarriedChild;

class SaveFormTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_example(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $saln = SALN::factory()->create(['user_id' => $user->id]);
        $unmarried_children = unmarriedChild::factory()->count(1)->create([
            'saln_id' => $saln->id,
        ]);
        $spouses = Spouse::factory()->count(1)->create([
            'saln_id' => $saln->id,
        ]);
        $realProperties = RealProperty::factory()->count(1)->create([
            'saln_id' => $saln->id,
        ]);
        $personalProperties = PersonalProperty::factory()->count(1)->create([
            'saln_id' => $saln->id,
        ]);
        $liabilities = Liability::factory()->count(1)->create([
            'saln_id' => $saln->id,
        ]);
        $businessInterests = BusinessInterest::factory()->count(1)->create([
            'saln_id' => $saln->id,
        ]);
        $relativesInGovernment = RelativeInGovernment::factory()->count(1)->create([
            'saln_id' => $saln->id,
        ]);

        // Sample Http request
        $requestData = [
            'asof_date' => '2025-01-01',
            'filing_type' => 'not applicable',
    
            'declarant_family_name' => 'Doe',
            'declarant_first_name' => 'John',
            'declarant_mi' => 'M',
    
            'declarant_house_number' => '123',
            'declarant_house_street' => 'Main St',
            'declarant_house_subdivision' => 'Green Village',
            'declarant_house_barangay' => 'Barangay Uno',
            'declarant_house_city' => 'Cityville',
            'declarant_house_region' => 'Region I',
            'declarant_house_zip' => '1234',
   
            'declarant_position' => 'Engineer',
            'declarant_office_name' => 'DPWH',
            'declarant_office_number' => '45',
            'declarant_office_street' => 'Gov St',
            'declarant_office_city' => 'Cityville',
            'declarant_office_region' => 'Region I',
            'declarant_office_zip' => '5678',
    
            'subtotalReal' => 1000000,
            'subtotalPersonal' => 500000,
            'totalAssets' => 1500000,
            'subtotalLiabilities' => 100000,
            'netWorth' => 1400000,
    
            'certDate' => '2025-01-01',
            'govIDDeclarant' => 'Passport',
            'idNoDeclarant' => 'A1234567',
            'idDateDeclarant' => '2024-12-12',
            'govIDSpouse' => 'Driver License',
            'idNoSpouse' => 'DL89012',
            'idDateSpouse' => '2024-11-01',

            'noBusinessInterests' => '1',
            'noRelativesInGovernment' => '1',

            'children_name' => ['Child One', 'Child Two'],
            'children_dob' => ['2010-01-01', '2012-02-02'],

            'spouse_family_name' => ['Smith'],
            'spouse_first_name' => ['Jane'],
            'spouse_mi' => ['A'],
            'copy_house_address' => ['on'],
            'spouse_house_number' => ['456'],
            'spouse_house_street' => ['2nd Ave'],
            'spouse_house_subdivision' => ['West Grove'],
            'spouse_house_barangay' => ['Barangay Dos'],
            'spouse_house_city' => ['Citytown'],
            'spouse_house_region' => ['Region II'],
            'spouse_house_zip' => ['2345'],
            'spouse_position' => ['Manager'],
            'spouse_office_name' => ['DOH'],
            'spouse_office_number' => ['78'],
            'spouse_office_street' => ['Health St'],
            'spouse_office_city' => ['Health City'],
            'spouse_office_region' => ['Region II'],
            'spouse_office_zip' => ['6789'],

            'desc' => ['House'],
            'kind' => ['Residential'],
            'location' => ['Cityville'],
            'assessed' => [500000],
            'marketValue' => [600000],
            'acqYear' => [2015],
            'acqMode' => ['Purchase'],
            'acqCost' => [550000],
    
            'description' => ['Laptop'],
            'yearAcquired' => [2020],
            'acquisitionCost' => [100000],
    
            'nature' => ['Loan'],
            'nameCreditor' => ['Bank A'],
            'OutstandingBalance' => [100000],

            'nameBusiness' => ['My Business'],
            'addressBusiness' => ['Biz St'],
            'natureBusiness' => ['Retail'],
            'dateInterest' => ['2023-01-01'],
    
            'relativeFamilyName' => ['Relative'],
            'relativeFirstName' => ['Gov'],
            'relativeMi' => ['B'],
            'relationship' => ['Cousin'],
            'position' => ['Supervisor'],
            'nameAgency' => ['BIR'],
        ];

        $response = $this->post('/save-saln', $requestData);

        $response->assertRedirect();

        $response->assertSessionHas('success', 'SALN Form saved successfully!');
    }
}
