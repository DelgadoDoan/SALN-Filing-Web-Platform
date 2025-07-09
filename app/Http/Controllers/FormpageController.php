<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Http\Requests\FormDataRequest;
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


class FormpageController extends Controller
{
    public function isLoggedIn(Request $request) {
        // check if user is logged in
        if (!Auth::check()) {            
            return redirect('/login');
        }

        // check if token is expired        
        $expiredToken = MagicToken::where('user_id', Auth::id())
            ->where('created_at', '<=', Carbon::now()->subMinutes(5)) // if token is already 120 minutes old
            ->first();

        if ($expiredToken) {
            $expiredToken->delete();

            Auth::logout();

            return redirect('/login');
        }

        return view('home');
    }

    public function logout() {
        $token = MagicToken::where('user_id', Auth::id())
            ->first()
            ->delete();

        Auth::logout();

        return redirect('/login');
    }

    public function deleteAccount () {
        $token = MagicToken::where('user_id', Auth::id())
            ->first()
            ->delete();

        $user = Auth::user();

        $user = User::where('email', $user->email)->delete();

        Auth::logout();

        return redirect('/login');
    }

    public function saveToDatabase(Request $request) {
        // $validated = $request->validated();

        $saln = new SALN();

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
        $saln->declarant_house_barangay = $request->input('declarant_house_barangay');
        $saln->declarant_house_city = $request->input('declarant_house_city');
        $saln->declarant_house_region = $request->input('declarant_house_region');
        $saln->declarant_house_zip = $request->input('declarant_house_zip');

        // Declarant Office Address
        $saln->declarant_office_name = $request->input('declarant_office_name');
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
        $saln->no_business_interest = $request->has('noBusinessInterest') ? true : false;
        $saln->no_relatives_in_government = $request->has('noRelatives') ? true : false;

        // --- Save to DB ---
        $saln->save();
        foreach ($request->input('children_name',[]) as $index => $name) {
            UnmarriedChild::create([
                'saln_id' => $saln->id,
                'name' => $name,
                'date_of_birth' => $request->children_dob[$index],
            ]);
        }
        foreach ($request->spouse_family_name as $i => $family_name) {
            Spouse::create([
                'saln_id' => $saln->id,
                'family_name' => $family_name,
                'first_name' => $request->spouse_first_name[$i],
                'mi' => $request->spouse_mi[$i],
                'house_number' => $request->spouse_house_number[$i],
                'house_street' => $request->spouse_house_street[$i],
                'house_subdivision' => $request->spouse_house_subdivision[$i],
                'house_barangay' => $request->spouse_house_barangay[$i],
                'house_city' => $request->spouse_house_city[$i],
                'house_region' => $request->spouse_house_region[$i],
                'house_zip' => $request->spouse_house_zip[$i],
                'office_name' => $request->spouse_office_name[$i],
                'office_street' => $request->spouse_office_street[$i],
                'office_city' => $request->spouse_office_city[$i],
                'office_region' => $request->spouse_office_region[$i],
                'office_zip' => $request->spouse_office_zip[$i],
            ]);
        }
        if ($request->has('desc')) {
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
        }
        foreach ($request->description as $index => $desc) {
            PersonalProperty::create([
                'saln_id' => $saln->id,
                'description' => $desc,
                'year_acquired' => $request->yearAcquired[$index] ?? null,
                'acquisition_cost' => $request->acquisitionCost[$index] ?? null,
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
        foreach ($request->nameBusiness as $index => $name) {
            BusinessInterest::create([
                'saln_id' => $saln->id,
                'name_business' => $name,
                'address_business' => $request->addressBusiness[$index] ?? null,
                'nature_business' => $request->natureBusiness[$index] ?? null,
                'date_interest' => $request->dateInterest[$index] ?? null,
            ]);
        }
        foreach ($request->nameRelative as $index => $name) {
            RelativeInGovernment::create([
                'saln_id' => $saln->id,
                'name_relative' => $name,
                'relationship' => $request->relationship[$index] ?? null,
                'position' => $request->position[$index] ?? null,
                'name_agency' => $request->nameAgency[$index] ?? null,
            ]);
        }


        return redirect()->back()->with('success', 'SALN Form submitted successfully!');
    }
}
