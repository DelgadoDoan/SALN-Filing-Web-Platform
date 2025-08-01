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

class GeneratePDFTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_export_generates_pdf_response(): void
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

        $response = $this->get('/home/generate-pdf');

        $response->assertOk();

        $response->assertHeader('Content-Type', 'application/pdf');
    
        $filename = $user->name . '-SALN.pdf';

        $contentDisposition = $response->headers->get('Content-Disposition');

        $this->assertStringContainsString('inline; filename="' . $filename . '"', $contentDisposition);
    
        $this->assertNotEmpty($response->getContent());
    }
}
