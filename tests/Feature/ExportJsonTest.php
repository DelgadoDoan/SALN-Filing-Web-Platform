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

class ExportJsonTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_export_json(): void
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
        
        $response = $this->get('/home/export-json');

        $response->assertStatus(200);

        $response->assertHeader('Content-Type', 'application/json');

        $filename = $user->name . '-SALN-data';

        $contentDisposition = $response->headers->get('Content-Disposition');

        $this->assertStringContainsString('attachment; filename=' . $filename, $contentDisposition);

        $json = json_decode($response->getContent(), true);
    
        $this->assertIsArray($json);

        $this->assertEquals($saln->filing_type, $json['filingType']);
        $this->assertEquals($saln->asof_date->format('Y-m-d'), $json['asOfDate']);

        // Declarant
        $this->assertEquals($saln->declarant_family_name, $json['declarant']['familyName']);
        $this->assertEquals($saln->declarant_first_name, $json['declarant']['firstName']);
        $this->assertEquals($saln->declarant_mi, $json['declarant']['middleInitial']);
        $this->assertEquals($saln->declarant_position, $json['declarant']['position']);
        $this->assertEquals($saln->declarant_office_name, $json['declarant']['agencyOffice']);

        // Office Address
        $this->assertEquals($saln->declarant_office_number, $json['declarant']['officeAddress']['officeNo']);
        $this->assertEquals($saln->declarant_office_street, $json['declarant']['officeAddress']['officeStreet']);
        $this->assertEquals($saln->declarant_office_city, $json['declarant']['officeAddress']['officeCity']);
        $this->assertEquals($saln->declarant_office_region, $json['declarant']['officeAddress']['officeRegion']);
        $this->assertEquals($saln->declarant_office_zip, $json['declarant']['officeAddress']['officeZipCode']);

        // House Address
        $this->assertEquals($saln->declarant_house_number, $json['declarant']['houseAddress']['houseNo']);
        $this->assertEquals($saln->declarant_house_street, $json['declarant']['houseAddress']['houseStreet']);
        $this->assertEquals($saln->declarant_house_subdivision, $json['declarant']['houseAddress']['houseSubdivision']);
        $this->assertEquals($saln->declarant_house_barangay, $json['declarant']['houseAddress']['houseBarangay']);
        $this->assertEquals($saln->declarant_house_city, $json['declarant']['houseAddress']['houseCity']);
        $this->assertEquals($saln->declarant_house_region, $json['declarant']['houseAddress']['houseRegion']);
        $this->assertEquals($saln->declarant_house_zip, $json['declarant']['houseAddress']['houseZipCode']);

        // Government-issued ID
        $this->assertEquals($saln->gov_id_declarant, $json['declarant']['governmentIssuedId']['type']);
        $this->assertEquals($saln->id_no_declarant, $json['declarant']['governmentIssuedId']['idNumber']);
        $this->assertEquals(
            $saln->id_date_declarant->format('Y-m-d'),
            $json['declarant']['governmentIssuedId']['dateIssued']
        );

        // Spouses
        $this->assertEquals($spouses[0]->family_name, $json['declarant']['spouses'][0]['familyName']);
        $this->assertEquals($spouses[0]->first_name, $json['declarant']['spouses'][0]['firstName']);
        $this->assertEquals($spouses[0]->mi, $json['declarant']['spouses'][0]['middleInitial']);
        $this->assertEquals($spouses[0]->position, $json['declarant']['spouses'][0]['position']);
        $this->assertEquals($spouses[0]->office_name, $json['declarant']['spouses'][0]['agencyOffice']);
        $this->assertEquals($spouses[0]->same_house_as_declarant, $json['declarant']['spouses'][0]['hasSameHouseAsDeclarant']);
        $this->assertEquals($spouses[0]->office_number, $json['declarant']['spouses'][0]['officeAddress']['officeNo']);
        $this->assertEquals($spouses[0]->office_street, $json['declarant']['spouses'][0]['officeAddress']['officeStreet']);
        $this->assertEquals($spouses[0]->office_city, $json['declarant']['spouses'][0]['officeAddress']['officeCity']);
        $this->assertEquals($spouses[0]->office_region, $json['declarant']['spouses'][0]['officeAddress']['officeRegion']);
        $this->assertEquals($spouses[0]->office_zip, $json['declarant']['spouses'][0]['officeAddress']['officeZipCode']);
        $this->assertEquals($spouses[0]->house_number, $json['declarant']['spouses'][0]['houseAddress']['houseNo']);
        $this->assertEquals($spouses[0]->house_street, $json['declarant']['spouses'][0]['houseAddress']['houseStreet']);
        $this->assertEquals($spouses[0]->house_subdivision, $json['declarant']['spouses'][0]['houseAddress']['houseSubdivision']);
        $this->assertEquals($spouses[0]->house_barangay, $json['declarant']['spouses'][0]['houseAddress']['houseBarangay']);
        $this->assertEquals($spouses[0]->house_city, $json['declarant']['spouses'][0]['houseAddress']['houseCity']);
        $this->assertEquals($spouses[0]->house_region, $json['declarant']['spouses'][0]['houseAddress']['houseRegion']);
        $this->assertEquals($spouses[0]->house_zip, $json['declarant']['spouses'][0]['houseAddress']['houseZipCode']);

        // Unmarried Children
        $this->assertEquals($unmarried_children[0]->name, $json['declarant']['unmarriedChildren'][0]['name']);
        $this->assertEquals($unmarried_children[0]->date_of_birth, $json['declarant']['unmarriedChildren'][0]['dateOfBirth']);

        // Real Properties
        $this->assertEquals($realProperties[0]->description, $json['declarant']['assets']['realProperties'][0]['description']);
        $this->assertEquals($realProperties[0]->kind, $json['declarant']['assets']['realProperties'][0]['kind']);
        $this->assertEquals($realProperties[0]->location, $json['declarant']['assets']['realProperties'][0]['exactLocation']);
        $this->assertEquals($realProperties[0]->assessed_value, $json['declarant']['assets']['realProperties'][0]['assessedValue']);
        $this->assertEquals($realProperties[0]->market_value, $json['declarant']['assets']['realProperties'][0]['currentFairMarketValue']);
        $this->assertEquals($realProperties[0]->acquisition_year, $json['declarant']['assets']['realProperties'][0]['acquisitionYear']);
        $this->assertEquals($realProperties[0]->acquisition_mode, $json['declarant']['assets']['realProperties'][0]['acquisitionMode']);
        $this->assertEquals($realProperties[0]->acquisition_cost, $json['declarant']['assets']['realProperties'][0]['acquisitionCost']);

        // Personal Properties
        $this->assertEquals($personalProperties[0]->description, $json['declarant']['assets']['personalProperties'][0]['description']);
        $this->assertEquals($personalProperties[0]->year_acquired, $json['declarant']['assets']['personalProperties'][0]['yearAcquired']);
        $this->assertEquals($personalProperties[0]->acquisition_cost, $json['declarant']['assets']['personalProperties'][0]['acquisitionCost']);

        // Liabilities
        $this->assertEquals($liabilities[0]->nature, $json['declarant']['liabilities'][0]['nature']);
        $this->assertEquals($liabilities[0]->name_creditor, $json['declarant']['liabilities'][0]['nameOfCreditor']);
        $this->assertEquals($liabilities[0]->outstanding_balance, $json['declarant']['liabilities'][0]['outstandingBalance']);

        // Business Interests
        $this->assertEquals($businessInterests[0]->name_business, $json['declarant']['businessInterestsAndFinancialConnections'][0]['nameOfEntity']);
        $this->assertEquals($businessInterests[0]->address_business, $json['declarant']['businessInterestsAndFinancialConnections'][0]['businessAddress']);
        $this->assertEquals($businessInterests[0]->nature_business, $json['declarant']['businessInterestsAndFinancialConnections'][0]['natureOfInterestOrConnection']);
        $this->assertEquals($businessInterests[0]->date_interest, $json['declarant']['businessInterestsAndFinancialConnections'][0]['dateOfAcquisition']);

        // Relatives in Government Service
        $this->assertEquals($relativesInGovernment[0]->relative_family_name, $json['declarant']['relativesInGovernmentService'][0]['familyName']);
        $this->assertEquals($relativesInGovernment[0]->relative_first_name, $json['declarant']['relativesInGovernmentService'][0]['firstName']);
        $this->assertEquals($relativesInGovernment[0]->relative_mi, $json['declarant']['relativesInGovernmentService'][0]['middleInitial']);
        $this->assertEquals($relativesInGovernment[0]->relationship, $json['declarant']['relativesInGovernmentService'][0]['relationship']);
        $this->assertEquals($relativesInGovernment[0]->position, $json['declarant']['relativesInGovernmentService'][0]['position']);
        $this->assertEquals($relativesInGovernment[0]->name_agency, $json['declarant']['relativesInGovernmentService'][0]['agencyOfficeAndAddress']);

        // Boolean Flags
        $this->assertEquals($saln->no_business_interest, $json['declarant']['hasNoBusinessInterests']);
        $this->assertEquals($saln->no_relatives_in_government, $json['declarant']['hasNoRelativesInGovermentService']);

    }
}
