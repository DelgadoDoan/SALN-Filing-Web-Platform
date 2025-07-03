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

    </style>
    </head>
    <body>
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
            <input type="date" id="date" name="date">
            <small>(Required by R.A. 6713)</small>
        </div>
        </div>


        <div class="note">
            <em>Note:</em> Husband and wife who are both public officials and employees may file the required statements jointly or separately.
        </div>

        <div class="checkbox-group">
            <label><input type="checkbox" name="filing" value="joint" onclick="checkOnly(this)"> Joint Filing</label>
            <label><input type="checkbox" name="filing" value="separate" onclick="checkOnly(this)"> Separate Filing</label>
            <label><input type="checkbox" name="filing" value="na" onclick="checkOnly(this)"> Not Applicable</label>
        </div>


        <!-- Declarant Section -->
        <div class="form-section">
        <h3>Declarant Information</h3>
        <div class="row">
            <div>
                <label>Declarant - Family Name</label>
                <input type="text">
            </div>
            <div>
                <label>First Name</label>
                <input type="text">
            </div>
            <div>
                <label>M.I.</label>
                <input type="text">
            </div>
        </div>
        <h3>Home Address</h3>
        <div class="row">
            <div>
                <label for="houseNumber">House Number</label>
                <input type="text" id="houseNumber" name="houseNumber">
            </div>
            <div>
                <label for="houseStreet">Street</label>
                <input type="text" id="houseStreet" name="houseStreet">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="subdivision">Subdivision</label>
                <input type="text" id="subdivision" name="subdivision">
            </div>
            <div>
                <label for="barangay">Barangay</label>
                <input type="text" id="barangay" name="barangay">
            </div>
        </div>

        <div class="row">
            <div>
                <label for="city">City/Municipality</label>
                <input type="text" id="city" name="city">
            </div>
            <div>
                <label for="region">Region</label>
                <input type="text" id="region" name="region">
            </div>
        </div>
        <div class="rowone">
            <div>
                <label for="zip">Zip Code</label>
                <input type="text" id="zip" name="zip">
            </div>
        </div>
        <h3>Office Address</h3>
        <div class="row">
            <div>
                <label>Agency/Office</label>
                <input type="text">
            </div>
            <div>
                <label>Street</label>
                <input type="text" id="houseStreet" name="houseStreet">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="city">City/Municipality</label>
                <input type="text" id="city" name="city">
            </div>
            <div>
                <label for="region">Region</label>
                <input type="text" id="region" name="region">
            </div>
        </div>
        <div class="rowone">
            <div>
                <label for="zip">Zip Code</label>
                <input type="text" id="zip" name="zip">
            </div>
        </div>
        </div>

        <!-- Spouse Section -->
        <div class="form-section">
        <h3>Spouse Information</h3>
        <div class="row">
            <div>
            <label>Spouse - Family Name</label>
            <input type="text">
            </div>
            <div>
            <label>First Name</label>
            <input type="text">
            </div>
            <div>
            <label>M.I.</label>
            <input type="text">
            </div>
        </div>
        <div class="left-button">
            <button type="button">Add Rows</button>
        </div>

        <h3>Home Address</h3>
        <div class="row">
            <div>
                <label for="houseNumber">House Number</label>
                <input type="text" id="houseNumber" name="houseNumber">
            </div>
            <div>
                <label for="houseStreet">Street</label>
                <input type="text" id="houseStreet" name="houseStreet">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="subdivision">Subdivision</label>
                <input type="text" id="subdivision" name="subdivision">
            </div>
            <div>
                <label for="barangay">Barangay</label>
                <input type="text" id="barangay" name="barangay">
            </div>
        </div>

        <div class="row">
            <div>
                <label for="city">City/Municipality</label>
                <input type="text" id="city" name="city">
            </div>
            <div>
                <label for="region">Region</label>
                <input type="text" id="region" name="region">
            </div>
        </div>
        <div class="rowone">
            <div>
                <label for="zip">Zip Code</label>
                <input type="text" id="zip" name="zip">
            </div>
        </div>
        <h3>Office Address</h3>
        <div class="row">
            <div>
                <label>Agency/Office</label>
                <input type="text">
            </div>
            <div>
                <label>Street</label>
                <input type="text" id="houseStreet" name="houseStreet">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="city">City/Municipality</label>
                <input type="text" id="city" name="city">
            </div>
            <div>
                <label for="region">Region</label>
                <input type="text" id="region" name="region">
            </div>
        </div>
        <div class="rowone">
            <div>
                <label for="zip">Zip Code</label>
                <input type="text" id="zip" name="zip">
            </div>
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
                    <tbody id="assets-body">
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
                <button type="button">Add Rows</button>
                <div class="asset-controls2">
                <div class="subtotal-row">
                    <label for="subtotal">Subtotal: </label>
                    <input type="text" id="subtotal" readonly>
                </div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4 style="font-weight:normal;">Personal</h4>
            <div class="assets-table-wrapper">
                <table class="assets-table">
                    <thead>
                        <tr>
                            <th rowspan="1">Description</th>
                            <th rowspan="1">Year Acquired</th>
                            <th rowspan="1">Acquisition Cost/Amount</th>

                        </tr>
                    </thead>
                    <tbody id="assets-body">
                        <tr>
                            <td><input type="text" name="description[]"></td>
                            <td><input type="text" name="yearAcquired[]"></td>
                            <td><input type="text" name="acquisitionCost[]"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="left-button">
                    <button type="button">Add Rows</button>
                </div>
                <div class="asset-controls">
                <div class ="asset-totals">
                    <div class="subtotal-row2">
                        <label for="subtotal">Subtotal: </label>
                        <input type="text" id="subtotal" readonly>
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
                    <tbody id="assets-body">
                        <tr>
                            <td><input type="text" name="nature[]"></td>
                            <td><input type="text" name="nameCreditor[]"></td>
                            <td><input type="text" name="OutstandingBalance[]"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="left-button">
                    <button type="button">Add Rows</button>
                </div>
                <div class="asset-controls">
                <div class ="asset-totals">
                    <div class="subtotal-row2">
                        <label for="subtotal">Subtotal: </label>
                        <input type="text" id="subtotal" readonly>
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
                    <tbody id="assets-body">
                        <tr>
                            <td><input type="text" name="nameBusiness[]"></td>
                            <td><input type="text" name="addressBusiness[]"></td>
                            <td><input type="text" name="natureBusiness[]"></td>
                            <td><input type="text" name="dateInterest[]"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="left-button">
                    <button type="button">Add Rows</button>
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
                    <tbody id="assets-body">
                        <tr>
                            <td><input type="text" name="nameRelative[]"></td>
                            <td><input type="text" name="relationship[]"></td>
                            <td><input type="text" name="position[]"></td>
                            <td><input type="text" name="nameAgency[]"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="left-button">
                    <button type="button">Add Rows</button>
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
    <script>
    function checkOnly(clickedCheckbox) {
        const checkboxes = document.querySelectorAll('input[name="filing"]');
        checkboxes.forEach(box => {
        if (box !== clickedCheckbox) box.checked = false;
        });
    }
    </script>

</body>
</html>