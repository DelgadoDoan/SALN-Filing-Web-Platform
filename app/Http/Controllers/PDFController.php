<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\SALN;
use PDF;

class PDFController extends Controller
{
    private function fetchData() {
        $saln = SALN::where('user_id', Auth::id())
            ->first();

        $spouses = array();
        $unmarried_children = array();
        $real_properties = array();
        $personal_properties = array();
        $liabilities = array();
        $business_interests = array();
        $relatives_in_government = array();

        $first_spouse = true;

        if ($saln->spouses->isNotEmpty()) {
            foreach ($saln->spouses as $spouse) {
                $spouse_info = [
                    'familyName' => $spouse->family_name ?? '',
                    'firstName' => $spouse->first_name ?? '',
                    'middleInitial' => $spouse->mi ?? '',
                    'position' => $spouse->position ?? '',
                    'agencyOffice' => $spouse->office_name ?? '',
                    'officeAddress' => [
                        'officeNo' => $spouse->office_number ?? '',
                        'officeStreet' => $spouse->office_street ?? '',
                        'officeCity' => $spouse->office_city ?? '',
                        'officeRegion' => $spouse->office_region ?? '',
                        'officeZipCode' => $spouse->office_zip ?? '',
                    ],
                    'hasSameHouseAsDeclarant' =>(bool) $spouse->same_house_as_declarant ? true : false,
                    'houseAddress' => [
                        'houseNo' => $spouse->house_number ?? '',
                        'houseStreet' => $spouse->house_street ?? '',
                        'houseSubdivision' => $spouse->house_subdivision ?? '',
                        'houseBarangay' => $spouse->house_barangay ?? '',
                        'houseCity' => $spouse->house_city ?? '',
                        'houseRegion' => $spouse->house_region ?? '',
                        'houseZipCode' => $spouse->house_zip ?? '',
                    ],
                    'governmentIssuedId' => [
                        'type' => '',
                        'idNumber' => '',
                        'dateIssued' => '',
                    ],
                ];

                if ($first_spouse) {
                    $spouse_info['governmentIssuedId'] = [
                        'type' => $saln->gov_id_spouse ?? '',
                        'idNumber' => $saln->id_no_spouse ?? '',
                        'dateIssued' => $saln->id_date_spouse ? $saln->id_date_spouse->format('Y-m-d') : '',
                    ];
                    
                    $first_spouse = false;
                }

                $spouses[] = $spouse_info;
            };
        } else {
            $spouses[] = [
                'familyName' => '',
                'firstName' => '',
                'middleInitial' => '',
                'position' => '',
                'agencyOffice' => '',
                'officeAddress' => [
                    'officeNo' => '',
                    'officeStreet' => '',
                    'officeCity' => '',
                    'officeRegion' => '',
                    'officeZipCode' => '',
                ],
                'houseAddress' => [
                    'houseNo' => '',
                    'houseStreet' => '',
                    'houseSubdivision' => '',
                    'houseBarangay' => '',
                    'houseCity' => '',
                    'houseRegion' => '',
                    'houseZipCode' => '',
                ],
                'governmentIssuedId' => [
                    'type' => '',
                    'idNumber' => '',
                    'dateIssued' => '',
                ],
            ];
        }

        foreach ($saln->unmarriedChildren ?? [] as $child) {
            $unmarried_children[] = [
                'name' => $child->name ?? '',
                'dateOfBirth' => $child->date_of_birth ?? '',
            ];
        };

        foreach ($saln->realProperties ?? [] as $real_property) {
            $real_properties[] = [
                'description' => $real_property->description ?? '',
                'kind' => $real_property->kind ?? '',
                'exactLocation' => $real_property->location ?? '',
                'assessedValue' => $real_property->assessed_value ?? '',
                'currentFairMarketValue' => $real_property->market_value ?? '',
                'acquisitionYear' => $real_property->acquisition_year ?? '',
                'acquisitionMode' => $real_property->acquisition_mode ?? '',
                'acquisitionCost' => $real_property->acquisition_cost ?? '',
            ];
        };

        foreach ($saln->personalProperties ?? [] as $personal_property) {
            $personal_properties[] = [
                'description' => $personal_property->description ?? '',
                'yearAcquired' => $personal_property->year_acquired ?? '',
                'acquisitionCost' => $personal_property->acquisition_cost ?? '',
            ];
        };

        foreach ($saln->liabilities ?? [] as $liability) {
            $liabilities[] = [
                'nature' => $liability->nature ?? '',
                'nameOfCreditor' => $liability->name_creditor ?? '',
                'outstandingBalance' => $liability->outstanding_balance ?? '',
            ];
        };

        if ($saln->businessInterests) {
            foreach ($saln->businessInterests ?? [] as $business_interest) {
                $business_interests[] = [
                    'nameOfEntity' => $business_interest->name_business ?? '',
                    'businessAddress' => $business_interest->address_business ?? '',
                    'natureOfInterestOrConnection' => $business_interest->nature_business ?? '',
                    'dateOfAcquisition' => $business_interest->date_interest ?? '',
                ];
            };    
        }

        foreach ($saln->relativesInGovernment ?? [] as $relative) {
            $relatives_in_government[] = [
                'familyName' => $relative->relative_family_name ?? '',
                'firstName' => $relative->relative_first_name ?? '',
                'middleInitial' => $relative->relative_mi ?? '',
                'relationship' => $relative->relationship ?? '',
                'position' => $relative->position ?? '',
                'agencyOfficeAndAddress' => $relative->name_agency ?? '',
            ];
        };

        $data = [
            'filingType' => $saln->filing_type ?? '',
            'asOfDate' => $saln->asof_date ? $saln->asof_date->format('Y-m-d') : '',
            'declarant' => [
                'familyName' => $saln->declarant_family_name ?? '',
                'firstName' => $saln->declarant_first_name ?? '',
                'middleInitial' => $saln->declarant_mi ?? '',
                'position' => $saln->declarant_position ?? '',
                'agencyOffice' => $saln->declarant_office_name ?? '',
                'officeAddress' => [
                    'officeNo' => $saln->declarant_office_number ?? '',
                    'officeStreet' => $saln->declarant_office_street ?? '',
                    'officeCity' => $saln->declarant_office_city ?? '',
                    'officeRegion' => $saln->declarant_office_region ?? '',
                    'officeZipCode' => $saln->declarant_office_zip ?? '',
                ],
                'houseAddress' => [
                    'houseNo' => $saln->declarant_house_number ?? '',
                    'houseStreet' => $saln->declarant_house_street ?? '',
                    'houseSubdivision' => $saln->declarant_house_subdivision ?? '',
                    'houseBarangay' => $saln->declarant_house_barangay ?? '',
                    'houseCity' => $saln->declarant_house_city ?? '',
                    'houseRegion' => $saln->declarant_house_region ?? '',
                    'houseZipCode' => $saln->declarant_house_zip ?? '',
                ],
                'governmentIssuedId' => [
                    'type' => $saln->gov_id_declarant ?? '',
                    'idNumber' => $saln->id_no_declarant ?? '',
                    'dateIssued' => $saln->id_date_declarant ? $saln->id_date_declarant->format('Y-m-d') : '',
                ],
                'spouses' => $spouses,
                'unmarriedChildren' => $unmarried_children,
                'assets' => [
                    'realProperties' => $real_properties,
                    'personalProperties' => $personal_properties,
                ],
                'liabilities' => $liabilities,
                'hasNoBusinessInterests' => $saln->no_business_interest,
                'businessInterestsAndFinancialConnections' => $saln->no_business_interest ? [] : $business_interests,
                'hasNoRelativesInGovermentService' => $saln->no_relatives_in_government,
                'relativesInGovernmentService' => $saln->no_relatives_in_government ? [] : $relatives_in_government,
            ],
        ];

        return $data;
    }
    public function generatePDF() {              
        
        $data = $this->fetchData();

        $pdf = PDF::loadview('pdf/salnpdf', $data);
        $pdf->setPaper('A4', 'portrait');

        
        return $pdf->stream();
    }
}
