<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Http\Requests\FormDataRequest;
use App\Models\MagicToken;
use App\Models\User;
use App\Models\BusinessInterest;
use App\Models\SpouseChildBusinessInterest;
use App\Models\Liability;
use App\Models\SpouseChildLiability;
use App\Models\PersonalProperty;
use App\Models\SpouseChildPersonalProperty;
use App\Models\RealProperty;
use App\Models\SpouseChildRealProperty;
use App\Models\RelativeInGovernment;
use App\Models\SALN;
use App\Models\Spouse;
use App\Models\UnmarriedChild;


class FormpageController extends Controller
{
    public function isLoggedIn(Request $request) {
        // check if user is logged in
        if (!Auth::check()) {            
            return redirect('/login');
        }

        // check if token is expired
        $expiredToken = MagicToken::where('user_id', Auth::id())
            ->where('used_at', '<=', Carbon::now()->subMinutes(360)) // if token is already 360 minutes (6 hours) old
            ->first();

        if ($expiredToken) {
            $expiredToken->delete();

            Auth::logout();

            return redirect('/login');
        }

        $token = MagicToken::where('user_id', Auth::id());

        $token->update([
            'used_at' => Carbon::now()
        ]);

        $prefillData = session('prefill'); // this pulls the uploaded data

        // create or update form
        $saln = SALN::updateOrCreate(
            ['user_id' => Auth::id()],
        );

        // initial form fields
        $spouse = Spouse::updateOrCreate(
            ['saln_id' => $saln->id],
        );

        $realProperties = RealProperty::updateOrCreate(
            ['saln_id' => $saln->id],
        );

        $spouseChildRealProperties = SpouseChildRealProperty::updateOrCreate(
            ['saln_id' => $saln->id],
        );

        $personalProperties = PersonalProperty::updateOrCreate(
            ['saln_id' => $saln->id],
        );

        $spouseChildPersonalProperties = SpouseChildPersonalProperty::updateOrCreate(
            ['saln_id' => $saln->id],
        );

        $liabilities = Liability::updateOrCreate(
            ['saln_id' => $saln->id],
        );

        $spouseChildLiabilities = SpouseChildLiability::updateOrCreate(
            ['saln_id' => $saln->id],
        );
        
        $businessInterests = BusinessInterest::updateOrCreate(
            ['saln_id' => $saln->id],
        );

        $spouseChildBusinessInterests = SpouseChildBusinessInterest::updateOrCreate(
            ['saln_id' => $saln->id],
        );
        
        $relatives = RelativeInGovernment::updateOrCreate(
            ['saln_id' => $saln->id],
        );

        return view('home', compact('prefillData', 'saln'));
    }

    public function logout() {
        $token = MagicToken::where('user_id', Auth::id())
            ->first()
            ->delete();

        Auth::logout();

        return redirect('/login');
    }

    public function deleteAccount () {
        $userId = Auth::id();

        $token = MagicToken::where('user_id', $userId)
            ->first()
            ->delete();

        foreach (SALN::where('user_id', $userId)->get() as $saln) {
            $saln->delete();
        }

        $user = Auth::user();

        $user = User::where('email', $user->email)->delete();

        Auth::logout();

        return redirect('/login');
    }

    public function saveToDatabase(Request $request) {
        // $validated = $request->validated();

        // $saln = new SALN();
        // $saln->user_id = Auth::id();
        $saln = SALN::where('user_id', Auth::id())->first();

                // --- Metadata ---
        $saln->asof_date = $request->input('asof_date');
        $saln->filing_type = $request->input('filing_type');

        // --- Declarant Info ---
        $saln->declarant_family_name = $request->input('declarant_family_name');
        $saln->declarant_first_name = $request->input('declarant_first_name');
        $saln->declarant_mi = $request->input('declarant_mi');

        // Declarant Home Address
        $saln->declarant_house_number = $request->input('declarant_house_number');
        $saln->declarant_house_street = $request->input('declarant_house_street');
        $saln->declarant_house_subdivision = $request->input('declarant_house_subdivision');
        $saln->declarant_house_barangay = $request->has('declarant_house_barangay')
            ? $request->input('declarant_house_barangay')
            : '';
        $saln->declarant_house_city = $request->has('declarant_house_barangay')
            ? $request->input('declarant_house_city')
            : '';
        $saln->declarant_house_region = $request->has('declarant_house_region')
            ? $request->input('declarant_house_region')
            : '';
        $saln->declarant_house_zip = $request->input('declarant_house_zip');

        // Declarant Office
        $saln->declarant_position = $request->input('declarant_position');
        $saln->declarant_office_name = $request->input('declarant_office_name');
        
        // Declarant Office Address
        $saln->declarant_office_number = $request->input('declarant_office_number');
        $saln->declarant_office_street = $request->input('declarant_office_street');
        $saln->declarant_office_city = $request->input('declarant_office_city');
        $saln->declarant_office_region = $request->input('declarant_office_region');
        $saln->declarant_office_zip = $request->input('declarant_office_zip');

        // --- Totals ---
        $saln->subtotal_real = $request->input('subtotalReal');
        $saln->subtotal_personal = $request->input('subtotalPersonal');
        $saln->total_assets = $request->input('totalAssets');
        $saln->subtotal_liabilities = $request->input('subtotalLiabilities');
        $saln->net_worth = $request->input('netWorth');

        // --- Certification ---
        $saln->cert_date = $request->input('certDate');
        $saln->gov_id_declarant = $request->input('govIDDeclarant');
        $saln->id_no_declarant = $request->input('idNoDeclarant');
        $saln->id_date_declarant = $request->input('idDateDeclarant');
        $saln->gov_id_spouse = $request->input('govIDSpouse');
        $saln->id_no_spouse = $request->input('idNoSpouse');
        $saln->id_date_spouse = $request->input('idDateSpouse');

        // --- Flags ---
        $saln->no_business_interest = $request->has('noBusinessInterests') ? true : false;
        $saln->no_relatives_in_government = $request->has('noRelativesInGovernment') ? true : false;

        // --- Save to DB ---
        $saln->save();

        // -- Refresh tables --
        unmarriedChild::where('saln_id', $saln->id)->delete();
        Spouse::where('saln_id', $saln->id)->delete();
        RealProperty::where('saln_id', $saln->id)->delete();
        SpouseChildRealProperty::where('saln_id', $saln->id)->delete();
        PersonalProperty::where('saln_id', $saln->id)->delete();
        SpouseChildPersonalProperty::where('saln_id', $saln->id)->delete();
        Liability::where('saln_id', $saln->id)->delete();
        SpouseChildLiability::where('saln_id', $saln->id)->delete();
        BusinessInterest::where('saln_id', $saln->id)->delete();
        SpouseChildBusinessInterest::where('saln_id', $saln->id)->delete();
        RelativeInGovernment::where('saln_id', $saln->id)->delete();

        foreach ($request->input('children_name',[]) as $index => $name) {
            UnmarriedChild::create([
                'saln_id' => $saln->id,
                'name' => $name,
                'date_of_birth' => $request->children_dob[$index],
            ]);
        }
        
        foreach ($request->input('spouse_family_name',[]) as $i => $family_name) {
            Spouse::create([
                'saln_id' => $saln->id,
                'family_name' => $family_name,
                'first_name' => $request->spouse_first_name[$i],
                'mi' => $request->spouse_mi[$i],
                'same_house_as_declarant' => $request->has("copy_house_address.$i") ? true : false,
                'house_number' => $request->spouse_house_number[$i],
                'house_street' => $request->spouse_house_street[$i],
                'house_subdivision' => $request->spouse_house_subdivision[$i],
                'house_barangay' => $request->spouse_house_barangay[$i] ?? '',
                'house_city' => $request->spouse_house_city[$i] ?? '',
                'house_region' => $request->spouse_house_region[$i] ?? '',
                'house_zip' => $request->spouse_house_zip[$i],
                'position' => $request->spouse_position[$i],
                'office_name' => $request->spouse_office_name[$i],
                'office_number' => $request->spouse_office_number[$i],
                'office_street' => $request->spouse_office_street[$i],
                'office_city' => $request->spouse_office_city[$i] ?? '',
                'office_region' => $request->spouse_office_region[$i] ?? '',
                'office_zip' => $request->spouse_office_zip[$i],
            ]);
        }

        foreach ($request->desc as $i => $desc) {
            RealProperty::create([
                'saln_id' => $saln->id,
                'description' => $desc,
                'kind' => $request->kind[$i] ?? null,
                'location' => $request->location[$i] ?? null,
                'assessed_value' => $request->assessed[$i] ?? null,
                'market_value' => $request->marketValue[$i] ?? null,
                'acquisition_year' => $request->acqYear[$i] ?? null,
                'acquisition_mode' => $request->acqMode[$i] ?? null,
                'acquisition_cost' => $request->acqCost[$i] ?? null,
            ]);
        }

        foreach ($request->spouseChildDesc as $i => $spouseChildDesc) {
            SpouseChildRealProperty::create([
                'saln_id' => $saln->id,
                'description' => $spouseChildDesc,
                'kind' => $request->spouseChildKind[$i] ?? null,
                'location' => $request->spouseChildLocation[$i] ?? null,
                'assessed_value' => $request->spouseChildAssessed[$i] ?? null,
                'market_value' => $request->spouseChildMarketValue[$i] ?? null,
                'acquisition_year' => $request->spouseChildAcqYear[$i] ?? null,
                'acquisition_mode' => $request->spouseChildAcqMode[$i] ?? null,
                'acquisition_cost' => $request->spouseChildAcqCost[$i] ?? null,
            ]);
        }

        foreach ($request->description as $index => $desc) {
            PersonalProperty::create([
                'saln_id' => $saln->id,
                'description' => $desc,
                'year_acquired' => $request->yearAcquired[$index] ?? null,
                'acquisition_cost' => $request->acquisitionCost[$index] ?? null,
            ]);
        }

        foreach ($request->spouseChildDescription as $index => $spouseChildDesc) {
            SpouseChildPersonalProperty::create([
                'saln_id' => $saln->id,
                'description' => $spouseChildDesc,
                'year_acquired' => $request->spouseChildYearAcquired[$index] ?? null,
                'acquisition_cost' => $request->spouseChildAcquisitionCost[$index] ?? null,
            ]);
        }

        foreach ($request->nature as $index => $nature) {
            Liability::create([
                'saln_id' => $saln->id,
                'nature' => $nature,
                'name_creditor' => $request->nameCreditor[$index] ?? null,
                'outstanding_balance' => $request->OutstandingBalance[$index] ?? null,
            ]);
        }

        foreach ($request->spouseChildNature as $index => $spouseChildNature) {
            SpouseChildLiability::create([
                'saln_id' => $saln->id,
                'nature' => $spouseChildNature,
                'name_creditor' => $request->spouseChildNameCreditor[$index] ?? null,
                'outstanding_balance' => $request->spouseChildOutstandingBalance[$index] ?? null,
            ]);
        }

        foreach ($request->input('nameBusiness',[]) as $index => $name) {
            BusinessInterest::create([
                'saln_id' => $saln->id,
                'name_business' => $name,
                'address_business' => $request->addressBusiness[$index] ?? null,
                'nature_business' => $request->natureBusiness[$index] ?? null,
                'date_interest' => $request->dateInterest[$index] ?? null,
            ]);
        }

        foreach ($request->input('spouseChildNameBusiness',[]) as $index => $spouseChildName) {
            SpouseChildBusinessInterest::create([
                'saln_id' => $saln->id,
                'name_business' => $spouseChildName,
                'address_business' => $request->spouseChildAddressBusiness[$index] ?? null,
                'nature_business' => $request->spouseChildNatureBusiness[$index] ?? null,
                'date_interest' => $request->spouseChildDateInterest[$index] ?? null,
            ]);
        }

        foreach ($request->input('relativeFamilyName',[]) as $index => $relativeFamilyName) {
            RelativeInGovernment::create([
                'saln_id' => $saln->id,
                'relative_family_name' => $relativeFamilyName,
                'relative_first_name' => $request->relativeFirstName[$index] ?? null,
                'relative_mi' => $request->relativeMi[$index] ?? null,
                'relationship' => $request->relationship[$index] ?? null,
                'position' => $request->position[$index] ?? null,
                'name_agency' => $request->nameAgency[$index] ?? null,
            ]);
        }

        return redirect()->back()->with('success', 'SALN Form saved successfully!');
    }
    
    public function importJson(Request $request) {
        $request->validate([
            'json_file' => 'required|file|mimes:json',
        ]);

        $path = $request->file('json_file')->store('uploads');
        $fullPath = storage_path("app/private/{$path}");

        if (!file_exists($fullPath)) {
            dd("File not found at: $fullPath");
        }

        $json = file_get_contents($fullPath);
        $data = json_decode($json, true);

        return redirect('/home')
            ->with('prefill', $data)
            ->with('success', 'Form data imported.');
    }

    public function exportJson() {
        $saln = SALN::where('user_id', Auth::id())
            ->first();

        $spouses = array();
        $unmarried_children = array();
        $real_properties = array();
        $spouse_child_real_properties = array();
        $personal_properties = array();
        $spouse_child_personal_properties = array();
        $liabilities = array();
        $spouse_child_liabilities = array();
        $business_interests = array();
        $spouse_child_business_interests = array();
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

        foreach ($saln->spouseChildRealProperties ?? [] as $real_property) {
            $spouse_child_real_properties[] = [
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

        foreach ($saln->spouseChildPersonalProperties ?? [] as $personal_property) {
            $spouse_child_personal_properties[] = [
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
        
        foreach ($saln->spouseChildLiabilities ?? [] as $liability) {
            $spouse_child_liabilities[] = [
                'nature' => $liability->nature ?? '',
                'nameOfCreditor' => $liability->name_creditor ?? '',
                'outstandingBalance' => $liability->outstanding_balance ?? '',
            ];
        };

        foreach ($saln->businessInterests ?? [] as $business_interest) {
            $business_interests[] = [
                'nameOfEntity' => $business_interest->name_business ?? '',
                'businessAddress' => $business_interest->address_business ?? '',
                'natureOfInterestOrConnection' => $business_interest->nature_business ?? '',
                'dateOfAcquisition' => $business_interest->date_interest ?? '',
            ];
        };    

        foreach ($saln->spouseChildBusinessInterests ?? [] as $business_interest) {
            $spouse_child_business_interests[] = [
                'nameOfEntity' => $business_interest->name_business ?? '',
                'businessAddress' => $business_interest->address_business ?? '',
                'natureOfInterestOrConnection' => $business_interest->nature_business ?? '',
                'dateOfAcquisition' => $business_interest->date_interest ?? '',
            ];
        };  

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
                    'spouseChildRealProperties' => $spouse_child_real_properties,
                    'personalProperties' => $personal_properties,
                    'spouseChildPersonalProperties' => $spouse_child_personal_properties,
                ],
                'liabilities' => $liabilities,
                'spouseChildLiabilities' => $spouse_child_liabilities,
                'hasNoBusinessInterests' => $saln->no_business_interest,
                'businessInterestsAndFinancialConnections' => $saln->no_business_interest ? [] : $business_interests,
                'spouseChildBusinessInterestsAndFinancialConnections' => $saln->no_business_interest ? [] : $spouse_child_business_interests,
                'hasNoRelativesInGovermentService' => $saln->no_relatives_in_government,
                'relativesInGovernmentService' => $saln->no_relatives_in_government ? [] : $relatives_in_government,
            ],
        ];

        $json = json_encode($data, JSON_PRETTY_PRINT);
        
        $filename = Auth::user()->name . '-' . 'saln' . '-' . Carbon::now('Asia/Manila')->format('Ymd\THis');

        return response($json)
            ->header('Content-Type', 'application/json')
            ->header('Content-Disposition', "attachment; filename={$filename}.json");
    }

    public function getRegions() {
        $path = 'regions.json';
    
        if (!Storage::exists($path)) {
            return response()->json(['error' => 'File not found'], 404);
        }
    
        $jsonFile = Storage::get($path);

        $data = json_decode($jsonFile);
    
        return response()->json($data);
    }
}
