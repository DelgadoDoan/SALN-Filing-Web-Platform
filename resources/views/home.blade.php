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

    </style>
    </head>
    <body>
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
            <input type="date" id="asof_date" name="asof_date">
            <div class="error">{{ $errors->first('asOfDate') }}</div>
            <small>(Required by R.A. 6713)</small>
        </div>
        </div>


        <div class="note">
            <em>Note:</em> Husband and wife who are both public officials and employees may file the required statements jointly or separately.
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
                <input type="text" id="declarant_family_name" name="declarant_family_name">
            </div>
            <div>
                <label for="declarant_first_name">First Name</label>
                <input type="text" id="declarant_first_name" name="declarant_first_name">
            </div>
            <div>
                <label for="declarant_mi">M.I.</label>
                <input type="text" id="declarant_mi" name="declarant_mi">
            </div>
        </div>
        <!-- DECLARANT HOME ADRESS -->
        <h3>Home Address</h3>
        <div class="row">
            <div>
                <label for="declarant_house_number">House Number</label>
                <input type="text" id="declarant_house_number" name="declarant_house_number">
            </div>
            <div>
                <label for="declarant_house_street">Street</label>
                <input type="text" id="declarant_house_street" name="declarant_house_street">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="declarant_house_subdivision">Subdivision</label>
                <input type="text" id="declarant_house_subdivision" name="declarant_house_subdivision">
            </div>
            <div>
                <label for="declarant_house_barangay">Barangay</label>
                <input type="text" id="declarant_house_barangay" name="declarant_house_barangay">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="declarant_house_city">City/Municipality</label>
                <input type="text" id="declarant_house_city" name="declarant_house_city">
            </div>
            <div>
                <label for="declarant_house_region">Region</label>
                <input type="text" id="declarant_house_region" name="declarant_house_region">
            </div>
        </div>
        <div class="rowone">
            <div>
                <label for="declarant_house_zip">Zip Code</label>
                <input type="text" id="declarant_house_zip" name="declarant_house_zip">
            </div>
        </div>
        <!-- DECLARANT OFFICE ADDRESS -->
        <h3>Office Address</h3>
        <div class="row">
            <div>
                <label for="declarant_office_name">Agency/Office</label>
                <input type="text" id="declarant_office_name" name="declarant_office_name">
            </div>
            <div>
                <label for="declarant_office_street">Street</label>
                <input type="text" id="declarant_office_street" name="declarant_office_street">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="declarant_office_city">City/Municipality</label>
                <input type="text" id="declarant_office_city" name="declarant_office_city">
            </div>
            <div>
                <label for="declarant_office_region">Region</label>
                <input type="text" id="declarant_office_region" name="declarant_office_region">
            </div>
        </div>
        <div class="rowone">
            <div>
                <label for="declarant_office_zip">Zip Code</label>
                <input type="text" id="declarant_office_zip" name="declarant_office_zip">
            </div>
        </div>
        </div>

        <h3>Spouse Information</h3>
        <div id="spouseRepeater">
            <div class="spouse-block">
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
            </div>
        </div>

        <!-- Add Row Button -->
        <div class="left-button">
            <button type="button" onclick="addSpouseBlock()">Add Spouse</button>
        </div>


        <h3>Unmarried Children</h3>
        <div id="children_fields">
            <div class="row child-entry">
                <div>
                    <label for="children_name[]">Name</label>
                    <input type="text" name="children_name[]">
                </div>
                <div>
                    <label for="children_dob[]">Date of Birth</label>
                    <input type="date" name="children_dob[]">
                </div>
            </div>
        </div>

        <div class="left-button">
            <button type="button" onclick="addChildRow()">Add Row</button>
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
                        <tr>
                            <td><input type="text" name="desc[]"></td>
                            <td><input type="text" name="kind[]"></td>
                            <td><input type="text" name="location[]"></td>
                            <td><input type="text" name="assessed[]"></td>
                            <td><input type="text" name="marketValue[]"></td>
                            <td><input type="text" name="acqYear[]"></td>
                            <td><input type="text" name="acqMode[]"></td>
                            <td><input type="text" name="acqCost[]"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" onclick="addRealProperty()">Add Rows</button>
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

                        </tr>
                    </thead>
                    <tbody id="assetsPersonal">
                        <tr>
                            <td><input type="text" name="description[]"></td>
                            <td><input type="text" name="yearAcquired[]"></td>
                            <td><input type="text" name="acquisitionCost[]"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="left-button">
                    <button type="button" onclick="addPersonalProperty()">Add Rows</button>
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

                        </tr>
                    </thead>
                    <tbody id="liabilitiesBody">
                        <tr>
                            <td><input type="text" name="nature[]"></td>
                            <td><input type="text" name="nameCreditor[]"></td>
                            <td><input type="text" name="OutstandingBalance[]"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="left-button">
                    <button type="button" onclick="addLiability()">Add Rows</button>
                </div>
                <div class="asset-controls">
                <div class ="asset-totals">
                    <div class="subtotal-row2">
                        <label for="subtotal">Subtotal: </label>
                        <input type="text" id="subtotalLiabilities" readonly>
                    </div>
                    <div class="subtotal-row2">
                        <label for="totalAssets">Networth: </label>
                        <input type="text" id="totalAssets" readonly>
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
                        </tr>
                    </thead>
                    <tbody id="businessBody">
                        <tr>
                            <td><input type="text" name="nameBusiness[]"></td>
                            <td><input type="text" name="addressBusiness[]"></td>
                            <td><input type="text" name="natureBusiness[]"></td>
                            <td><input type="text" name="dateInterest[]"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="left-button">
                    <button type="button" onclick="addBusiness()">Add Rows</button>
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
                        </tr>
                    </thead>
                    <tbody id="relativesBody">
                        <tr>
                            <td><input type="text" name="nameRelative[]"></td>
                            <td><input type="text" name="relationship[]"></td>
                            <td><input type="text" name="position[]"></td>
                            <td><input type="text" name="nameAgency[]"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="left-button">
                    <button type="button" onclick="addRelative()">Add Rows</button>
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

        <div class="rowone" style="margin: 20px 0;">
            <label for="certDate">Date:</label>
            <input type="date" id="certDate" name="certDate">
        </div>

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

                    // Optional: clear input values
                    clone.querySelectorAll('input').forEach(input => input.value = '');

                    container.appendChild(clone);
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
                        td.appendChild(input);
                        tr.appendChild(td);
                    });

                    tbody.appendChild(tr);
                }

                function addPersonalProperty(){
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
                        td.appendChild(input);
                        tr.appendChild(td);
                    })

                    tbody.appendChild(tr);

                }

                function addLiability(){
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
                        td.appendChild(input);
                        tr.appendChild(td);
                    })

                    tbody.appendChild(tr);
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
                                <input type="date" name="children_dob[]">
                            </div>
                        `;

                        container.appendChild(newRow);
                    }
            </script>
</body>
</html>