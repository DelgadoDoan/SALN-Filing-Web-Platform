<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SALN Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Atkinson Hyperlegible', 'Nunito', sans-serif;
        }

        body {
            background: #F9FAFB;
            padding: 40px;
            color: #222;
        }

        .form-container {
            background: #fff;
            padding: 30px;
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-section {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            display: block;
            margin-bottom: 4px;
        }

        .asof-group {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .asof-label {
            font-size: 14px;
            padding-top: 5px;
            white-space: nowrap;
        }

        .date-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .date-wrapper input[type="date"] {
            width: 160px;
            padding: 4px 6px;
        }

        .date-wrapper small {
            font-size: 12px;
            color: #555;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 6px 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .row {
            display: flex;
            gap: 10px;
        }
        .rowone{
            width: 50%;
        }

        .row > div {
            flex: 1;
        }

        .checkbox-group {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 20px;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
        }

        .note {
            font-size: 13px;
            margin-bottom: 15px;
            text-align: center;
        }

        .note em {
            font-weight: bold;
        }

        .small {
            font-size: 12px;
            color: #555;
            text-align: right;
        }
        .assets-table-wrapper {
            overflow-x: auto;
        }

        .assets-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            margin-bottom: 15px;
        }

        .assets-table th,
        .assets-table td {
            border: 1px solid #999;
            padding: 8px;
            vertical-align: middle;
            font-weight: normal;
        }

        .assets-table th {
            background-color: #c7d6ea;
            font-size: 14px;
            text-align: center;
        }

        .assets-table input[type="text"] {
            width: 100%;
            border: 1px solid #ccc;
            padding: 4px 6px;
            font-size: 13px;
        }

        button {
            background-color: #1F2937;
            color: white;
            padding: 8px 14px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 10px;
            width: 150px; /* or whatever width looks right */
            text-align: center;
        }
        .button-remove {
            background-color: red;
        }
        .btn-remove {
            background-color: #ED2100;
            color: white;
            padding: 4px 10px;
            border: none;
            border-radius: 4px;
            font-size: 13px;
            cursor: pointer;
            width: 60px;
            margin-top: -50px;
            display: block;
            margin: 0 auto;
        }


        .subtotal-row {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            margin-top: 10px;
            width: 32.5%
        }
        .subtotal-row2 {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            margin-top: 10px;
            width: 100%;
            white-space: nowrap;
        }
        .asset-totals {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-end;
            margin-left: auto;
            margin-top: -52px;
        }
        .asset-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            gap: 20px;
        }
        .asset-controls2 {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-end;
            margin-left: auto;
            margin-top: -42px;
        }
        .assets-table td {
            text-align: center;
            vertical-align: middle;
        }

        .left-button {
            display: flex;
            align-items: center;
        }
        .error {
            font-family: 'Nunito', sans-serif;
            font-size: 0.9rem;
            color: #ed4337;
            margin-bottom: 1.5rem;
        }
        .success {
            font-family: 'Nunito', sans-serif;
            font-size: 0.9rem;
            color: #4bb543;
            margin-bottom: 1.5rem;
        }
        .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background:rgb(255, 255, 255);
        color: #fff;
        height: 56px;
        display: flex;
        align-items: center;
        z-index: 1000;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: top 0.3s ease-in-out; /* Add this line */
        }

        /* Container to center content and limit width */
        .navbar-container {
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        padding: 0 16px;
        justify-content: space-between;
        }

        /* Brand styling */
        .navbar-brand {
        font-weight: bold;
        font-size: 1.25rem;
        color: #1F2937;
        }

        /* Links row */
        .navbar-links {
        list-style: none;
        display: flex;
        gap: 24px;
        }

        /* Link styling */
        .navbar-links a {
        text-decoration: none;
        color: #1F2937;
        font-size: 1rem;
        padding: 8px 12px;
        border-radius: 4px;
        transition: background 0.2s;
        }

        .navbar-links a:hover {
        background: rgba(255,255,255,0.15);
        }
        .child-entry {
            display: flex;
            align-items: flex-end;
            gap: 1rem;
            margin-bottom: 1rem;
            flex-wrap: wrap; /* optional: wrap on small screens */
        }

        .child-field {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-width: 150px;
        }


    </style>
    </head>
    <body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">SALN Portal</div>
            <ul class="navbar-links">
                <li>
                    <a href="/home/logout">
                        Logout
                    </a>
                </li>
                <li>
                    <a href="/home/delete-account" onclick="return confirm('Are you sure you want to delete your account?')">
                        Delete Account
                    </a>
                </li>
                <li>
                    <a>{{ Auth::user()->name }}</a>
                </li>
            </ul>
        </div>
    </nav>


    <form action="{{ route('saln.save') }}" method="POST">
        @csrf
        
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

    <div class="form-container">
        <div class="small">
        Revised as of January 2015<br>
        Per CSC Resolution NO. 1500088<br>
        Promulgated on January 23, 2015
        </div>

        <h2>Sworn Statement of Assets, Liabilities and Net Worth</h2>

        <div class="form-section asof-group">
        <label class="asof-label" for="date">As of</label>
        <div class="date-wrapper">
            <input type="date" id="asof_date" name="asof_date" 
            value="{{ old('asof_date', $saln->asof_date ?? '') }}">
            <div class="error">{{ $errors->first('asOfDate') }}</div>
            <small>(Required by R.A. 6713)</small>
        </div>
        </div>


        <div class="note">
            <em>Note:</em> Husband and wife who are both public officials and employees may file the required statements jointly or separately.
        </div>

        <div class="checkbox-group">
            <label>
                <input type="radio" name="filing_type" value="joint"
                    {{ old('filing_type', $saln->filing_type ?? '') === 'joint' ? 'checked' : '' }}>
                Joint Filing
            </label>
            <label>
                <input type="radio" name="filing_type" value="separate"
                    {{ old('filing_type', $saln->filing_type ?? '') === 'separate' ? 'checked' : '' }}>
                Separate Filing
            </label>
            <label>
                <input type="radio" name="filing_type" value="na"
                    {{ old('filing_type', $saln->filing_type ?? '') === 'na' ? 'checked' : '' }}>
                Not Applicable
            </label>
        </div>


        <!-- Declarant Section -->
        <div class="form-section">
        <h3>Declarant Information</h3>
        <div class="row">
            <div>
                <label for="declarant_family_name">Family Name</label>
                <input type="text" name="declarant_family_name" value="{{ old('declarant_family_name', $saln->declarant_family_name ?? '') }}">
            </div>
            <div>
                <label for="declarant_first_name">First Name</label>
                <input type="text" name="declarant_first_name" value="{{ old('declarant_first_name', $saln->declarant_first_name ?? '') }}">
            </div>
            <div>
                <label for="declarant_mi">M.I.</label>
                <input type="text" name="declarant_mi" value="{{ old('declarant_mi', $saln->declarant_mi ?? '') }}">
            </div>
        </div>
        <!-- DECLARANT HOME ADRESS -->
        <h3>Home Address</h3>
        <div class="row">
            <div>
                <label for="declarant_house_number">House Number</label>
                <input type="text" name="declarant_house_number" value="{{ old('declarant_house_number', $saln->declarant_house_number ?? '') }}">
            </div>
            <div>
                <label for="declarant_house_street">Street</label>
                <input type="text" name="declarant_house_street" value="{{ old('declarant_house_street', $saln->declarant_house_street ?? '') }}">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="declarant_house_subdivision">Subdivision</label>
                <input type="text" name="declarant_house_subdivision" value="{{ old('declarant_house_subdivision', $saln->declarant_house_subdivision ?? '') }}">
            </div>
            <div>
                <label for="declarant_house_barangay">Barangay</label>
                <input type="text" name="declarant_house_barangay" value="{{ old('declarant_house_barangay', $saln->declarant_house_barangay ?? '') }}">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="declarant_house_city">City/Municipality</label>
                <input type="text" name="declarant_house_city" value="{{ old('declarant_house_city', $saln->declarant_house_city ?? '') }}">
            </div>
            <div>
                <label for="declarant_house_region">Region</label>
                <input type="text" name="declarant_house_region" value="{{ old('declarant_house_region', $saln->declarant_house_region ?? '') }}">
            </div>
        </div>
        <div class="rowone">
            <div>
                <label for="declarant_house_zip">Zip Code</label>
                <input type="text" name="declarant_house_zip" value="{{ old('declarant_house_zip', $saln->declarant_house_zip ?? '') }}">
            </div>
        </div>
        <!-- DECLARANT OFFICE ADDRESS -->
        <h3>Office Address</h3>
        <div class="row">
            <div>
                <label for="declarant_office_name">Agency/Office</label>
                <input type="text" name="declarant_office_name" value="{{ old('declarant_office_name', $saln->declarant_office_name ?? '') }}">
            </div>
            <div>
                <label for="declarant_office_street">Street</label>
                <input type="text" name="declarant_office_street" value="{{ old('declarant_office_street', $saln->declarant_office_street ?? '') }}">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="declarant_office_city">City/Municipality</label>
                <input type="text" name="declarant_office_city" value="{{ old('declarant_office_city', $saln->declarant_office_city ?? '') }}">
            </div>
            <div>
                <label for="declarant_office_region">Region</label>
                <input type="text" name="declarant_office_region" value="{{ old('declarant_office_region', $saln->declarant_office_region ?? '') }}">
            </div>
        </div>
        <div class="rowone">
            <div>
                <label for="declarant_office_zip">Zip Code</label>
                <input type="text" name="declarant_office_zip" value="{{ old('declarant_office_zip', $saln->declarant_office_zip ?? '') }}">
            </div>
        </div>
        </div>


        @php
            $spouses = collect(old('spouse_first_name', $saln->spouses ?? []))->map(function ($_, $i) use ($saln) {
                return [
                    'family_name' => old('spouse_family_name')[$i] ?? ($saln->spouses[$i]->family_name ?? ''),
                    'first_name' => old('spouse_first_name')[$i] ?? ($saln->spouses[$i]->first_name ?? ''),
                    'mi' => old('spouse_mi')[$i] ?? ($saln->spouses[$i]->mi ?? ''),
                    'house_number' => old('spouse_house_number')[$i] ?? ($saln->spouses[$i]->house_number ?? ''),
                    'house_street' => old('spouse_house_street')[$i] ?? ($saln->spouses[$i]->house_street ?? ''),
                    'house_subdivision' => old('spouse_house_subdivision')[$i] ?? ($saln->spouses[$i]->house_subdivision ?? ''),
                    'house_barangay' => old('spouse_house_barangay')[$i] ?? ($saln->spouses[$i]->house_barangay ?? ''),
                    'house_city' => old('spouse_house_city')[$i] ?? ($saln->spouses[$i]->house_city ?? ''),
                    'house_region' => old('spouse_house_region')[$i] ?? ($saln->spouses[$i]->house_region ?? ''),
                    'house_zip' => old('spouse_house_zip')[$i] ?? ($saln->spouses[$i]->house_zip ?? ''),
                    'office_name' => old('spouse_office_name')[$i] ?? ($saln->spouses[$i]->office_name ?? ''),
                    'office_street' => old('spouse_office_street')[$i] ?? ($saln->spouses[$i]->office_street ?? ''),
                    'office_city' => old('spouse_office_city')[$i] ?? ($saln->spouses[$i]->office_city ?? ''),
                    'office_region' => old('spouse_office_region')[$i] ?? ($saln->spouses[$i]->office_region ?? ''),
                    'office_zip' => old('spouse_office_zip')[$i] ?? ($saln->spouses[$i]->office_zip ?? ''),
                ];
            });

            // If empty, start with one empty spouse input
            if ($spouses->isEmpty()) {
                $spouses->push([
                    'family_name' => '',
                    'first_name' => '',
                    'mi' => '',
                    'house_number' => '',
                    'house_street' => '',
                    'house_subdivision' => '',
                    'house_barangay' => '',
                    'house_city' => '',
                    'house_region' => '',
                    'house_zip' => '',
                    'office_name' => '',
                    'office_street' => '',
                    'office_city' => '',
                    'office_region' => '',
                    'office_zip' => '',
                ]);
            }
        @endphp

        <div id="spouseRepeater">
            @foreach ($spouses as $index => $spouse)
            <div class="spouse-block">
                <h4 class="spouse-header">Spouse {{ $index + 1 }} Information</h4>
                <div class="row">
                    <div>
                        <label>Family Name</label>
                        <input type="text" name="spouse_family_name[]" value="{{ $spouse['family_name'] }}">
                    </div>
                    <div>
                        <label>First Name</label>
                        <input type="text" name="spouse_first_name[]" value="{{ $spouse['first_name'] }}">
                    </div>
                    <div>
                        <label>M.I.</label>
                        <input type="text" name="spouse_mi[]" value="{{ $spouse['mi'] }}">
                    </div>
                </div>

                <h4>Home Address</h4>
                <div class="row">
                    <div>
                        <label>House Number</label>
                        <input type="text" name="spouse_house_number[]" value="{{ $spouse['house_number'] }}">
                    </div>
                    <div>
                        <label>Street</label>
                        <input type="text" name="spouse_house_street[]" value="{{ $spouse['house_street'] }}">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label>Subdivision</label>
                        <input type="text" name="spouse_house_subdivision[]" value="{{ $spouse['house_subdivision'] }}">
                    </div>
                    <div>
                        <label>Barangay</label>
                        <input type="text" name="spouse_house_barangay[]" value="{{ $spouse['house_barangay'] }}">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label>City/Municipality</label>
                        <input type="text" name="spouse_house_city[]" value="{{ $spouse['house_city'] }}">
                    </div>
                    <div>
                        <label>Region</label>
                        <input type="text" name="spouse_house_region[]" value="{{ $spouse['house_region'] }}">
                    </div>
                </div>
                <div class="rowone">
                    <div>
                        <label>Zip Code</label>
                        <input type="text" name="spouse_house_zip[]" value="{{ $spouse['house_zip'] }}">
                    </div>
                </div>

                <h4>Office Address</h4>
                <div class="row">
                    <div>
                        <label>Agency/Office</label>
                        <input type="text" name="spouse_office_name[]" value="{{ $spouse['office_name'] }}">
                    </div>
                    <div>
                        <label>Street</label>
                        <input type="text" name="spouse_office_street[]" value="{{ $spouse['office_street'] }}">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label>City/Municipality</label>
                        <input type="text" name="spouse_office_city[]" value="{{ $spouse['office_city'] }}">
                    </div>
                    <div>
                        <label>Region</label>
                        <input type="text" name="spouse_office_region[]" value="{{ $spouse['office_region'] }}">
                    </div>
                </div>
                <div class="rowone">
                    <div>
                        <label>Zip Code</label>
                        <input type="text" name="spouse_office_zip[]" value="{{ $spouse['office_zip'] }}">
                    </div>
                </div>

                <div class="spouse-actions">
                    <button type="button" class="button-remove remove-spouse" onclick="removeSpouseBlock(this)">Remove Spouse</button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Add Row Button -->
        <div class="left-button">
            <button type="button" onclick="addSpouseBlock()">Add Spouse</button>
        </div>

        <h3>Unmarried Children</h3>

        @php
            $children = collect(old('children_name', $saln->unmarriedChildren ?? []))->map(function ($_, $i) use ($saln) {
                return [
                    'name' => old('children_name')[$i] ?? ($saln->unmarriedChildren[$i]->name ?? ''),
                    'dob' => old('children_dob')[$i] ?? ($saln->unmarriedChildren[$i]->date_of_birth ?? ''),
                ];
            });
        @endphp


        <div id="children_fields">
            @foreach ($children as $i => $child)
                <div class="child-entry">
                    <div class="child-field">
                        <label>Child Name</label>
                        <input type="text" name="children_name[]" value="{{ $child['name'] }}">
                    </div>
                    <div class="child-field">
                        <label>Date of Birth</label>
                        <input type="date" name="children_dob[]" value="{{ $child['dob'] }}" onchange="calculateAge(this)">
                    </div>
                    <div class="child-field">
                        <label>Age</label>
                        <input type="text" name="children_age[]" readonly>
                    </div>
                </div>
            @endforeach
        </div>



        <div class="left-button">
            <button type="button" style="font-size: 13px;" onclick="addChildRow()">Add Unmarried Child</button>
        </div>
        <div class="left-button">
            <button type="button" style="font-size: 13px;" class="button-remove" onclick="removeLastChildRow()">Remove Unmarried Child</button>
        </div>

        <!-- Assets Section -->
        <div class="form-section">
            <h2>Assets, Liabilities and Net Worth</h2>
            <h3>Assets</h3>
            <h4 style="font-weight:normal;">Real Properties</h4>
            <div class="assets-table-wrapper">
                <table class="assets-table">
                    <thead>
                        <tr>
                            <th colspan="1">Description</th>
                            <th colspan="1">Kind</th>
                            <th rowspan="2">Exact Location</th>
                            <th colspan="1">Assessed Value</th>
                            <th colspan="1">Current Fair Market Value</th>
                            <th colspan="2">Acquisition</th>
                            <th rowspan="2">Acquisition Cost</th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th><small>(e.g. lot, house and lot, condominium, and improvements)</small></th>
                            <th><small>(e.g., residential, commercial, industrial, agricultural and mixed used)</small></th>
                            <th colspan="2"><small>(As found in the Tax Declaration of Real Property)</small></th>
                            <th>Year</th>
                            <th>Mode</th>
                        </tr>
                    </thead>
                    <tbody id="assetsReal">
                    @php
                        $realProps = old('description') 
                            ? collect(old('description'))->map(function ($desc, $i) {
                                return [
                                    'description' => $desc,
                                    'kind' => old("kind.$i"),
                                    'location' => old("location.$i"),
                                    'assessed_value' => old("assessed_value.$i"),
                                    'market_value' => old("market_value.$i"),
                                    'acquisition_year' => old("acquisition_year.$i"),
                                    'acquisition_mode' => old("acquisition_mode.$i"),
                                    'acquisition_cost' => old("acquisition_cost.$i"),
                                ];
                            }) 
                            : ($saln->realProperties ?? collect());
                    @endphp

                    @forelse ($realProps as $i => $row)
                    <tr>
                        <td><input type="text" name="description[]" value="{{ old("description.$i", $row['description'] ?? $row->description ?? '') }}"></td>
                        <td><input type="text" name="kind[]" value="{{ old("kind.$i", $row['kind'] ?? $row->kind ?? '') }}"></td>
                        <td><input type="text" name="location[]" value="{{ old("location.$i", $row['location'] ?? $row->location ?? '') }}"></td>
                        <td><input type="text" name="assessed_value[]" value="{{ old("assessed_value.$i", $row['assessed_value'] ?? $row->assessed_value ?? '') }}"></td>
                        <td><input type="text" name="market_value[]" value="{{ old("market_value.$i", $row['market_value'] ?? $row->market_value ?? '') }}"></td>
                        <td><input type="text" name="acquisition_year[]" value="{{ old("acquisition_year.$i", $row['acquisition_year'] ?? $row->acquisition_year ?? '') }}"></td>
                        <td><input type="text" name="acquisition_mode[]" value="{{ old("acquisition_mode.$i", $row['acquisition_mode'] ?? $row->acquisition_mode ?? '') }}"></td>
                        <td><input type="text" name="acquisition_cost[]" value="{{ old("acquisition_cost.$i", $row['acquisition_cost'] ?? $row->acquisition_cost ?? '') }}" oninput="calculateRealSubtotal()"></td>
                        <td><button type="button" class="btn btn-remove" onclick="removeRealPropertyRow(this)">Delete</button></td>
                    </tr>
                    @empty
                    <tr>
                        <td><input type="text" name="description[]"></td>
                        <td><input type="text" name="kind[]"></td>
                        <td><input type="text" name="location[]"></td>
                        <td><input type="text" name="assessed_value[]"></td>
                        <td><input type="text" name="market_value[]"></td>
                        <td><input type="text" name="acquisition_year[]"></td>
                        <td><input type="text" name="acquisition_mode[]"></td>
                        <td><input type="text" name="acquisition_cost[]" oninput="calculateRealSubtotal()"></td>
                        <td><button type="button" class="btn btn-remove" onclick="removeRealPropertyRow(this)">Delete</button></td>
                    </tr>
                    @endforelse
                </tbody>
                </table>
                <button type="button" onclick="addRealProperty()">Add Another Entry</button>
                <div class="asset-controls2">
                <div class="subtotal-row">
                    <label for="subtotal">Subtotal: </label>
                    <input type="text" id="subtotalReal" readonly>
                </div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4 style="font-weight:normal;">Personal Properties</h4>
            <div class="assets-table-wrapper">
                <table class="assets-table">
                    <thead>
                        <tr>
                            <th rowspan="1">Description</th>
                            <th rowspan="1">Year Acquired</th>
                            <th rowspan="1">Acquisition Cost/Amount</th>
                            <th rowspan="1"></th>
                        </tr>
                    </thead>
                    <tbody id="assetsPersonal">
                    @php
                        $personalProps = old('personal_description') 
                            ? collect(old('personal_description'))->map(function ($desc, $i) {
                                return [
                                    'personal_description' => $desc,
                                    'personal_year_acquired' => old("personal_year_acquired.$i"),
                                    'personal_acquisition_cost' => old("personal_acquisition_cost.$i"),
                                ];
                            })
                            : ($saln->personalProperties ?? collect());
                    @endphp

                    @foreach ($personalProps as $i => $row)
                        <tr>
                            <td>
                                <input type="text" name="personal_description[]" 
                                    value="{{ old("personal_description.$i", $row['personal_description'] ?? $row->personal_description ?? '') }}">
                            </td>
                            <td>
                                <input type="text" name="personal_year_acquired[]" 
                                    value="{{ old("personal_year_acquired.$i", $row['personal_year_acquired'] ?? $row->personal_year_acquired ?? '') }}">
                            </td>
                            <td>
                                <input type="text" name="personal_acquisition_cost[]" 
                                    value="{{ old("personal_acquisition_cost.$i", $row['personal_acquisition_cost'] ?? $row->personal_acquisition_cost ?? '') }}" 
                                    oninput="calculatePersonalSubtotal()">
                            </td>
                            <td>
                                <button type="button" class="btn btn-remove" onclick="removePersonalPropertyRow(this)">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                    @if ($personalProps->isEmpty())
                        {{-- Default blank row --}}
                        <tr>
                            <td><input type="text" name="personal_description[]"></td>
                            <td><input type="text" name="personal_year_acquired[]"></td>
                            <td><input type="text" name="personal_acquisition_cost[]" oninput="calculatePersonalSubtotal()"></td>
                            <td><button type="button" class="btn btn-remove" onclick="removePersonalPropertyRow(this)">Delete</button></td>
                        </tr>
                    @endif
                </tbody>
                </table>
                <div class="left-button">
                    <button type="button" onclick="addPersonalProperty()">Add Another Entry</button>
                </div>
                <div class="asset-controls">
                <div class ="asset-totals">
                    <div class="subtotal-row2">
                        <label for="subtotal">Subtotal: </label>
                        <input type="text" id="subtotalPersonal" readonly>
                    </div>
                    <div class="subtotal-row2">
                        <label for="totalAssets">Total Assets: </label>
                        <input type="text" id="totalAssets" readonly>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
        <div class="form-section">
            <h4 style="font-weight:normal;">Liabilities</h4>
            <div class="assets-table-wrapper">
                <table class="assets-table">
                    <thead>
                        <tr>
                            <th rowspan="1">Nature</th>
                            <th rowspan="1">Name of Creditors</th>
                            <th rowspan="1">Outstanding Balance</th>
                            <th rowspan="1"></th>

                        </tr>
                    </thead>
                    <tbody id="liabilitiesBody">
                    @php
                        $liabilityProps = old('nature') 
                            ? collect(old('nature'))->map(function ($nature, $i) {
                                return (object) [
                                    'nature' => $nature,
                                    'name_creditor' => old("name_creditor.$i"),
                                    'outstanding_balance' => old("outstanding_balance.$i"),
                                ];
                            }) 
                            : ($saln->liabilities ?? collect());
                    @endphp
                    @foreach ($liabilityProps as $i => $row)
                    <tr>
                        <td>
                            <input type="text" name="nature[]" 
                                value="{{ old("nature.$i") ?? $row->nature }}">
                        </td>
                        <td>
                            <input type="text" name="name_creditor[]" 
                                value="{{ old("name_creditor.$i") ?? $row->name_creditor }}">
                        </td>
                        <td>
                            <input type="text" name="outstanding_balance[]" 
                                value="{{ old("outstanding_balance.$i") ?? $row->outstanding_balance }}"
                                oninput="calculateLiabilitiesSubtotal()">
                        </td>
                        <td>
                            <button type="button" class="btn btn-remove" onclick="removeLiabilitiesRow(this)">Delete</button>
                        </td>
                    </tr>
                    @endforeach

                    @if ($liabilityProps->isEmpty())
                        {{-- Default blank row --}}
                        <tr>
                            <td><input type="text" name="nature[]"></td>
                            <td><input type="text" name="name_creditor[]"></td>
                            <td><input type="text" name="outstanding_balance[]" oninput="calculateLiabilitiesSubtotal()"></td>
                            <td><button type="button" class="btn btn-remove" onclick="removeLiabilitiesRow(this)">Delete</button></td>
                        </tr>
                    @endif
                </tbody>

                </table>
                <div class="left-button">
                    <button type="button" onclick="addLiability()">Add Another Entry</button>
                </div>
                <div class="asset-controls">
                <div class ="asset-totals">
                    <div class="subtotal-row2">
                        <label for="subtotal">Subtotal: </label>
                        <input type="text" id="subtotalLiabilities" readonly>
                    </div>
                    <div class="subtotal-row2">
                        <label for="totalAssets">Networth: </label>
                        <input type="text" id="netWorth" readonly>
                    </div>
                </div>
                
                </div>
            </div>
        </div>

        <div class="form-section">
        <h3 style="text-align: center;">Business Interests and Financial Connections</h3>
        <div class="note">
            (of Declarant/Declarant’s Spouse/Unmarried Children Below 
            Eighteen (18) years of Age Living in Declarant’s Household)
        </div>
        <div class="checkbox-group">
            <label>
            <input type="checkbox" name="noBusinessInterest" />
            I/We do not have any business interest or financial connection
            </label>

        </div>
        <div class="assets-table-wrapper">
                <table class="assets-table">
                    <thead>
                        <tr>
                            <th rowspan="1">Name of Entity/Business Enterprise</th>
                            <th rowspan="1">Business Address</th>
                            <th rowspan="1">Nature of Business Interest and/or Financial Connection</th>
                            <th rowspan="1">Date of Acquisition of Interest or Connection</th>
                            <th rowspan="1"></th>
                        </tr>
                    </thead>
                    <tbody id="businessBody">
                    @php
                        $businessProps = old('nameBusiness')
                            ? collect(old('nameBusiness'))->map(function ($name, $i) {
                                return [
                                    'name_business'     => $name,
                                    'address_business'  => old("addressBusiness.$i"),
                                    'nature_business'   => old("natureBusiness.$i"),
                                    'date_interest'     => old("dateInterest.$i"),
                                ];
                            })
                            : ($saln->businessInterests ?? collect());
                    @endphp

                    @foreach ($businessProps as $i => $row)
                        <tr>
                            <td>
                                <input type="text" name="nameBusiness[]"
                                    value="{{ old("nameBusiness.$i", $row['name_business'] ?? $row->name_business ?? '') }}">
                            </td>
                            <td>
                                <input type="text" name="addressBusiness[]"
                                    value="{{ old("addressBusiness.$i", $row['address_business'] ?? $row->address_business ?? '') }}">
                            </td>
                            <td>
                                <input type="text" name="natureBusiness[]"
                                    value="{{ old("natureBusiness.$i", $row['nature_business'] ?? $row->nature_business ?? '') }}">
                            </td>
                            <td>
                                <input type="text" name="dateInterest[]"
                                    value="{{ old("dateInterest.$i", $row['date_interest'] ?? $row->date_interest ?? '') }}">
                            </td>
                            <td>
                                <button type="button" class="btn btn-remove" onclick="removeBusinessRow(this)">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                    @if ($businessProps->isEmpty())
                        {{-- Default blank row --}}
                        <tr>
                            <td><input type="text" name="nameBusiness[]"></td>
                            <td><input type="text" name="addressBusiness[]"></td>
                            <td><input type="text" name="natureBusiness[]"></td>
                            <td><input type="text" name="dateInterest[]"></td>
                            <td><button type="button" class="btn btn-remove" onclick="removeBusinessRow(this)">Delete</button></td>
                        </tr>
                    @endif
                </tbody>

                </table>
                <div class="left-button">
                    <button type="button" onclick="addBusiness()">Add Another Entry</button>
                </div>
            </div>

            <div class="form-section">
        <h3 style="text-align: center;">Relatives in the Government Service</h3>
        <div class="note">
            (Within the Fourth Degree of Consanguinity or Affinity, 
            Include also Bilas, Balae, and Inso)
        </div>
        <div class="checkbox-group">
            <label>
            <input type="checkbox" name="noBusinessInterest" />
            I/We do not have any relative/s in the government service
            </label>

        </div>
        <div class="assets-table-wrapper">
                <table class="assets-table">
                    <thead>
                        <tr>
                            <th rowspan="1">Name of Relative</th>
                            <th rowspan="1">Relationship</th>
                            <th rowspan="1">Position</th>
                            <th rowspan="1">Name of Agency/Office and Adress</th>
                            <th rowspan="1"></th>
                        </tr>
                    </thead>
                    <tbody id="relativesBody">
                    @php
                        $relativeProps = old('nameRelative')
                            ? collect(old('nameRelative'))->map(function ($name, $i) {
                                return [
                                    'name_relative' => $name,
                                    'relationship'  => old("relationship.$i"),
                                    'position'      => old("position.$i"),
                                    'name_agency'   => old("nameAgency.$i"),
                                ];
                            })
                            : ($saln->relativesInGovernment ?? collect());
                    @endphp

                    @foreach ($relativeProps as $i => $row)
                        <tr>
                            <td>
                                <input type="text" name="nameRelative[]"
                                    value="{{ old("nameRelative.$i", $row['name_relative'] ?? $row->name_relative ?? '') }}">
                            </td>
                            <td>
                                <input type="text" name="relationship[]"
                                    value="{{ old("relationship.$i", $row['relationship'] ?? $row->relationship ?? '') }}">
                            </td>
                            <td>
                                <input type="text" name="position[]"
                                    value="{{ old("position.$i", $row['position'] ?? $row->position ?? '') }}">
                            </td>
                            <td>
                                <input type="text" name="nameAgency[]"
                                    value="{{ old("nameAgency.$i", $row['name_agency'] ?? $row->name_agency ?? '') }}">
                            </td>
                            <td>
                                <button type="button" class="btn btn-remove" onclick="removeRelativeRow(this)">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                    @if ($relativeProps->isEmpty())
                        {{-- Default blank row --}}
                        <tr>
                            <td><input type="text" name="nameRelative[]"></td>
                            <td><input type="text" name="relationship[]"></td>
                            <td><input type="text" name="position[]"></td>
                            <td><input type="text" name="nameAgency[]"></td>
                            <td><button type="button" class="btn btn-remove" onclick="removeRelativeRow(this)">Delete</button></td>
                        </tr>
                    @endif
                </tbody>

                </table>
                <div class="left-button">
                    <button type="button" onclick="addRelative()">Add Another Entry</button>
                </div>
            </div>
        <div class="form-section">
        <p style="text-align: justify;">
            I hereby certify that these are true and correct statements of my assets, liabilities, net worth,
            business interests and financial connections, including those of my spouse and unmarried children below
            eighteen (18) years of age living in my household, and that to the best of my knowledge, the above-enumerated
            are names of my relatives in the government within the fourth civil degree of consanguinity or affinity.
        </p>
        <p style="text-align: justify;">
            I hereby authorize the Ombudsman or his/her duly authorized representative to obtain and
            secure from all appropriate government agencies, including the Bureau of Internal Revenue such
            documents that may show my assets, liabilities, net worth, business interests and financial connections,
            to include those of my spouse and unmarried children below 18 years of age living with me in my
            household covering previous years to include the year I first assumed office in government.
        </p>
        <br>
        <p>Date: _______________________________________</p>
        <br>
        <div class="row" style="margin-top: 30px;">
        <div style="flex: 1; text-align: center;">
            <div style="border-top: 1px solid #000; width: 80%; margin: 0 auto 8px;"></div>
            <label>Signature of Declarant</label>
            <div>
                <label>Government Issued ID</label>
                <input type="text" name="govIDDeclarant"
                    value="{{ old('govIDDeclarant', $saln->gov_id_declarant ?? '') }}">
            </div>
            <div>
                <label>ID No.:</label>
                <input type="text" name="idNoDeclarant"
                    value="{{ old('idNoDeclarant', $saln->id_no_declarant ?? '') }}">
            </div>
            <div>
                <label>Date Issued:</label>
                <input type="date" name="idDateDeclarant"
                    value="{{ old('idDateDeclarant', $saln->id_date_declarant ?? '') }}">
            </div>
        </div>

        <div style="flex: 1; text-align: center;">
            <div style="border-top: 1px solid #000; width: 80%; margin: 0 auto 8px;"></div>
            <label>Signature of Co-Declarant/Spouse</label>
            <div>
                <label>Government Issued ID</label>
                <input type="text" name="govIDSpouse"
                    value="{{ old('govIDSpouse', $saln->gov_id_spouse ?? '') }}">
            </div>
            <div>
                <label>ID No.:</label>
                <input type="text" name="idNoSpouse"
                    value="{{ old('idNoSpouse', $saln->id_no_spouse ?? '') }}">
            </div>
            <div>
                <label>Date Issued:</label>
                <input type="date" name="idDateSpouse"
                    value="{{ old('idDateSpouse', $saln->id_date_spouse ?? '') }}">
            </div>
        </div>
    </div>

        <p style="margin-top: 30px;">
            <strong>SUBSCRIBED AND SWORN</strong> to before me this ______ day of ____________, affiant exhibiting to me the
            above-stated government issued identification card.
        </p>

        <div style="text-align: center; margin-top: 40px;">
            <div style="border-top: 1px solid #000; width: 300px; margin: 0 auto 8px;"></div>
            <label>Person Administering Oath</label>
        </div>
    </div>

        </div>
    </div>
        <button type="submit">Save SALN</button>
    </form>

    <script>
        function addSpouseBlock() {
        const container = document.getElementById('spouseRepeater');
        const original = container.querySelector('.spouse-block');
        const clone = original.cloneNode(true);

                   
        clone.querySelectorAll('input').forEach(input => input.value = '');

        container.appendChild(clone);
        container.querySelectorAll('.spouse-header').forEach((el, idx) => {
            el.textContent = `Spouse ${idx + 1} Information`;
        });
        }

        function removeSpouseBlock(button) {
            const container = document.getElementById('spouseRepeater');
            const blocks = container.querySelectorAll('.spouse-block');

            if (blocks.length > 1) {
                // Remove the clicked spouse block
                button.closest('.spouse-block').remove();

                // Renumber the remaining headers
                container.querySelectorAll('.spouse-header').forEach((el, idx) => {
                    el.textContent = `Spouse ${idx + 1} Information`;
                });
            } else {
                alert("At least one spouse block is required.");
            }
        }

        function addRealProperty() {
            const tbody = document.querySelector('#assetsReal');

            const tr = document.createElement('tr');
            const inputNames = [
                'description[]',
                'kind[]',
                'location[]',
                'assessed_value[]',
                'market_value[]',
                'acquisition_year[]',
                'acquisition_mode[]',
                'acquisition_cost[]'
            ];

            inputNames.forEach(name => {
                const td = document.createElement('td');
                const input = document.createElement('input');
                input.type = 'text';
                input.name = name;
                if (name === 'acquisition_cost[]') {
                    input.addEventListener('input', calculateRealSubtotal);
                }
                td.appendChild(input);
                tr.appendChild(td);
            });

            // Add delete button
            const tdDelete = document.createElement('td');
            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.textContent = 'Delete';
            deleteBtn.className = 'btn btn-remove';
            deleteBtn.onclick = function () {
                const totalRows = tbody.querySelectorAll('tr').length;
                if (totalRows > 1) {
                    tr.remove();
                } else {
                    alert("At least one row is required.");
                }
            };
            tdDelete.appendChild(deleteBtn);
            tr.appendChild(tdDelete);

            tbody.appendChild(tr);
        }

        function removeRealPropertyRow(button) {
            const row = button.closest('tr');
            const tbody = document.getElementById('assetsReal');
            const totalRows = tbody.querySelectorAll('tr').length;

            if (totalRows > 1) {
                row.remove();
            } else {
                alert("At least one row is required.");
            }
            calculateRealSubtotal();
        }
        function calculateRealSubtotal() {
            let total = 0;
            const inputs = document.querySelectorAll('input[name="acquisition_cost[]"]');

            inputs.forEach(input => {
                const value = parseFloat(input.value.replace(/,/g, ''));
                if (!isNaN(value)) {
                    total += value;
                }
                        input.value = value.toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
            });

            document.getElementById('subtotalReal').value = total.toLocaleString('en-US', { minimumFractionDigits: 2 });
            calculateTotalAssets();
        }
        document.addEventListener('DOMContentLoaded', function () {
            calculateRealSubtotal();
        });

        function addPersonalProperty() {
            const tbody = document.querySelector("#assetsPersonal");
            const tr = document.createElement('tr');

            const inputNames = [
                'personal_description[]',
                'personal_year_acquired[]',
                'personal_acquisition_cost[]'
            ];

            inputNames.forEach(name => {
                const td = document.createElement('td');
                const input = document.createElement('input');
                input.type = 'text';
                input.name = name;

                if (name === 'acquisitionCost[]') {
                    input.addEventListener('input', calculatePersonalSubtotal);
                }

                td.appendChild(input);
                tr.appendChild(td);
            });

            // Add delete button
            const tdDelete = document.createElement('td');
            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.textContent = 'Delete';
            deleteBtn.className = 'btn btn-remove';
            deleteBtn.onclick = function () {
                const totalRows = tbody.querySelectorAll('tr').length;
                if (totalRows > 1) {
                    tr.remove();
                } else {
                    alert("At least one row is required.");
                }
            };

            tdDelete.appendChild(deleteBtn);
            tr.appendChild(tdDelete);
            tbody.appendChild(tr);
        }

        function removePersonalPropertyRow(button) {
            const row = button.closest('tr');
            const tbody = document.getElementById('assetsPersonal');
            const totalRows = tbody.querySelectorAll('tr').length;

            if (totalRows > 1) {
                row.remove();
            } else {
                alert("At least one row is required.");
            }
            calculatePersonalSubtotal();
        }
        function calculatePersonalSubtotal() {
            let total = 0;
            const inputs = document.querySelectorAll('input[name="personal_acquisition_cost[]"]');

            inputs.forEach(input => {
                // Remove commas and parse value
                let rawValue = input.value.replace(/,/g, '');
                let value = parseFloat(rawValue);

                if (!isNaN(value)) {
                    total += value;

                    // Optional: reformat input value with commas
                    input.value = value.toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                }
            });

            // Update subtotal field
            const subtotalField = document.getElementById('subtotalPersonal');
            if (subtotalField) {
                subtotalField.value = total.toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }

            calculateTotalAssets(); // Call next subtotal function if needed
        }

        
        document.addEventListener('DOMContentLoaded', function () {
            calculatePersonalSubtotal();
        });

        function calculateTotalAssets() {
            const real = parseFloat(document.getElementById('subtotalReal').value.replace(/,/g, '')) || 0;
            const personal = parseFloat(document.getElementById('subtotalPersonal').value.replace(/,/g, '')) || 0;

            const total = real + personal;

            document.getElementById('totalAssets').value = total.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            calculateNetWorth();
            
        }

        function addLiability() {
            const tbody = document.querySelector("#liabilitiesBody");
            const tr = document.createElement('tr');

            const inputNames = [
                'nature[]',
                'name_creditor[]',
                'outstanding_balance[]'
            ];

            inputNames.forEach(name => {
                const td = document.createElement('td');
                const input = document.createElement('input');
                input.type = 'text';
                input.name = name;
                if (name === 'outstanding_balance[]') {
                    input.addEventListener('input', calculateLiabilitiesSubtotal);
                }
                td.appendChild(input);
                tr.appendChild(td);
            });

            const tdDelete = document.createElement('td');
            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.textContent = 'Delete';
            deleteBtn.className = 'btn btn-remove';
            deleteBtn.onclick = function () {
                const totalRows = tbody.querySelectorAll('tr').length;
                if (totalRows > 1) {
                    tr.remove();
                } else {
                    alert("At least one row is required.");
                }
            };
            tdDelete.appendChild(deleteBtn);
            tr.appendChild(tdDelete);

            tbody.appendChild(tr);
        }

        function removeLiabilitiesRow(button) {
            const row = button.closest('tr');
            const tbody = document.getElementById('liabilitiesBody');
            const totalRows = tbody.querySelectorAll('tr').length;

            if (totalRows > 1) {
                row.remove();
            } else {
                alert("At least one row is required.");
            }
            calculateLiabilitiesSubtotal();
        }
        function calculateLiabilitiesSubtotal() {
            let total = 0;
            const inputs = document.querySelectorAll('input[name="outstanding_balance[]"]');

            inputs.forEach(input => {
                const value = parseFloat(input.value.replace(/,/g, ''));
                if (!isNaN(value)) {
                    total += value;
                }
            });

            document.getElementById('subtotalLiabilities').value = total.toLocaleString('en-US', { minimumFractionDigits: 2 });
            calculateNetWorth();
        }
        function calculateNetWorth() {
            const assets = parseFloat(document.getElementById('totalAssets').value.replace(/,/g, '')) || 0;
            const liabilities = parseFloat(document.getElementById('subtotalLiabilities').value.replace(/,/g, '')) || 0;

            const netWorth = assets - liabilities;

            document.getElementById('netWorth').value = netWorth.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }    
        function addBusiness(){
            const tbody = document.querySelector('#businessBody');
            const tr = document.createElement('tr');
            const inputNames = [
                'nameBusiness[]',
                'addressBusiness[]',
                'natureBusiness[]',
                'dateInterest[]'
            ]
            inputNames.forEach(name => {
                const td = document.createElement('td');
                const input = document.createElement('input');
                input.name = name;
                input.type = 'text';
                td.appendChild(input);
                tr.appendChild(td);
            })
            tbody.append(tr);
            // Add delete button
                const tdDelete = document.createElement('td');
                const deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.textContent = 'Delete';
                deleteBtn.className = 'btn btn-remove'; // Add your styles here
                deleteBtn.onclick = function () {
                    const totalRows = tbody.querySelectorAll('tr').length;
                    if (totalRows > 1) {
                        tr.remove();
                    } else {
                        alert("At least one row is required.");
                    }
                };
                tdDelete.appendChild(deleteBtn);
                tr.appendChild(tdDelete); 
            }
        function removeBusinessRow(button) {
            const row = button.closest('tr');
            const tbody = document.getElementById('businessBody');
            const totalRows = tbody.querySelectorAll('tr').length;

            if (totalRows > 1) {
                row.remove();
            } else {
                alert("At least one row is required.");
            }
        }    
        function addRelative(){
            const tbody = document.querySelector('#relativesBody');
            const tr = document.createElement('tr');
            const inputNames = [
                'nameRelative[]',
                'relationship[]',
                'position[]',
                'nameAgency[]'
            ]
            inputNames.forEach(name => {
                const td = document.createElement('td');
                const input = document.createElement('input');
                input.name = name;
                input.type = 'text';
                td.appendChild(input);
                tr.appendChild(td);
            })
                tbody.append(tr);
                // Add delete button
                const tdDelete = document.createElement('td');
                const deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.textContent = 'Delete';
                deleteBtn.className = 'btn btn-remove'; // Add your styles here
                deleteBtn.onclick = function () {
                    const totalRows = tbody.querySelectorAll('tr').length;
                    if (totalRows > 1) {
                        tr.remove();
                    } else {
                        alert("At least one row is required.");
                    }
                };
                tdDelete.appendChild(deleteBtn);
                tr.appendChild(tdDelete); 
            }
        function removeRelativeRow(button) {
            const row = button.closest('tr');
            const tbody = document.getElementById('relativesBody');
            const totalRows = tbody.querySelectorAll('tr').length;

            if (totalRows > 1) {
                row.remove();
            } else {
                alert("At least one row is required.");
            }
        }  
        function addChildRow() {
            const container = document.getElementById('children_fields');
            const newRow = document.createElement('div');
                newRow.classList.add('row', 'child-entry');
                newRow.innerHTML = `
                    <div>
                        <label>Name</label>
                        <input type="text" name="children_name[]">
                    </div>
                    <div>
                        <label>Date of Birth</label>
                        <input type="date" name="children_dob[]" onchange="calculateAge(this)">
                    </div>
                    <div>
                        <label>Age</label>
                        <input type="text" name="children_age[]" readonly>
                    </div>
                `;
                container.appendChild(newRow);
        }
        function removeLastChildRow() {
            const container = document.getElementById('children_fields');
            const allRows = container.querySelectorAll('.child-entry');

            if (allRows.length > 0) {
                const lastRow = allRows[allRows.length - 1];

                // If the last row has an ID (means it's from DB), store it in a hidden field for deletion
                const idInput = lastRow.querySelector('input[name="children_id[]"]');
                if (idInput && idInput.value) {
                    const deleteInput = document.createElement('input');
                    deleteInput.type = 'hidden';
                    deleteInput.name = 'children_deleted_ids[]';
                    deleteInput.value = idInput.value;
                    container.appendChild(deleteInput);
                }

                // Remove the last row
                lastRow.remove();
            } else {
                alert("There are no child entries to remove.");
            }
        }


        function calculateAge(dobInput) {
            const dob = new Date(dobInput.value);
            const today = new Date();

            if (isNaN(dob)) return;

            let age = today.getFullYear() - dob.getFullYear();
            const m = today.getMonth() - dob.getMonth();

            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }

            const ageInput = dobInput.closest('.child-entry').querySelector('input[name="children_age[]"]');
            ageInput.value = age;
        }
        document.addEventListener('DOMContentLoaded', function () {
            const dobInputs = document.querySelectorAll('input[name="children_dob[]"]');
            dobInputs.forEach(calculateAge);
        });
                let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', function () {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                if (scrollTop > lastScrollTop) {
                    // Scrolling down — hide navbar
                    navbar.style.top = '-60px';
                } else {
                    // Scrolling up — show navbar
                    navbar.style.top = '0';
                }

                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            });
</script>
</body>
</html>
