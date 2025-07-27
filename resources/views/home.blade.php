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
            color: #222;
        }

        .form-container {
            background: #fff;
            padding: 1rem;
            max-width: 55rem;
            margin: 2.5rem auto 0;
            border: 1px solid #ddd;
        }

        h2 {
            font-size:1em;
            text-align: center;
            margin-bottom: 10px;
        }

        h3 {
            font-size:0.9rem;
        }

        h4 {
            font-size:0.8rem;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-section {
            padding: 0.5rem 0;
        }

        label {
            font-size: 0.6rem;
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
            font-size: 0.7rem;
            padding-top: 5px;
            white-space: nowrap;
        }

        .date-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .date-wrapper input[type="date"] {
            width: 8rem;
            padding: 4px 6px;
        }

        .date-wrapper small {
            font-size: 0.6rem;
            color: #555;
            margin-top: 0.5rem;
        }

        input[type="text"],
        input[type="date"],
        select {
            font-size: 0.7rem;
            width: 100%;
            padding: 6px 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
                font-size: 0.5rem;
            }

        .checkbox-group {
            display: flex;
            justify-content: center;
            gap: 0.6rem;
            padding-top: 0.6rem;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.65rem;
        }

        .note {
            font-size: 0.65rem;
            margin-bottom: 15px;
            text-align: center;
        }

        .note em {
            font-weight: bold;
        }

        .small {
            padding-top: 0.5rem;
            font-size: 0.65rem;
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
            font-weight: bold;
        }

        .assets-table th {
            background-color: #c7d6ea;
            font-size: 0.6rem;
            text-align: center;
            min-width: 7rem;
        }

        .assets-table input[type="text"],
        .assets-table select {
            width: 100%;
            border: 1px solid #ccc;
            padding: 4px 6px;
            font-size: 0.7rem;
        }

        button {
            background-color: #1F2937;
            color: white;
            padding: 0.5rem;
            border: none;
            border-radius: 4px;
            font-size: 0.5rem;
            cursor: pointer;
            margin-top: 10px;
            width: 6rem;
            text-align: center;
        }

        .button-remove {
            background-color: red;
        }

        .btn-remove {
            background-color: #ED2100;
            color: white;
            padding: 0.5em;
            border: none;
            border-radius: 4px;
            font-size: 0.5rem;
            cursor: pointer;
            width: 4rem;
            display: block;
            margin: 0 auto;
        }

        .subtotal-row {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
            font-size: 0.7rem;
            width: 100%;
            white-space: nowrap;
            
        }
        .subtotal-row input[type="text"] {
            max-width: 6rem;
        }

        .asset-totals {
            
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-end;
            margin-left: auto;
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
        }

        .assets-table td {
            text-align: center;
            vertical-align: middle;
        }

        .button-wrapper {
            display: flex;
            justify-content: end;
        }

        .success {
            font-family: 'Nunito', sans-serif;
            font-size: 0.5rem;
            color: #4bb543;
            text-align: right;
            position: absolute;
            top: 3rem;
            right: 1rem;
            transition: opacity 1s ease;
            opacity: 1;
        }

        .success.hide {
            opacity: 0;
            pointer-events: none;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgb(255, 255, 255);
            color: #fff;
            height: 2.5rem;
            display: flex;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: top 0.3s ease-in-out;
        }

        .navbar-container {
            width: 100%;
            margin: 0 auto;
            display: flex;
            align-items: center;
            padding: 0 1rem;
            justify-content: space-between;
        }

        /* Brand styling */
        .navbar-brand {
            font-weight: bold;
            font-size: 0.8rem;
            color: #1F2937;
        }

        /* Links row */
        .navbar-links {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar-links button {
            background-color: #0a66c2;
            margin-top: 0;
        }

        .navbar-links button:hover {
            background-color: #004eaa;
        }

        /* Link styling */
        .navbar-links a {
            text-align: center;
            text-decoration: none;
            color: #1F2937;
            font-size: 0.7rem;
            padding: 0.1rem;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .navbar-links a:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .disabled-wrapper {
            pointer-events: none;
            opacity: 0.8;
            cursor: not-allowed;
        }

        .row {
            display: flex;
            justify-content: center;
            gap: 0.7rem;
            margin-bottom: 0.8rem;
        }

        .rowone {
            max-width: 50%;
            padding-right: 0.35rem;
        }

        .row>div {
            flex: 1;
        }

        p {
            font-size: 0.65rem;
        }

        @media(min-width: 360px) {
            .form-container {
                padding: 1.25rem;
                margin-top: 3rem;
            }

            .navbar {
                height: 3rem;
            }

            .success {
                font-size: 0.6rem;
                top: 3.3rem;
                right: 1.1rem;
            }

            .navbar-links {
                font-size: 0.8rem;
            }

            .navbar-brand {
                font-size: 0.9rem;
            }

            h2 {
                font-size: 1.1rem;
            }

            h3 {
                font-size: 1rem;
            }

            h4 {
                font-size: 0.9rem;
            }

            label, .date-wrapper small {
                font-size: 0.7rem;
            }

            .checkbox-group label, .note, .small, p {
                font-size: 0.75rem;
            }

            input[type="text"],
            input[type="date"] {
                font-size: 0.8rem;
            }

            button {
                font-size: 0.6rem;
            }
        }

        @media(min-width: 768px) {
            .form-container {
                padding: 2.5rem;
                margin-top: 3rem;
            }

            .success {
                font-size: 0.8rem;
                top: 3.5rem;
                right: 1.3rem;
            }

            .navbar {
                height: 3.1rem;
            }

            .navbar-links {
                gap: 2rem;
            }

            .navbar-links a {
                font-size: 0.8rem;
            }

            .navbar-brand {
                font-size: 1rem;
            }

            .checkbox-group {
                gap: 2.5rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            h3 {
                font-size: 1.3rem;
            }

            h4 {
                font-size: 1.1rem;
            }

            .row {
                gap: 1.2rem;
            }

            label, .date-wrapper small {
                font-size: 0.8rem;
            }

            .checkbox-group label, .note, .small, p {
                font-size: 0.9rem;
            }

            input[type="text"],
            input[type="date"],
            select {
                font-size: 0.8rem;
            }

            input[type="file"] {
                font-size: 0.7rem;
            }

            button {
                font-size: 0.7rem;
                width: 8rem;
            }

            .btn-remove {
                font-size: 0.7rem;
                width: 5rem;
            }

            .subtotal-row input[type="text"] {
                max-width: 8rem;
            }

            .assets-table th {
                font-size: 0.8rem;
                min-width: 4rem;
            }

            .assets-table input[type="text"],
            .assets-table select {
                font-size: 0.8rem;
            }
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
                    <a href="/home/delete-account"
                        onclick="return confirm('Are you sure you want to delete your account? \n\nThe account with email <{{ Auth::user()->email }}> will be permanently deleted along with all saved form data associated with it.')">
                        Delete Account
                    </a>
                </li>
                <li>
                    <a>{{ Auth::user()->name }}</a>
                </li>
                <li>
                    <button onclick=exportPDF()>Export PDF</button>
                </li>
            </ul>
        </div>
    </nav>


    <form id="saln-form" action="{{ route('saln.save') }}" method="POST">
        @csrf

        @if (session('success'))
            <div id="saved-message" class="success">
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
                        value="{{ old('asof_date', $prefillData['asOfDate'] ?? optional($saln->asof_date ?? now()->subYear()->endOfYear())->format('Y-m-d')) }}">
                    <small>(Required by R.A. 6713)</small>
                </div>
            </div>


            <div class="note">
                <em>Note:</em> Husband and wife who are both public officials and employees may file the required
                statements jointly or separately.
            </div>

            <div class="checkbox-group">
                <label><input type="radio" name="filing_type" value="joint filing"
                        {{ old('filing_type', $prefillData['filingType'] ?? ($saln->filing_type ?? '')) === 'joint filing' ? 'checked' : '' }}> Joint
                    Filing</label>
                <label><input type="radio" name="filing_type" value="separate filing"
                        {{ old('filing_type', $prefillData['filingType'] ?? ($saln->filing_type ?? '')) === 'separate filing' ? 'checked' : '' }}>
                    Separate Filing</label>
                <label><input type="radio" name="filing_type" value="not applicable"
                        {{ old('filing_type', $prefillData['filingType'] ?? ($saln->filing_type ?? '')) === 'not applicable' ? 'checked' : '' }}> Not
                    Applicable</label>
            </div>

            <!-- Declarant Section -->
            <div class="form-section">
                <h3>Declarant Information</h3>
                <div class="row">
                    <div>
                        <label for="declarant_family_name">Family Name</label>
                        <input type="text" id="declarant_family_name" name="declarant_family_name"
                            value="{{ old('declarant_family_name', $prefillData['declarant']['familyName'] ?? ($saln->declarant_family_name ?? '')) }}">
                    </div>
                    <div>
                        <label for="declarant_first_name">First Name</label>
                        <input type="text" id="declarant_first_name" name="declarant_first_name"
                            value="{{ old('declarant_family_name', $prefillData['declarant']['firstName'] ?? ($saln->declarant_first_name ?? '')) }}">
                    </div>
                    <div>
                        <label for="declarant_mi">M.I.</label>
                        <input type="text" id="declarant_mi" name="declarant_mi"
                            value="{{ old('declarant_mi', $prefillData['declarant']['middleInitial'] ?? ($saln->declarant_mi ?? '')) }}">
                    </div>
                </div>
                <!-- DECLARANT HOME ADRESS -->
                @php
                    $declarantHouseRegion = old(
                        'declarant_house_region',
                        $prefillData['declarant']['houseAddress']['houseRegion'] ??
                            ($saln->declarant_house_region ?? ''),
                    );
                    $declarantHouseCity = old(
                        'declarant_house_city',
                        $prefillData['declarant']['houseAddress']['houseCity'] ?? ($saln->declarant_house_city ?? ''),
                    );
                    $declarantHouseBarangay = old(
                        'declarant_house_barangay',
                        $prefillData['declarant']['houseAddress']['houseBarangay'] ??
                            ($saln->declarant_house_barangay ?? ''),
                    );
                @endphp

                <h4>Home Address</h4>
                <div class="row">
                    <div>
                        <label for="declarant_house_region">Region</label>
                        <select id="declarant_house_region" name="declarant_house_region"
                            data-selected="{{ $declarantHouseRegion }}">
                            <option value="" disabled selected>-- Select Region --</option>
                        </select>
                    </div>
                    <div>
                        <label for="declarant_house_city">City/Municipality</label>
                        <select id="declarant_house_city" name="declarant_house_city"
                            data-selected="{{ $declarantHouseCity }}" disabled>
                            <option value="" disabled selected>-- Select City/Municipality --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="declarant_house_barangay">Barangay</label>
                        <select id="declarant_house_barangay" name="declarant_house_barangay"
                            data-selected="{{ $declarantHouseBarangay }}" disabled>
                            <option value="" disabled selected>-- Select Barangay --</option>
                        </select>
                    </div>
                    <div>
                        <label for="declarant_house_subdivision">Subdivision</label>
                        <input type="text" id="declarant_house_subdivision" name="declarant_house_subdivision"
                            value="{{ old('declarant_house_subdivision', $prefillData['declarant']['houseAddress']['houseSubdivision'] ?? ($saln->declarant_house_subdivision ?? '')) }}">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="declarant_house_street">Street</label>
                        <input type="text" id="declarant_house_street" name="declarant_house_street"
                            value="{{ old('declarant_house_street', $prefillData['declarant']['houseAddress']['houseStreet'] ?? ($saln->declarant_house_street ?? '')) }}">
                    </div>
                    <div>
                        <label for="declarant_house_number">House Number</label>
                        <input type="text" id="declarant_house_number" name="declarant_house_number"
                            value="{{ old('declarant_house_number', $prefillData['declarant']['houseAddress']['houseNo'] ?? ($saln->declarant_house_number ?? '')) }}">
                    </div>
                </div>
                <div class="rowone">
                    <div>
                        <label for="declarant_house_zip">Zip Code</label>
                        <input type="text" id="declarant_house_zip" name="declarant_house_zip"
                            value="{{ old('declarant_house_zip', $prefillData['declarant']['houseAddress']['houseZipCode'] ?? ($saln->declarant_house_zip ?? '')) }}">
                    </div>
                </div>
                <!-- DECLARANT OFFICE -->
                <h4>Office</h4>
                <div class="row">
                    <div>
                        <label for="declarant_position">Position</label>
                        <input type="text" id="declarant_position" name="declarant_position"
                            value="{{ old('declarant_position', $prefillData['declarant']['position'] ?? ($saln->declarant_position ?? '')) }}">
                    </div>
                    <div>
                        <label for="declarant_office_name">Agency/Office</label>
                        <input type="text" id="declarant_office_name" name="declarant_office_name"
                            value="{{ old('declarant_office_name', $prefillData['declarant']['agencyOffice'] ?? ($saln->declarant_office_name ?? '')) }}">
                    </div>
                </div>
                <!-- DECLARANT OFFICE ADDRESS -->
                @php
                    $declarantOfficeRegion = old(
                        'declarant_office_region',
                        $prefillData['declarant']['officeAddress']['officeRegion'] ??
                            ($saln->declarant_office_region ?? ''),
                    );
                    $declarantOfficeCity = old(
                        'declarant_office_city',
                        $prefillData['declarant']['officeAddress']['officeCity'] ??
                            ($saln->declarant_office_city ?? ''),
                    );
                @endphp
                
                <h4>Office Address</h4>
                <div class="row">
                    <div>
                        <label for="declarant_office_region">Region</label>
                        <select id="declarant_office_region" name="declarant_office_region"
                            data-selected="{{ $declarantOfficeRegion }}">
                            <option value="" disabled selected>-- Select Region --</option>
                        </select>
                    </div>
                    <div>
                        <label for="declarant_office_city">City/Municipality</label>
                        <select id="declarant_office_city" name="declarant_office_city"
                            data-selected="{{ $declarantOfficeCity }}" disabled>
                            <option value="" disabled selected>-- Select City/Municipality --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="declarant_office_street">Street</label>
                        <input type="text" id="declarant_office_street" name="declarant_office_street"
                            value="{{ old('declarant_office_street', $prefillData['declarant']['officeAddress']['officeStreet'] ?? ($saln->declarant_office_street ?? '')) }}">
                    </div>
                    <div>
                        <label for="declarant_office_number">Office Number</label>
                        <input type="text" id="declarant_office_number" name="declarant_office_number"
                            value="{{ old('declarant_office_number', $prefillData['declarant']['officeAddress']['officeNo'] ?? ($saln->declarant_office_number ?? '')) }}">
                    </div>
                </div>
                <div class="rowone">
                    <div>
                        <label for="declarant_office_zip">Zip Code</label>
                        <input type="text" id="declarant_office_zip" name="declarant_office_zip"
                            value="{{ old('declarant_office_zip', $prefillData['declarant']['officeAddress']['officeZipCode'] ?? ($saln->declarant_office_zip ?? '')) }}">
                    </div>
                </div>
            </div>

            <div id="spouseRepeater">
                @foreach ($prefillData['declarant']['spouses'] ?? ($saln->spouses ?? []) as $index => $spouse)
                    <div class="spouse-block" data-index="{{ $index + 1 }}">
                        <h3 class="spouse-header">Spouse Information</h3>

                        <div class="row">
                            <div>
                                <label>Family Name</label>
                                <input type="text" name="spouse_family_name[]"
                                    value="{{ $spouse['familyName'] ?? ($spouse['family_name'] ?? '') }}">
                            </div>
                            <div>
                                <label>First Name</label>
                                <input type="text" name="spouse_first_name[]"
                                    value="{{ $spouse['firstName'] ?? ($spouse['first_name'] ?? '') }}">
                            </div>
                            <div>
                                <label>M.I.</label>
                                <input type="text" name="spouse_mi[]"
                                    value="{{ $spouse['middleInitial'] ?? ($spouse['mi']  ?? '') }}">
                            </div>
                        </div>
                        <h4>Home Address</h4>
                        
                        <div class="checkbox-group" style="padding-top: 0rem; padding-bottom: 0.5rem;">
                            <label>
                                <input type="checkbox" name="copy_house_address[]" onclick="copyHouseAddress(this)"
                                {{ $spouse['hasSameHouseAsDeclarant'] ?? ($spouse['same_house_as_declarant'] ?? false) ? 'checked' : '' }} />
                                Same House Address as Declarant
                            </label> 
                        </div>
                        <div class="row">
                            <div>
                                <label>Region</label>
                                <select name="spouse_house_region[]" id="spouse_house_region{{ $index + 1 }}"
                                    data-selected="{{ $spouse['houseAddress']['houseRegion'] ?? ($spouse['house_region'] ?? '') }}">
                                    <option value="" disabled selected>-- Select Region --</option>
                                </select>
                            </div>
                            <div>
                                <label>City/Municipality</label>
                                <select name="spouse_house_city[]" id="spouse_house_city{{ $index + 1 }}" disabled
                                    data-selected="{{ $spouse['houseAddress']['houseCity'] ?? ($spouse['house_city'] ?? '') }}">
                                    <option value="" disabled selected>-- Select City/Municipality --</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <label>Barangay</label>
                                <select name="spouse_house_barangay[]" id="spouse_house_barangay{{ $index + 1 }}"
                                    disabled data-selected="{{ $spouse['houseAddress']['houseBarangay'] ?? ($spouse['house_barangay'] ?? '') }}">
                                    <option value="" disabled selected>-- Select Barangay --</option>
                                </select>
                            </div>
                            <div>
                                <label>Subdivision</label>
                                <input type="text" name="spouse_house_subdivision[]"
                                value="{{ $spouse['houseAddress']['houseSubdivision'] ?? ($spouse['house_subdivision'] ?? '') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <label>Street</label>
                                <input type="text" name="spouse_house_street[]"
                                value="{{ $spouse['houseAddress']['houseStreet'] ?? ($spouse['house_street'] ?? '') }}">
                            </div>
                            <div>
                                <label>House Number</label>
                                <input type="text" name="spouse_house_number[]"
                                value="{{ $spouse['houseAddress']['houseNo'] ?? ($spouse['house_number'] ?? '') }}">
                            </div>
                        </div>
                        <div class="rowone">
                            <div>
                                <label>Zip Code</label>
                                <input type="text" name="spouse_house_zip[]"
                                value="{{ $spouse['houseAddress']['houseZipCode'] ?? ($spouse['house_zip'] ?? '') }}">
                            </div>
                        </div>

                        <h4>Office</h4>
                        <div class="row">
                            <div>
                                <label>Position</label>
                                <input type="text" name="spouse_position[]"
                                    value="{{ $spouse['position'] ?? '' }}">
                            </div>
                            <div>
                                <label>Agency/Office</label>
                                <input type="text" name="spouse_office_name[]"
                                    value="{{ $spouse['agencyOffice'] ?? ($spouse['office_name'] ?? '') }}">
                            </div>
                        </div>

                        <h4>Office Address</h4>
                        <div class="row">
                            <div>
                                <label>Region</label>
                                <select name="spouse_office_region[]" id="spouse_office_region{{ $index + 1 }}"
                                    data-selected="{{ $spouse['officeAddress']['officeRegion'] ?? ($spouse['office_region'] ?? '') }}">
                                    <option value="" disabled selected>-- Select Region --</option>
                                </select>
                            </div>
                            <div>
                                <label>City/Municipality</label>
                                <select name="spouse_office_city[]" id="spouse_office_city{{ $index + 1 }}"
                                    data-selected="{{ $spouse['officeAddress']['officeCity'] ?? ($spouse['office_city'] ?? '') }}" disabled>
                                    <option value="" disabled selected>-- Select City/Municipality --</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <label>Street</label>
                                <input type="text" name="spouse_office_street[]"
                                    value="{{ $spouse['officeAddress']['officeStreet'] ?? ($spouse['office_street'] ?? '') }}">
                            </div>
                            <div>
                                <label>Office Number</label>
                                <input type="text" name="spouse_office_number[]"
                                    value="{{ $spouse['officeAddress']['officeNo'] ?? ($spouse['office_number'] ?? '') }}">
                            </div>
                        </div>
                        <div class="rowone">
                            <div>
                                <label>Zip Code</label>
                                <input type="text" name="spouse_office_zip[]"
                                    value="{{ $spouse['officeAddress']['officeZipCode'] ?? ($spouse['office_zip'] ?? '') }}">
                            </div>
                        </div>

                        <div class="spouse-actions">
                            <div class="button-wrapper"> 
                                <button type="button" class="button-remove remove-spouse"
                                    onclick="removeSpouseBlock(this)">Remove Spouse</button>
                            </div>    
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Add Row Button -->
            <div class="button-wrapper">
                <button type="button" onclick="addSpouseBlock()">Add Spouse</button>
            </div>

            <h3>Unmarried Children</h3>

            <div id="children_fields">
                @foreach ($prefillData['declarant']['unmarriedChildren'] ?? ($saln->unmarriedChildren ?? []) as $child)
                    <div class="row child-entry">
                        <div>
                            <label>Name</label>
                            <input type="text" name="children_name[]" value="{{ $child['name'] ?? '' }}">
                        </div>
                        <div>
                            <label>Date of Birth</label>
                            <input type="date" name="children_dob[]" value="{{ $child['dateOfBirth'] ?? ($child['date_of_birth'] ?? '') }}"
                                onchange="calculateAge(this)">
                        </div>
                        <div>
                            <label>Age</label>
                            <input type="text" name="children_age[]" value="{{ $child['age'] ?? '' }}" readonly>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="button-wrapper">
                <button type="button" onclick="addChildRow()">Add Child</button>
            </div>
            <div class="button-wrapper">
                <button type="button" class="button-remove"
                    onclick="removeLastChildRow()">Remove Child</button>
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
                                <th><small>(e.g., residential, commercial, industrial, agricultural and mixed
                                        used)</small></th>
                                <th colspan="2"><small>(As found in the Tax Declaration of Real Property)</small>
                                </th>
                                <th>Year</th>
                                <th>Mode</th>
                            </tr>
                        </thead>
                        <tbody id="assetsReal">
                            @forelse ($prefillData['declarant']['assets']['realProperties'] ?? ($saln->realProperties ?? []) as $assetReal)
                                <tr>
                                    <td><input type="text" name="desc[]"
                                            value="{{ $assetReal['description'] ?? '' }}"></td>
                                    <td><input type="text" name="kind[]" value="{{ $assetReal['kind'] ?? '' }}">
                                    </td>
                                    <td><input type="text" name="location[]"
                                            value="{{ $assetReal['exactLocation'] ?? ($assetReal['location'] ?? '') }}"></td>
                                    <td><input type="text" name="assessed[]"
                                            value="{{ $assetReal['assessedValue'] ?? ($assetReal['assessed_value'] ?? '') }}"></td>
                                    <td><input type="text" name="marketValue[]"
                                            value="{{ $assetReal['currentFairMarketValue'] ?? ($assetReal['market_value'] ?? '') }}"></td>
                                    <td>
                                        @php
                                            $currentYear = now()->subYear()->year;
                                            $startYear = 1900;
                                            $selectedYear = old('acqYear', $assetReal['acquisitionYear'] ?? $assetReal['acquisition_year'] ?? '');
                                        @endphp

                                        <select name="acqYear[]">
                                        <option value="" hidden></option>
                                            @for ($year = $currentYear; $year >= $startYear; $year--)
                                                <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td><input type="text" name="acqMode[]"
                                            value="{{ $assetReal['acquisitionMode'] ?? ($assetReal['acquisition_mode'] ?? '') }}"></td>
                                    <td><input type="text" name="acqCost[]" oninput="calculateRealSubtotal()"
                                            value="{{ $assetReal['acquisitionCost'] ?? ($assetReal['acquisition_cost'] ?? '') }}"></td>
                                    <td>
                                        <button type="button" class="btn btn-remove"
                                            onclick="removeRealPropertyRow(this)">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td><input type="text" name="desc[]"></td>
                                    <td><input type="text" name="kind[]"></td>
                                    <td><input type="text" name="location[]"></td>
                                    <td><input type="text" name="assessed[]"></td>
                                    <td><input type="text" name="marketValue[]"></td>
                                    <td><input type="text" name="acqYear[]"></td>
                                    <td><input type="text" name="acqMode[]"></td>
                                    <td><input type="text" name="acqCost[]" oninput="calculateRealSubtotal()"></td>
                                    <td>
                                        <button type="button" class="btn btn-remove"
                                            onclick="removeRealPropertyRow(this)">Delete</button>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="button-wrapper">
                        <button type="button" onclick="addRealProperty()">Add Another Entry</button>
                    </div>
                    <div class="asset-controls"> 
                        <div class ="asset-totals">
                            <div class="subtotal-row">
                                <label for="subtotalReal">Subtotal: </label>
                                <input type="text" id="subtotalReal" readonly>
                            </div>
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
                            @forelse ($prefillData['declarant']['assets']['personalProperties'] ?? ($saln->personalProperties ?? []) as $assetPersonal)
                                <tr>
                                    <td><input type="text" name="description[]"
                                            value="{{ $assetPersonal['description'] ?? '' }}"></td>
                                    <td>
                                        @php
                                            $currentYear = now()->subYear()->year;
                                            $startYear = 1900;
                                            $selectedYear = $assetPersonal['yearAcquired'] ?? ($assetPersonal['year_acquired'] ?? '');
                                        @endphp

                                        <select name="yearAcquired[]">
                                        <option value="" hidden></option>
                                            @for ($year = $currentYear; $year >= $startYear; $year--)
                                                <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endfor
                                        </select>
                                        
                                        </td>
                                    <td><input type="text" name="acquisitionCost[]"
                                            oninput="calculatePersonalSubtotal()"
                                            value="{{ $assetPersonal['acquisitionCost'] ?? ($assetPersonal['acquisition_cost'] ?? '') }}"></td>
                                    <td>
                                        <button type="button" class="btn btn-remove"
                                            onclick="removePersonalPropertyRow(this)">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td><input type="text" name="description[]"></td>
                                    <td><input type="text" name="yearAcquired[]"></td>
                                    <td><input type="text" name="acquisitionCost[]"
                                            oninput="calculatePersonalSubtotal()"></td>
                                    <td>
                                        <button type="button" class="btn btn-remove"
                                            onclick="removePersonalPropertyRow(this)">Delete</button>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="button-wrapper">
                        <button type="button" onclick="addPersonalProperty()">Add Another Entry</button>
                    </div>
                    <div class="asset-controls"> 
                        <div class ="asset-totals">
                            <div class="subtotal-row">
                                <label for="subtotalPersonal">Subtotal: </label>
                                <input type="text" id="subtotalPersonal" readonly>
                            </div>
                            <div class="subtotal-row">
                                <label for="totalAssets">Total Assets: </label>
                                <input type="text" id="totalAssets" readonly>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-section">
                <h3>Liabilities</h3>
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
                            @forelse ($prefillData['declarant']['liabilities'] ?? ($saln->liabilities ?? []) as $liability)
                                <tr>
                                    <td><input type="text" name="nature[]"
                                            value="{{ $liability['nature'] ?? '' }}"></td>
                                    <td><input type="text" name="nameCreditor[]"
                                            value="{{ $liability['nameOfCreditor'] ?? ($liability['name_creditor'] ?? '') }}"></td>
                                    <td><input type="text" name="OutstandingBalance[]"
                                            value="{{ $liability['outstandingBalance'] ?? ($liability['outstanding_balance'] ?? '') }}"
                                            oninput="calculateLiabilitiesSubtotal()"></td>
                                    <td>
                                        <button type="button" class="btn btn-remove"
                                            onclick="removeLiabilitiesRow(this)">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td><input type="text" name="nature[]"></td>
                                    <td><input type="text" name="nameCreditor[]"></td>
                                    <td><input type="text" name="OutstandingBalance[]"
                                            oninput="calculateLiabilitiesSubtotal()"></td>
                                    <td>
                                        <button type="button" class="btn btn-remove"
                                            onclick="removeLiabilitiesRow(this)">Delete</button>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                    <div class="button-wrapper">
                                <button type="button" onclick="addLiability()">Add Another Entry</button>
                            </div>
                    <div class="asset-controls">
                        <div class ="asset-totals">
                            
                            <div class="subtotal-row">
                                <label for="subtotalLiabilities">Subtotal: </label>
                                <input type="text" id="subtotalLiabilities" readonly>
                            </div>
                            <div class="subtotal-row">
                                <label for="netWorth">Networth: </label>
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
                        <input type="checkbox" name="noBusinessInterests" id="noBusinessInterests"
                            onchange="toggleBusinessForm()"
                            {{ $prefillData['declarant']['hasNoBusinessInterests'] ?? ($saln->no_business_interest ?? false) ? 'checked' : '' }} />
                        I/We do not have any business interest or financial connection
                    </label>

                </div>
                <div class="assets-table-wrapper" id="business-form">
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
                             @if (!($prefillData['declarant']['hasNoBusinessInterests'] ?? false)&& !empty($prefillData['declarant']['businessInterestsAndFinancialConnections'] ?? []))
                                @foreach ($prefillData['declarant']['businessInterestsAndFinancialConnections'] ?? [] as $business)
                                <tr>
                                    <td><input type="text" name="nameBusiness[]" class="business-input"
                                        value="{{$business['nameOfEntity'] ?? '' }}"></td>
                                    <td><input type="text" name="addressBusiness[]" class="business-input"
                                        value="{{$business['businessAddress'] ?? ''}}"></td>
                                    <td><input type="text" name="natureBusiness[]" class="business-input"
                                        value="{{$business['natureOfInterestOrConnection'] ?? ''}}"></td>
                                    <td><input type="date" name="dateInterest[]" class="business-input"
                                        value="{{$business['dateOfAcquisition'] ?? ''}}"></td>
                                    <td>
                                        <button type="button" class="btn btn-remove"
                                            onclick="removeBusinessRow(this)">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                @forelse ($saln->businessInterests ?? [] as $business)
                                    <tr>
                                        <td><input type="text" name="nameBusiness[]" class="business-input"
                                            value="{{ $business['name_business'] ?? '' }}"></td>
                                        <td><input type="text" name="addressBusiness[]" class="business-input"
                                            value="{{ $business['address_business'] ?? '' }}"></td>
                                        <td><input type="text" name="natureBusiness[]" class="business-input"
                                            value="{{ $business['nature_business'] ?? '' }}"></td>
                                        <td><input type="date" name="dateInterest[]" class="business-input"
                                            value="{{ $business['date_interest'] ?? '' }}"></td>
                                        <td>
                                            <button type="button" class="btn btn-remove"
                                                onclick="removeBusinessRow(this)">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td><input type="text" name="nameBusiness[]" class="business-input"></td>
                                        <td><input type="text" name="addressBusiness[]" class="business-input"></td>
                                        <td><input type="text" name="natureBusiness[]" class="business-input"></td>
                                        <td><input type="date" name="dateInterest[]" class="business-input"></td>
                                        <td>
                                            <button type="button" class="btn btn-remove"
                                                onclick="removeBusinessRow(this)">Delete</button>
                                        </td>
                                    </tr>
                                @endforelse
                            @endif
                        </tbody>
                    </table>
                    <div class="button-wrapper">
                        <button type="button" onclick="addBusiness()" id="addBusinessBtn">Add Another Entry</button>
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
                            <input type="checkbox" name="noRelativesInGovernment" id="noRelativesInGovernment"
                                onchange="toggleRelativesForm()"
                                {{ $prefillData['declarant']['hasNoRelativesInGovermentService'] ?? ($saln->no_relatives_in_government ?? false) ? 'checked' : '' }} />
                            I/We do not have any relative/s in the government service
                        </label>

                    </div>
                    <div class="assets-table-wrapper" id="relatives-government-form">
                        <table class="assets-table">
                            <thead>
                                <tr>
                                    <th colspan="3">Name of Relative</th>
                                    <th rowspan="2">Relationship</th>
                                    <th rowspan="2">Position</th>
                                    <th rowspan="2">Name of Agency/Office and Adress</th>
                                    <th rowspan="2"></th>
                                </tr>
                                <tr>
                                    <th rowspan="1">Family Name</th>
                                    <th rowspan="1">First Name</th>
                                    <th rowspan="1">Middle Initial</th>
                                </tr>
                            </thead>
                            <tbody id="relativesBody">
                                @if (!($prefillData['declarant']['hasNoRelativesInGovermentService'] ?? false)&& !empty($prefillData['declarant']['relativesInGovernmentService'] ?? []))
                                    @foreach ($prefillData['declarant']['relativesInGovernmentService'] ?? [] as $relative)
                                        <tr>
                                            <td><input type="text" name="relativeFamilyName[]"
                                                    value="{{ $relative['familyName'] ?? '' }}"></td>
                                            <td><input type="text" name="relativeFirstName[]"
                                                    value="{{ $relative['firstName'] ?? '' }}"></td>
                                            <td><input type="text" name="relativeMi[]"
                                                    value="{{ $relative['middleInitial'] ?? '' }}"></td>
                                            <td><input type="text" name="relationship[]"
                                                    value="{{ $relative['relationship'] ?? '' }}"></td>
                                            <td><input type="text" name="position[]"
                                                    value="{{ $relative['position'] ?? '' }}"></td>
                                            <td><input type="text" name="nameAgency[]"
                                                    value="{{ $relative['agencyOfficeAndAddress'] ?? '' }}"></td>
                                            <td>
                                                <button type="button" class="btn btn-remove"
                                                    onclick="removeRelativeRow(this)">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    @forelse ($saln->relativesInGovernment ?? [] as $relative)
                                        <tr>
                                            <td><input type="text" name="relativeFamilyName[]"
                                                value="{{ $relative['relative_family_name'] ?? '' }}"></td>
                                            <td><input type="text" name="relativeFirstName[]"
                                                    value="{{ $relative['relative_first_name'] ?? '' }}"></td>
                                            <td><input type="text" name="relativeMi[]"
                                                    value="{{ $relative['relative_mi'] ?? '' }}"></td>
                                            <td><input type="text" name="relationship[]"
                                                    value="{{ $relative['relationship'] ?? '' }}"></td>
                                            <td><input type="text" name="position[]"
                                                    value="{{ $relative['position'] ?? '' }}"></td>
                                            <td><input type="text" name="nameAgency[]"
                                                    value="{{ $relative['name_agency'] ?? '' }}"></td>
                                            <td>
                                                <button type="button" class="btn btn-remove"
                                                    onclick="removeRelativeRow(this)">Delete</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td><input type="text" name="relativeFamilyName[]"></td>
                                            <td><input type="text" name="relativeFirstName[]"></td>
                                            <td><input type="text" name="relativeMi[]"></td>
                                            <td><input type="text" name="relationship[]"></td>
                                            <td><input type="text" name="position[]"></td>
                                            <td><input type="text" name="nameAgency[]"></td>
                                            <td>
                                                <button type="button" class="btn btn-remove"
                                                    onclick="removeRelativeRow(this)">Delete</button>
                                            </td>
                                        </tr>
                                    @endforelse
                                @endif
                            </tbody>
                        </table>
                        <div class="button-wrapper">
                            <button type="button" onclick="addRelative()">Add Another Entry</button>
                        </div>
                    </div>
                    <div class="form-section">
                        <p style="text-align: justify;">
                            I hereby certify that these are true and correct statements of my assets, liabilities, net
                            worth,
                            business interests and financial connections, including those of my spouse and unmarried
                            children below
                            eighteen (18) years of age living in my household, and that to the best of my knowledge, the
                            above-enumerated
                            are names of my relatives in the government within the fourth civil degree of consanguinity
                            or affinity.
                        </p>
                        <p style="text-align: justify;">
                            I hereby authorize the Ombudsman or his/her duly authorized representative to obtain and
                            secure from all appropriate government agencies, including the Bureau of Internal Revenue
                            such
                            documents that may show my assets, liabilities, net worth, business interests and financial
                            connections,
                            to include those of my spouse and unmarried children below 18 years of age living with me in
                            my
                            household covering previous years to include the year I first assumed office in government.
                        </p>
                        <br>
                        <p>Date: <span style="display: inline-block; border-bottom: 1px solid #000; width: 25%; vertical-align: -0.2em;"></span></p>
                        <br>
                        <div class="row" style="margin-top: 30px; justify-content:center; text-align: center;">
                            <div style="min-width:50%;">    
                                <div style="border-top: 1px solid #000; width: 80%; margin: 0 auto 8px;"></div>
                                <label>Signature of Declarant</label><br />
                            </div style="min-width:50%;">
                            <div>
                                <div style="border-top: 1px solid #000; width: 80%; margin: 0 auto 8px;"></div>
                                <label>Signature of Co-Declarant/Spouse</label>
                            </div>
                        </div>
                        <div class="row" style="align-self:center; justify-content:center;">
                            <div style="max-width:50%; text-align:center;">
                                <div>
                                    <label>Government Issued ID</label>
                                    <input type="text" name="govIDDeclarant"
                                        value="{{ old('govIDDeclarant', $prefillData['declarant']['governmentIssuedId']['type'] ?? ($saln->gov_id_declarant ?? '')) }}">
                                </div>
                                <div>
                                    <label>ID No.:</label>
                                    <input type="text" name="idNoDeclarant"
                                        value="{{ old('idNoDeclarant', $prefillData['declarant']['governmentIssuedId']['idNumber'] ?? ($saln->id_no_declarant ?? '')) }}">
                                </div>
                                <div>
                                    <label>Date Issued:</label>
                                    <input type="date" name="idDateDeclarant"
                                        value="{{ old('idDateDeclarant', $prefillData['declarant']['governmentIssuedId']['dateIssued'] ?? optional($saln->id_date_declarant ?? '')->format('Y-m-d')) }}">
                                </div>
                            </div>

                            <div style="max-width:50%; text-align:center;">
                                <div>
                                    <label>Government Issued ID</label>
                                    <input type="text" name="govIDSpouse"
                                        value="{{ old('govIDSpouse', $prefillData['declarant']['spouses'][0]['governmentIssuedId']['type'] ?? ($saln->gov_id_spouse ?? '')) }}">
                                </div>
                                <div>
                                    <label>ID No.:</label>
                                    <input type="text" name="idNoSpouse"
                                        value="{{ old('idNoSpouse', $prefillData['declarant']['spouses'][0]['governmentIssuedId']['idNumber'] ?? ($saln->id_no_spouse ?? '')) }}">
                                </div>
                                <div>
                                    <label>Date Issued:</label>
                                    <input type="date" name="idDateSpouse"
                                        value="{{ old('idDateSpouse', $prefillData['declarant']['spouses'][0]['governmentIssuedId']['dateIssued'] ?? optional($saln->id_date_spouse ?? '')->format('Y-m-d')) }}">
                                </div>
                            </div>
                        </div>

                        <p style="margin-top: 30px;">
                            <strong>SUBSCRIBED AND SWORN</strong> to before me this 
                            <span style="display: inline-block; border-bottom: 1px solid #000; width: 6%; vertical-align: -0.1em;"></span> 
                            day of 
                            <span style="display: inline-block; border-bottom: 1px solid #000; width: 14%; vertical-align: -0.1em;"></span>, affiant
                            exhibiting to me the
                            above-stated government issued identification card.
                        </p>

                        <div style="text-align: center; margin-top: 40px;">
                            <div style="border-top: 1px solid #000; width: 50%; max-width: 15rem; margin: 0 auto 8px;"></div>
                            <label>Person Administering Oath</label>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div style="text-align: right;">
                <button type="submit">Save Form</button>
            </div>
    </form>
    
    <form action="{{ route('saln.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="json_file" accept=".json" required>
        <br />
        <div style="display: flex; justify-content: space-between;">
            <button type="submit">Import JSON</button>
            <button type="button" onclick="exportData()">Export as JSON</button>
        </div>
    </form>

    <script>
        const form = document.getElementById('saln-form');
        const prefill = @json($prefillData);

        function serializeForm(form) {
            const formData = new FormData(form);
            const entries = [...formData.entries()];
            return JSON.stringify(entries);
        }

        let initialData;
        window.onload = () => {
            initialData = serializeForm(form);
        };

        let formData = serializeForm(form);

        let hasChanged = false;

        form.addEventListener('input', () => {
            hasChanged = serializeForm(form) !== initialData;
        });

        window.addEventListener('beforeunload', function(e) {
            if (hasChanged) {
                e.preventDefault();
                e.returnValue = '';
            }
        });

        form.addEventListener('submit', () => {
            hasChanged = false;
        });

        setTimeout(function () {
            const message = document.getElementById('saved-message');
            if (message) {
                message.style.display = 'none';
            }
        }, 7000); // 7s

        function exportData() {
            if (prefill) {
                alert('You currently have an unsaved import. Please save before exporting.');
            } else if (hasChanged) {
                alert('You have unsaved changes. Please save before exporting.');
            } else {
                window.location.href = "{{ route('saln.export') }}";
            }
        }

        function exportPDF() {
            if (prefill) {
                alert('You currently have an unsaved import. Please save before exporting.');
            } else if (hasChanged) {
                alert('You have unsaved changes. Please save before exporting.');
            } else {
                window.location.href = "{{ route('saln.pdf') }}";
            }
        }

        function addSpouseBlock() {
            const container = document.getElementById('spouseRepeater');
            const original = container.querySelector('.spouse-block');
            const clone = original.cloneNode(true);
    
            const newIndex = container.querySelectorAll('.spouse-block').length + 1;

            // Clear inputs
            clone.querySelectorAll('input').forEach(input => {
                if (input.type === 'checkbox') {
                    input.checked = false; // Uncheck boxes and radios
                } else {
                    input.value = ''; // Clear text, number, etc.
                }
            });

            const regionFieldHouse = clone.querySelector('[id^="spouse_house_region"]');
            const cityFieldHouse = clone.querySelector('[id^="spouse_house_city"]');
            const barangayFieldHouse = clone.querySelector('[id^="spouse_house_barangay"]');

            

            regionFieldHouse.id = `spouse_house_region${newIndex}`;
            cityFieldHouse.id = `spouse_house_city${newIndex}`;
            barangayFieldHouse.id = `spouse_house_barangay${newIndex}`;

            const regionFieldOffice = clone.querySelector('[id^="spouse_office_region"]');
            const cityFieldOffice = clone.querySelector('[id^="spouse_office_city"]');

            if (regionFieldOffice && cityFieldOffice) {
                regionFieldOffice.id = `spouse_office_region${newIndex}`;
                cityFieldOffice.id = `spouse_office_city${newIndex}`;
                regionFieldOffice.dataset.selected = '';
                cityFieldOffice.dataset.selected = '';
            }

            container.appendChild(clone);
            
            // Reinitialize selects
            initializeRegionCityBarangay(regionFieldHouse, cityFieldHouse, barangayFieldHouse, {
                selectedRegion: '',
                selectedCity: '',
                selectedBarangay: '',
            });

            if (regionFieldOffice && cityFieldOffice) {
                initializeRegionCityBarangay(regionFieldOffice, cityFieldOffice, null, {
                    selectedRegion: '',
                    selectedCity: '',
                });
            }
        }

        function copyHouseAddress(checkbox) {
            const spouseBlock = checkbox.closest('.spouse-block');
            
            if (checkbox.checked) {
                spouseBlock.querySelector('input[name^="spouse_house_number"]').value = document.getElementById("declarant_house_number").value;
                spouseBlock.querySelector('input[name^="spouse_house_street"]').value = document.getElementById("declarant_house_street").value;
                spouseBlock.querySelector('input[name^="spouse_house_subdivision"]').value = document.getElementById("declarant_house_subdivision").value;
                initializeRegionCityBarangay(
                    spouseBlock.querySelector('select[name^="spouse_house_region"]'),
                    spouseBlock.querySelector('select[name^="spouse_house_city"]'),
                    spouseBlock.querySelector('select[name^="spouse_house_barangay"]'),
                    {
                        selectedRegion: document.getElementById("declarant_house_region").value,
                        selectedCity: document.getElementById("declarant_house_city").value,
                        selectedBarangay: document.getElementById("declarant_house_barangay").value,
                    }
                );       
                spouseBlock.querySelector('input[name^="spouse_house_zip"]').value = document.getElementById("declarant_house_subdivision").zip;
            } else {
                spouseBlock.querySelector('input[name^="spouse_house_number"]').value = '';
                spouseBlock.querySelector('input[name^="spouse_house_street"]').value = '';
                spouseBlock.querySelector('input[name^="spouse_house_subdivision"]').value = '';
                initializeRegionCityBarangay(
                    spouseBlock.querySelector('select[name^="spouse_house_region"]'),
                    spouseBlock.querySelector('select[name^="spouse_house_city"]'),
                    spouseBlock.querySelector('select[name^="spouse_house_barangay"]'),
                    {
                        selectedRegion: '',
                        selectedCity: '',
                        selectedBarangay: '',
                    }
                );       
                spouseBlock.querySelector('input[name^="spouse_house_zip"]').value = '';
            }
        }


        function removeSpouseBlock(button) {
            const container = document.getElementById('spouseRepeater');
            const blocks = container.querySelectorAll('.spouse-block');

            if (blocks.length > 1) {
                // Remove the clicked spouse block
                button.closest('.spouse-block').remove();
            } else {
                alert("At least one spouse block is required.");
            }
        }

        function addRealProperty() {
            const tbody = document.querySelector('#assetsReal');

            const tr = document.createElement('tr');
            const inputNames = [
                'desc[]',
                'kind[]',
                'location[]',
                'assessed[]',
                'marketValue[]',
                'acqYear[]',
                'acqMode[]',
                'acqCost[]'
            ];

            inputNames.forEach(name => {
                const td = document.createElement('td');
                const input = document.createElement('input');
                input.type = 'text';
                input.name = name;
                if (name === 'acqCost[]') {
                    input.addEventListener('input', calculateRealSubtotal);
                }
                td.appendChild(input);
                tr.appendChild(td);
            });
            tbody.appendChild(tr);


            // Add delete button
            const tdDelete = document.createElement('td');
            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.textContent = 'Delete';
            deleteBtn.className = 'btn btn-remove'; // Add your styles here
            deleteBtn.onclick = function() {
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
            const inputs = document.querySelectorAll('input[name="acqCost[]"]');

            inputs.forEach(input => {
                const value = parseFloat(input.value.replace(/,/g, ''));
                if (!isNaN(value)) {
                    total += value;
                }
            });

            document.getElementById('subtotalReal').value = total.toLocaleString('en-US', {
                minimumFractionDigits: 2
            });
            calculateTotalAssets();
        }

        function addPersonalProperty() {
            const tbody = document.querySelector("#assetsPersonal");
            const tr = document.createElement('tr');

            const inputNames = [
                'description[]',
                'yearAcquired[]',
                'acquisitionCost[]'
            ]

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
            })
            tbody.appendChild(tr);
            // Add delete button
            const tdDelete = document.createElement('td');
            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.textContent = 'Delete';
            deleteBtn.className = 'btn btn-remove'; // Add your styles here
            deleteBtn.onclick = function() {
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
            const inputs = document.querySelectorAll('input[name="acquisitionCost[]"]');

            inputs.forEach(input => {
                const value = parseFloat(input.value.replace(/,/g, ''));
                if (!isNaN(value)) {
                    total += value;
                }
            });

            document.getElementById('subtotalPersonal').value = total.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            calculateTotalAssets();
        }

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
                'nameCreditor[]',
                'OutstandingBalance[]'
            ]
            inputNames.forEach(name => {
                const td = document.createElement('td');
                const input = document.createElement('input');
                input.type = 'text';
                input.name = name;
                if (name === 'OutstandingBalance[]') {
                    input.addEventListener('input', calculateLiabilitiesSubtotal);
                }
                td.appendChild(input);
                tr.appendChild(td);
            })
            tbody.appendChild(tr);
            // Add delete button
            const tdDelete = document.createElement('td');
            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.textContent = 'Delete';
            deleteBtn.className = 'btn btn-remove'; // Add your styles here
            deleteBtn.onclick = function() {
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
            const inputs = document.querySelectorAll('input[name="OutstandingBalance[]"]');

            inputs.forEach(input => {
                const value = parseFloat(input.value.replace(/,/g, ''));
                if (!isNaN(value)) {
                    total += value;
                }
            });

            document.getElementById('subtotalLiabilities').value = total.toLocaleString('en-US', {
                minimumFractionDigits: 2
            });
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

        function addBusiness() {
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
                input.type = (name === 'dateInterest[]') ? 'date' : 'text';;
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
            deleteBtn.onclick = function() {
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

        function addRelative() {
            const tbody = document.querySelector('#relativesBody');
            const tr = document.createElement('tr');
            const inputNames = [
                'relativeFamilyName[]',
                'relativeFirstName[]',
                'relativeMi[]',
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
            deleteBtn.onclick = function() {
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
                container.removeChild(allRows[allRows.length - 1]);
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

        function toggleBusinessForm() {
            const checkbox = document.querySelector("#noBusinessInterests");
            const businessForm = document.querySelector("#business-form");
            const isDisabled = checkbox.checked;

            const elements = businessForm.querySelectorAll('input, button')
            elements.forEach(elem => {
                elem.disabled = isDisabled;
            })

            if (isDisabled) {
                businessForm.classList.add('disabled-wrapper');
            } else {
                businessForm.classList.remove('disabled-wrapper');
            }
        }

        function toggleRelativesForm() {
            const checkbox = document.querySelector("#noRelativesInGovernment");
            const relativesGovernmentForm = document.querySelector("#relatives-government-form");
            const isDisabled = checkbox.checked;

            const elements = relativesGovernmentForm.querySelectorAll('input, button')
            elements.forEach(elem => {
                elem.disabled = isDisabled;
            })

            if (isDisabled) {
                relativesGovernmentForm.classList.add('disabled-wrapper');
            } else {
                relativesGovernmentForm.classList.remove('disabled-wrapper');
            }
        }

        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', function() {
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
        
       

        async function initializeRegionCityBarangay(regionField, cityField, barangayField=null, {
            selectedRegion,
            selectedCity,
            selectedBarangay='',
        }) {
            let regions = {};
            let cities = {};
            let barangays = [];   
            let regionCode;
            let cityCode;

            async function fetchRegions() {
                const regionsResponse = await fetch("{{ route('regions') }}");
                regions = await regionsResponse.json();
            }

            await fetchRegions();

            async function fetchCities(regionName) {
                cities = {};
                const region = Object.values(regions).find(r => r.region_name === regionName);
                
                if (region) {
                    for (const provinceName in region.province_list) {
                        const province = region.province_list[provinceName];

                        for (const municipalityName in province.municipality_list) {
                            cities[municipalityName] = province.municipality_list[municipalityName];
                        }
                    }
                }
            }

            async function fetchBarangays(cityCode) {
                if (cities[cityCode]) {
                    barangays = cities[cityCode]['barangay_list'];
                } 
            }

            async function populateRegions() {
                Object.values(regions).forEach(regionObj => {
                    const regionName = regionObj.region_name;
                    const selected = regionName === selectedRegion ? 'selected' : '';
                    regionField.innerHTML += `<option value="${regionName}" ${selected}>${regionName}</option>`;
                });

                if (selectedRegion === '') {
                    regionField.value = '';
                }
            }

            async function populateCities(region) {          
                await fetchCities(region);

                // reset the innerhtml of both city and barangay if a different region is selected
                cityField.innerHTML = '<option value="" disabled selected>-- Select City/Municipality --</option>';
                cityField.disabled = true;
                if (barangayField) {
                    barangayField.innerHTML = '<option value="" disabled selected>-- Select Barangay --</option>';
                    barangayField.disabled = true;
                }
                // check if a region was selected already
                // and if that city actually exists in the 
                if (region && Object.values(regions).some(r => r.region_name === region)) {
                    cityField.disabled = false;
                    for (const cityName in cities) {
                        const selected = cityName === selectedCity ? 'selected' : '';
                        cityField.innerHTML += `<option value="${cityName}" ${selected}>${cityName}</option>`;
                    }
                }
            }
            
            
            async function populateBarangays(region, city) {
                barangays = [];
                await fetchBarangays(city);

                // reset barangay innerhtml if a different city is selected 
                barangayField.innerHTML = '<option value="" disabled selected>-- Select Barangay --</option>';
                barangayField.disabled = true;
                if (region && city && city in cities) {
                    barangayField.disabled = false;

                    for (const barangayName of barangays) {
                        const selected = barangayName === selectedBarangay ? 'selected' : '';
                        barangayField.innerHTML += `<option value="${barangayName}" ${selected}>${barangayName}</option>`;
                    }
                }
            }

            regionField.addEventListener('change', async () => {
                await populateCities(regionField.value);
            });

            cityField.addEventListener('change', async () => {
                if (barangayField) {
                    await populateBarangays(regionField.value, cityField.value);
                }
            });


            await populateRegions();

            cityField.innerHTML = '<option value="" disabled selected>-- Select City/Municipality --</option>';
            cityField.disabled = true;

            if (barangayField) {
                barangayField.innerHTML = '<option value="" disabled selected>-- Select Barangay --</option>';
                barangayField.disabled = true;
            }

            if (selectedRegion && selectedCity) {
                await populateCities(selectedRegion);
            }
            
            if (selectedRegion && selectedCity && selectedBarangay && barangayField) {
                await populateBarangays(selectedRegion, selectedCity);
            }
        }

        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[name="children_dob[]"]').forEach(input => {
                if (input.value) {
                    calculateAge(input);
                }
            });

            calculatePersonalSubtotal();
            calculateRealSubtotal();
            calculateLiabilitiesSubtotal();
            calculateTotalAssets();
            toggleRelativesForm();
            toggleBusinessForm();

            initializeRegionCityBarangay(document.getElementById('declarant_house_region'),
                document.getElementById('declarant_house_city'),
                document.getElementById('declarant_house_barangay'), {
                    selectedRegion: document.getElementById('declarant_house_region').dataset.selected,
                    selectedCity: document.getElementById('declarant_house_city').dataset.selected,
                    selectedBarangay: document.getElementById('declarant_house_barangay').dataset.selected,
                });

            initializeRegionCityBarangay(document.getElementById('declarant_office_region'),
                document.getElementById('declarant_office_city'),
                null, {
                    selectedRegion: document.getElementById('declarant_office_region').dataset.selected,
                    selectedCity: document.getElementById('declarant_office_city').dataset.selected,
                    selectedBarangay: '',
                });

            document.querySelectorAll('input[name="acquisitionCost[]"]').forEach(input => {
                input.addEventListener('input', calculatePersonalSubtotal);
            });

            document.querySelectorAll('.spouse-block').forEach((spouseBlock) => {
                const index = spouseBlock.dataset.index;
                const regionFieldHouse = spouseBlock.querySelector(`#spouse_house_region${index}`);
                const cityFieldHouse = spouseBlock.querySelector(`#spouse_house_city${index}`);
                const barangayFieldHouse = spouseBlock.querySelector(`#spouse_house_barangay${index}`);
                    
                initializeRegionCityBarangay(regionFieldHouse, cityFieldHouse, barangayFieldHouse, {
                    selectedRegion: regionFieldHouse.dataset.selected,
                    selectedCity: cityFieldHouse.dataset.selected,
                    selectedBarangay: barangayFieldHouse.dataset.selected,
                });

                const regionFieldOffice = spouseBlock.querySelector(`#spouse_office_region${index}`);
                const cityFieldOffice = spouseBlock.querySelector(`#spouse_office_city${index}`);

                initializeRegionCityBarangay(regionFieldOffice, cityFieldOffice, null, {
                    selectedRegion: regionFieldOffice.dataset.selected,
                    selectedCity: cityFieldOffice.dataset.selected,
                    selectedBarangay: '',
                });
            })
        });
    </script>
</body>

</html>