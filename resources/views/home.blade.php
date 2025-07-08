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

        .rowone {
            width: 50%;
        }

        .row>div {
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
            width: 150px;
            /* or whatever width looks right */
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
            background: rgb(255, 255, 255);
            color: #fff;
            height: 56px;
            display: flex;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: top 0.3s ease-in-out;
            /* Add this line */
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
            background: rgba(255, 255, 255, 0.15);
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
                        onclick="return confirm('Are you sure you want to delete your account?')">
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
                        value="{{ old('asof_date', $prefillData['asOfDate'] ?? '') }}">
                    <div class="error">{{ $errors->first('asOfDate') }}</div>
                    <small>(Required by R.A. 6713)</small>
                </div>
            </div>


            <div class="note">
                <em>Note:</em> Husband and wife who are both public officials and employees may file the required
                statements jointly or separately.
            </div>

            <div class="checkbox-group">
                <label><input type="radio" name="filing_type" value="joint"> Joint Filing</label>
                <label><input type="radio" name="filing_type" value="separate"> Separate Filing</label>
                <label><input type="radio" name="filing_type" value="na"> Not Applicable</label>
            </div>

            <!-- Declarant Section -->
            <div class="form-section">
                <h3>Declarant Information</h3>
                <div class="row">
                    <div>
                        <label for="declarant_family_name">Family Name</label>
                        <input type="text" id="declarant_family_name" name="declarant_family_name"
                            value="{{ old('declarant_family_name', $prefillData['declarant']['familyName'] ?? '') }}">
                    </div>
                    <div>
                        <label for="declarant_first_name">First Name</label>
                        <input type="text" id="declarant_first_name" name="declarant_first_name"
                            value="{{ old('declarant_family_name', $prefillData['declarant']['firstName'] ?? '') }}">
                    </div>
                    <div>
                        <label for="declarant_mi">M.I.</label>
                        <input type="text" id="declarant_mi" name="declarant_mi"
                            value="{{ old('declarant_mi', $prefillData['declarant']['middleInitial'] ?? '') }}">
                    </div>
                </div>
                <!-- DECLARANT HOME ADRESS -->
                <h3>Home Address</h3>
                <div class="row">
                    <div>
                        <label for="declarant_house_number">House Number</label>
                        <input type="text" id="declarant_house_number" name="declarant_house_number"
                            value="{{ old('declarant_house_number', $prefillData['declarant']['houseAddress']['houseNo'] ?? '') }}">
                    </div>
                    <div>
                        <label for="declarant_house_street">Street</label>
                        <input type="text" id="declarant_house_street" name="declarant_house_street"
                            value="{{ old('declarant_house_street', $prefillData['declarant']['houseAddress']['houseStreet'] ?? '') }}">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="declarant_house_subdivision">Subdivision</label>
                        <input type="text" id="declarant_house_subdivision" name="declarant_house_subdivision"
                            value="{{ old('declarant_house_subdivision', $prefillData['declarant']['houseAddress']['houseSubdivision'] ?? '') }}">
                    </div>
                    <div>
                        <label for="declarant_house_barangay">Barangay</label>
                        <input type="text" id="declarant_house_barangay" name="declarant_house_barangay"
                            value="{{ old('declarant_house_barangay', $prefillData['declarant']['houseAddress']['houseBarangay'] ?? '') }}">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="declarant_house_city">City/Municipality</label>
                        <input type="text" id="declarant_house_city" name="declarant_house_city"
                            value="{{ old('declarant_house_city', $prefillData['declarant']['houseAddress']['houseCity'] ?? '') }}">
                    </div>
                    <div>
                        <label for="declarant_house_region">Region</label>
                        <input type="text" id="declarant_house_region" name="declarant_house_region"
                            value="{{ old('declarant_house_region', $prefillData['declarant']['houseAddress']['houseRegion'] ?? '') }}">
                    </div>
                </div>
                <div class="rowone">
                    <div>
                        <label for="declarant_house_zip">Zip Code</label>
                        <input type="text" id="declarant_house_zip" name="declarant_house_zip"
                            value="{{ old('declarant_house_zip', $prefillData['declarant']['houseAddress']['houseZipCode'] ?? '') }}">
                    </div>
                </div>
                <!-- DECLARANT OFFICE ADDRESS -->
                <h3>Office Address</h3>
                <div class="row">
                    <div>
                        <label for="declarant_office_name">Agency/Office</label>
                        <input type="text" id="declarant_office_name" name="declarant_office_name"
                            value="{{ old('declarant_office_name', $prefillData['declarant']['agencyOffice'] ?? '') }}">
                    </div>
                    <div>
                        <label for="declarant_office_street">Street</label>
                        <input type="text" id="declarant_office_street" name="declarant_office_street"
                            value="{{ old('declarant_office_street', $prefillData['declarant']['officeAddress']['officeStreet'] ?? '') }}">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="declarant_office_city">City/Municipality</label>
                        <input type="text" id="declarant_office_city" name="declarant_office_city"
                            value="{{ old('declarant_office_city', $prefillData['declarant']['officeAddress']['officeCity'] ?? '') }}">
                    </div>
                    <div>
                        <label for="declarant_office_region">Region</label>
                        <input type="text" id="declarant_office_region" name="declarant_office_region"
                            value="{{ old('declarant_office_region', $prefillData['declarant']['officeAddress']['officeRegion'] ?? '') }}">
                    </div>
                </div>
                <div class="rowone">
                    <div>
                        <label for="declarant_office_zip">Zip Code</label>
                        <input type="text" id="declarant_office_zip" name="declarant_office_zip"
                            value="{{ old('declarant_office_zip', $prefillData['declarant']['officeAddress']['officeZipCode'] ?? '') }}">
                    </div>
                </div>
            </div>

            <div id="spouseRepeater">
                @foreach ($prefillData['declarant']['spouses'] ?? [] as $index => $spouse)
                    <div class="spouse-block">
                        <h4 class="spouse-header">Spouse {{ $index + 1 }} Information</h4>

                        <div class="row">
                            <div>
                                <label>Family Name</label>
                                <input type="text" name="spouse_family_name[]"
                                    value="{{ $spouse['familyName'] ?? '' }}">
                            </div>
                            <div>
                                <label>First Name</label>
                                <input type="text" name="spouse_first_name[]"
                                    value="{{ $spouse['firstName'] ?? '' }}">
                            </div>
                            <div>
                                <label>M.I.</label>
                                <input type="text" name="spouse_mi[]"
                                    value="{{ $spouse['middleInitial'] ?? '' }}">
                            </div>
                        </div>

                        <h4>Office Address</h4>
                        <div class="row">
                            <div>
                                <label>Agency/Office</label>
                                <input type="text" name="spouse_office_name[]"
                                    value="{{ $spouse['agencyOffice'] ?? '' }}">
                            </div>
                            <div>
                                <label>Street</label>
                                <input type="text" name="spouse_office_street[]"
                                    value="{{ $spouse['officeAddress']['officeStreet'] ?? '' }}">
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <label>City/Municipality</label>
                                <input type="text" name="spouse_office_city[]"
                                    value="{{ $spouse['officeAddress']['officeCity'] ?? '' }}">
                            </div>
                            <div>
                                <label>Region</label>
                                <input type="text" name="spouse_office_region[]"
                                    value="{{ $spouse['officeAddress']['officeRegion'] ?? '' }}">
                            </div>
                        </div>
                        <div class="rowone">
                            <div>
                                <label>Zip Code</label>
                                <input type="text" name="spouse_office_zip[]"
                                    value="{{ $spouse['officeAddress']['officeZipCode'] ?? '' }}">
                            </div>
                        </div>

                        <div class="spouse-actions">
                            <button type="button" class="button-remove remove-spouse"
                                onclick="removeSpouseBlock(this)">Remove Spouse</button>
                        </div>
                    </div>
                @endforeach

                @if (empty($prefillData['declarant']['spouses']))
                    <div class="spouse-block">
                        <h4 class ="spouse-header">Spouse 1 Information</h4>
                        <div class="row">
                            <div>
                                <label>Family Name</label>
                                <input type="text" name="spouse_family_name[]">
                            </div>
                            <div>
                                <label>First Name</label>
                                <input type="text" name="spouse_first_name[]">
                            </div>
                            <div>
                                <label>M.I.</label>
                                <input type="text" name="spouse_mi[]">
                            </div>
                        </div>

                        <h4>Home Address</h4>
                        <div class="row">
                            <div>
                                <label>House Number</label>
                                <input type="text" name="spouse_house_number[]">
                            </div>
                            <div>
                                <label>Street</label>
                                <input type="text" name="spouse_house_street[]">
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <label>Subdivision</label>
                                <input type="text" name="spouse_house_subdivision[]">
                            </div>
                            <div>
                                <label>Barangay</label>
                                <input type="text" name="spouse_house_barangay[]">
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <label>City/Municipality</label>
                                <input type="text" name="spouse_house_city[]">
                            </div>
                            <div>
                                <label>Region</label>
                                <input type="text" name="spouse_house_region[]">
                            </div>
                        </div>
                        <div class="rowone">
                            <div>
                                <label>Zip Code</label>
                                <input type="text" name="spouse_house_zip[]">
                            </div>
                        </div>

                        <h4>Office Address</h4>
                        <div class="row">
                            <div>
                                <label>Agency/Office</label>
                                <input type="text" name="spouse_office_name[]">
                            </div>
                            <div>
                                <label>Street</label>
                                <input type="text" name="spouse_office_street[]">
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <label>City/Municipality</label>
                                <input type="text" name="spouse_office_city[]">
                            </div>
                            <div>
                                <label>Region</label>
                                <input type="text" name="spouse_office_region[]">
                            </div>
                        </div>
                        <div class="rowone">
                            <div>
                                <label>Zip Code</label>
                                <input type="text" name="spouse_office_zip[]">
                            </div>
                        </div>
                        <div class="spouse-actions">
                            <button type="button" class="button-remove remove-spouse"
                                onclick="removeSpouseBlock(this)">Remove Spouse</button>
                        </div>
                    </div>
                @endif
            </div>


            <!-- Add Row Button -->
            <div class="left-button">
                <button type="button" onclick="addSpouseBlock()">Add Spouse</button>
            </div>

            <h3>Unmarried Children</h3>

            <div id="children_fields">
                @foreach ($prefillData['declarant']['unmarriedChildren'] ?? [] as $child)
                    <div class="row child-entry">
                        <div>
                            <label>Name</label>
                            <input type="text" name="children_name[]" value="{{ $child['name'] ?? '' }}">
                        </div>
                        <div>
                            <label>Date of Birth</label>
                            <input type="date" name="children_dob[]" value="{{ $child['dateOfBirth'] ?? '' }}"
                                onchange="calculateAge(this)">
                        </div>
                        <div>
                            <label>Age</label>
                            <input type="text" name="children_age[]" value="{{ $child['age'] ?? '' }}" readonly>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="left-button">
                <button type="button" style="font-size: 13px;" onclick="addChildRow()">Add Unmarried Child</button>
            </div>
            <div class="left-button">
                <button type="button" style="font-size: 13px;" class="button-remove"
                    onclick="removeLastChildRow()">Remove Unmarried Child</button>
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
                                </td>
                            </tr>
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
                            <tr>
                                <td><input type="text" name="nameBusiness[]"></td>
                                <td><input type="text" name="addressBusiness[]"></td>
                                <td><input type="text" name="natureBusiness[]"></td>
                                <td><input type="text" name="dateInterest[]"></td>
                                <td>
                                    <button type="button" class="btn btn-remove"
                                        onclick="removeBusinessRow(this)">Delete</button>
                                </td>
                            </tr>
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
                                <tr>
                                    <td><input type="text" name="nameRelative[]"></td>
                                    <td><input type="text" name="relationship[]"></td>
                                    <td><input type="text" name="position[]"></td>
                                    <td><input type="text" name="nameAgency[]"></td>
                                    <td>
                                        <button type="button" class="btn btn-remove"
                                            onclick="removeRelativeRow(this)">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="left-button">
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
                        <p>Date: _______________________________________</p>
                        <br>
                        <div class="row" style="margin-top: 30px;">
                            <div style="flex: 1; text-align: center;">
                                <div style="border-top: 1px solid #000; width: 80%; margin: 0 auto 8px;"></div>
                                <label>Signature of Declarant</label>
                                <div>
                                    <label>Government Issued ID</label>
                                    <input type="text" name="govIDDeclarant">
                                </div>
                                <div>
                                    <label>ID No.:</label>
                                    <input type="text" name="idNoDeclarant">
                                </div>
                                <div>
                                    <label>Date Issued:</label>
                                    <input type="date" name="idDateDeclarant">
                                </div>
                            </div>

                            <div style="flex: 1; text-align: center;">
                                <div style="border-top: 1px solid #000; width: 80%; margin: 0 auto 8px;"></div>
                                <label>Signature of Co-Declarant/Spouse</label>
                                <div>
                                    <label>Government Issued ID</label>
                                    <input type="text" name="govIDSpouse">
                                </div>
                                <div>
                                    <label>ID No.:</label>
                                    <input type="text" name="idNoSpouse">
                                </div>
                                <div>
                                    <label>Date Issued:</label>
                                    <input type="date" name="idDateSpouse">
                                </div>
                            </div>
                        </div>

                        <p style="margin-top: 30px;">
                            <strong>SUBSCRIBED AND SWORN</strong> to before me this ______ day of ____________, affiant
                            exhibiting to me the
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
    <br />
    <form action="/home/import-json" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="json_file" accept=".json">
        <button type="submit">Import JSON</button>
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
            button.closest('tr').remove();
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
            button.closest('tr').remove();
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
            button.closest('tr').remove();
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
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[name="children_dob[]"]').forEach(input => {
                if (input.value) {
                    calculateAge(input);
                }
            });
        });
    </script>
</body>

</html>
