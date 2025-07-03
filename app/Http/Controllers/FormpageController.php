<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

use App\Models\SALN; // You’ll need to create this model

class FormpageController extends Controller
{
    public function isLoggedIn(Request $request) {
        // check if cookie exists        
        $cookie = $request->cookie('user');
        
        if (!$cookie) {
            Auth::logout();

            return redirect('/login');
        }

        return view('home');
    }

    public function logout() {
        Cookie::expire('user');

        Auth::logout();

        return redirect('/login');
    }

    public function deleteAccount () {
        $user = Auth::user();

        $user = User::where('email', $user->email)->delete();

        Cookie::expire('user');

        Auth::logout();
    }
    public function submit(Request $request)
{
    $saln = new SALN();

    // Optional: if logged in
    if (Auth::check()) {
        $saln->user_id = Auth::id();
    } else {
        $saln->session_id = session()->getId();
    }

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

    // --- Spouse Info ---
    $saln->spouse_family_name = $request->input('spouse_family_name');
    $saln->spouse_first_name = $request->input('spouse_first_name');
    $saln->spouse_mi = $request->input('spouse_mi');

    
    // Spouse Home Address
    $saln->spouse_house_number = $request->input('spouse_house_number');
    $saln->spouse_house_street = $request->input('spouse_house_street');
    $saln->spouse_house_subdivision = $request->input('spouse_house_subdivision');
    $saln->spouse_house_barangay = $request->input('spouse_house_barangay');
    $saln->spouse_house_city = $request->input('spouse_house_city');
    $saln->spouse_house_region = $request->input('spouse_house_region');
    $saln->spouse_house_zip = $request->input('spouse_house_zip');

    // Spouse Office Address
    $saln->spouse_office_name = $request->input('spouse_office_name');
    $saln->spouse_office_street = $request->input('spouse_office_street');
    $saln->spouse_office_city = $request->input('spouse_office_city');
    $saln->spouse_office_region = $request->input('spouse_office_region');
    $saln->spouse_office_zip = $request->input('spouse_office_zip');

    // --- Assets and Liabilities (JSON arrays) ---
    $saln->real_properties = json_encode($request->only(['desc', 'kind', 'location', 'assessed', 'marketValue', 'acqYear', 'acqMode', 'acqCost']));
    $saln->personal_assets = json_encode($request->only(['description', 'yearAcquired', 'acquisitionCost']));
    $saln->liabilities = json_encode($request->only(['nature', 'nameCreditor', 'OutstandingBalance']));
    $saln->business_interests = json_encode($request->only(['nameBusiness', 'addressBusiness', 'natureBusiness', 'dateInterest']));
    $saln->relatives_in_government = json_encode($request->only(['nameRelative', 'relationship', 'position', 'nameAgency']));

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

    return redirect()->back()->with('success', 'SALN Form submitted successfully!');
    }
}
