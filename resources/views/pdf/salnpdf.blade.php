<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SALN Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible&display=swap" rel="stylesheet">

    <style>
    html {
        margin: 48px;  
        background-color: red;
    }

    body {
        font-size: 11px;
        font-family: Calibri, sans-serif;
    }

    #main-page-2 {
        page-break-before: always;
    }

    .header-note {
        position: fixed;
        top: -36px;
        right: -36px;
        width: 100%;
    }

    .header-note td,
    .totals td {
        white-space: nowrap;
    } 

    h2 {
        font-size: 0.875rem;
        text-align: center;
        margin-top: 1rem;
        margin-bottom: 0.1rem;
    }

    h3 {
        font-size: 11px;
        text-align: center;
    }

    .as-of-date {
        text-align: center;
    }

    .note {
        font-size: 10px;
        text-align: center;
        font-style: italic;
        margin-top: 0.5rem;
    }

    .checkbox-group {
        display: flex;
        flex-direction: row;
        justify-content: center;
        text-align: center;
        margin: 0.25rem auto 0.75rem;
    }

    .checkbox-group label {
        text-align: center;
        font-weight: bold;
        font-style: italic;
        margin-right: 3rem;
    }

    input[type="checkbox"] {
        width: 15px;
        height: 15px;
        margin-right: 0.5rem;
        margin-left: 3rem;
    }

    .declarant-info {
        width: 100%;
        display: flex;
        flex-direction: row;
    }

    .declarant-info > div {
        flex: 1;
        max-width: 40%;
        background-color: red;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    .bordered * {
        border: 1px solid #000;
    }

    .bordered th {
        background-color: #c7d6ea;
        font-size: 11px;
        text-align: center;
        padding: 0.75rem;
    }

    .bordered td {
        font-size: 10px;
        text-align: center;
    }

    td {
        height: 0.7rem;
    }

    .assets-note {
        font-style: italic;
        text-align: center;
    }

    .totals,
    .totals td,
    .totals tr,
    .totals th {
        font-size: 9px;
    }

    .subtotal {
        margin: 0.2rem auto;
    }

    .underline {
        border-bottom: 1px solid black;
        text-align: center;
    }

    p {
        text-indent: 48px; 
        font-size: 11px;
    }

    .additional-declarant,
    .additional-spouse {
        page-break-before: always;
    }

    </style>
</head>

<body>
    <div id="main-page-1">
        <table class="header-note">
            <tr>
                <td style="width: 100%;"></td>
                <td>
                    Revised as of January 2015
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Per CSC Resolution No. 1500088</td>
            </tr>
            <tr>
                <td></td>
                <td>Promulgated on January 23, 2015</td>
            </tr>
        </table>
            
        <h2>SWORN STATEMENT OF ASSETS, LIABILITIES AND NET WORTH</h2>

        <table>
            <tbody>
                <tr>
                    <td style="width: 33%;"></td>
                    <td style="text-align: center; width: 6%;">As of</td>
                    <td class="underline" style="width: 27%;">{{ $asOfDate }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2" style="font-size: 9px; text-align: center; padding-top: 0.2rem;">(Required by R.A. 6713)</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        
        <div class="note">
            <b>Note:</b> Husband and wife who are both public officials and employees may file the required statements jointly or separately.															
        </div>

        <div class="checkbox-group">
            <label for="squareCheck"><input type="checkbox" id="squareCheck" {{ $filingType ? (($filingType === 'joint filing') ? 'checked': '') : '' }}>Joint Filing</label>
            <label for="squareCheck"><input type="checkbox" id="squareCheck"{{ $filingType ? (($filingType === 'separate filing') ? 'checked': '') : '' }}>Separate Filing</label>
            <label for="squareCheck"><input type="checkbox" id="squareCheck" {{ $filingType ? (($filingType === 'not applicable') ? 'checked': '') : '' }}>Not Applicable</label>
        </div>

        <table>
            <tbody>
                <tr>
                    <td>DECLARANT:</td>
                    <td class="underline" style="width: 12%;">{{ $declarant['familyName'] }}</td>
                    <td class="underline" style="width: 12%;">{{ $declarant['firstName'] }}</td>
                    <td class="underline" style="width: 12%;">{{ $declarant['middleInitial'] }}</td>
                    <td style="width: 12%;"></td>
                    <td>POSITION:</td>
                    <td class="underline" style="width: 30%;">{{ $declarant['position'] }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size: 10px; text-align: center;">(Family Name)</td>
                    <td style="font-size: 10px; text-align: center;">(First Name)</td>
                    <td style="font-size: 10px; text-align: center;">(M.I.)</td>
                    <td></td>
                    <td style="font-size: 8px;">AGENCY/OFFICE:</td>
                    <td class="underline">{{ $declarant['agencyOffice'] }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                    <td style="font-size: 8px;">OFFICE ADDRESS:</td>
                    <td class="underline">
                        {{ isset($declarant['officeAddress']['officeNo']) && $declarant['officeAddress']['officeNo'] !== ''
                            ? $declarant['officeAddress']['officeNo'].', '
                            : ''
                        }}
                        {{ isset($declarant['officeAddress']['officeStreet']) && $declarant['officeAddress']['officeStreet'] !== ''
                            ? $declarant['officeAddress']['officeStreet'].', '
                            : ''
                        }}
                        {{ isset($declarant['officeAddress']['officeCity']) && $declarant['officeAddress']['officeCity'] !== ''
                            ? $declarant['officeAddress']['officeCity'].', '
                            : ''
                        }}
                    </td>
                </tr>
                <tr>
                    <td>ADDRESS:</td>
                    <td colspan="3" class="underline">
                        {{ isset($declarant['houseAddress']['houseNo']) && $declarant['houseAddress']['houseNo'] !== ''
                            ? $declarant['houseAddress']['houseNo'].', '
                            : ''
                        }}
                        {{ isset($declarant['houseAddress']['houseStreet']) && $declarant['houseAddress']['houseStreet'] !== ''
                            ? $declarant['houseAddress']['houseStreet'].', '
                            : ''
                        }}
                        {{ isset($declarant['houseAddress']['houseSubdivision']) && $declarant['houseAddress']['houseSubdivision'] !== ''
                            ? $declarant['houseAddress']['houseSubdivision'].', '
                            : ''
                        }}
                        {{ isset($declarant['houseAddress']['houseBarangay']) && $declarant['houseAddress']['houseBarangay'] !== ''
                            ? $declarant['houseAddress']['houseBarangay'].', '
                            : ''
                        }}
                    </td>
                    <td></td>
                    <td></td>
                    <td class="underline">
                        {{ isset($declarant['officeAddress']['officeRegion']) && $declarant['officeAddress']['officeRegion'] !== ''
                            ? $declarant['officeAddress']['officeRegion'].', '
                            : ''
                        }}
                        {{ $declarant['officeAddress']['officeZipCode'] }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3" class="underline">
                        {{ isset($declarant['houseAddress']['houseCity']) && $declarant['houseAddress']['houseCity'] !== ''
                            ? $declarant['houseAddress']['houseCity'].', '
                            : ''
                        }}
                        {{ isset($declarant['houseAddress']['houseRegion']) && $declarant['houseAddress']['houseRegion'] !== ''
                            ? $declarant['houseAddress']['houseRegion'].', '
                            : ''
                        }}
                        {{ $declarant['houseAddress']['houseZipCode'] }}
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
                <tr>
                    <td style="padding-top: 0.5rem;">SPOUSE:</td>
                    <td class="underline" style="padding-top: 0.5rem;">{{ $declarant['spouses'][0]['familyName'] }}</td>
                    <td class="underline" style="padding-top: 0.5rem;">{{ $declarant['spouses'][0]['firstName'] }}</td>
                    <td class="underline" style="padding-top: 0.5rem;">{{ $declarant['spouses'][0]['middleInitial'] }}</td>
                    <td></td>
                    <td style="padding-top: 0.5rem;">POSITION:</td>
                    <td class="underline" style="padding-top: 0.5rem;">{{ $declarant['spouses'][0]['position'] }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size: 10px; text-align: center;">(Family Name)</td>
                    <td style="font-size: 10px; text-align: center;">(First Name)</td>
                    <td style="font-size: 10px; text-align: center;">(M.I.)</td>
                    <td></td>
                    <td style="font-size: 8px;">AGENCY/OFFICE:</td>
                    <td class="underline">{{ $declarant['spouses'][0]['agencyOffice'] }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                    <td style="font-size: 8px;">OFFICE ADDRESS:</td>
                    <td class="underline">
                        {{ isset($declarant['spouses'][0]['officeAddress']['officeNo']) && $declarant['spouses'][0]['officeAddress']['officeNo'] !== ''
                            ? $declarant['spouses'][0]['officeAddress']['officeNo'].', '
                            : ''
                        }}
                        {{ isset($declarant['spouses'][0]['officeAddress']['officeStreet']) && $declarant['spouses'][0]['officeAddress']['officeStreet'] !== ''
                            ? $declarant['spouses'][0]['officeAddress']['officeStreet'].', '
                            : ''
                        }}
                        {{ isset($declarant['spouses'][0]['officeAddress']['officeCity']) && $declarant['spouses'][0]['officeAddress']['officeCity'] !== ''
                            ? $declarant['spouses'][0]['officeAddress']['officeCity'].', '
                            : ''
                        }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="underline">
                        {{ isset($declarant['spouses'][0]['officeAddress']['officeRegion']) && $declarant['spouses'][0]['officeAddress']['officeRegion'] !== ''
                            ? $declarant['spouses'][0]['officeAddress']['officeRegion'].', '
                            : ''
                        }}
                        {{ $declarant['spouses'][0]['officeAddress']['officeZipCode'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        <hr style="margin-bottom: 0;"/>
        <table>
            <tr>
                <td colspan="6">
                <h3 style="text-decoration: underline;">UNMARRIED CHILDREN BELOW EIGHTEEN (18) YEARS OF AGE LIVING IN DECLARANT'S HOUSEHOLD</h3>													
                </td>
            </tr>
            <tr>
                <td style="text-align: center; width: 45%;">NAME</td>
                <td></td>
                <td style="text-align: center; width: 25%;">DATE OF BIRTH</td>
                <td></td>
                <td style="text-align: center; width: 12%;">AGE</td>
                <td></td>
            </tr>
            @php
                use Carbon\Carbon;
            @endphp

            @for ($i=0; $i < 5; $i++)
                @php
                    $child = $declarant['unmarriedChildren'][$i] ?? null;
                    $age = $child && !empty($child['dateOfBirth']) ? Carbon::parse($child['dateOfBirth'])->age : '';
                @endphp
                <tr>
                    <td class="underline">{{ $declarant['unmarriedChildren'][$i]['name'] ?? '' }}</td>
                    <td></td>
                    <td class="underline">{{ $declarant['unmarriedChildren'][$i]['dateOfBirth'] ?? '' }}</td>
                    <td></td>
                    <td class="underline">{{ $age }}</td>
                    <td></td>
                </tr>
            @endfor
        </table>
        <hr style="margin-top: 0.7rem;"/>
 
        <h3 style="text-decoration: underline; margin-bottom: 0.1rem;">ASSETS, LIABILITIES AND NETWORTH</h3>
        <div class="assets-note">
            (Including those of the spouse and unmarried children below eighteen (18) <br />
            years of age living in declarant's household)
        </div>
        
        @php    
            $subtotalReal = 0.0;
            $subtotalPersonal = 0.0;

            foreach ($declarant['assets']['realProperties'] ?? [] as $realProperty) {
                $subtotalReal += (float)($realProperty['acquisitionCost'] ?? '0');
            }

            foreach ($declarant['assets']['personalProperties'] ?? [] as $personalProperty) {
                $subtotalPersonal += (float)($personalProperty['acquisitionCost'] ?? '0');
            }

            $totalAssets = $subtotalReal + $subtotalPersonal;

            $totalLiabilities = 0.0;

            foreach ($declarant['liabilities'] ?? [] as $liability) {
                $totalLiabilities += (float)($liability['outstandingBalance'] ?? '0');
            }

            $netWorth = $totalAssets - $totalLiabilities;
        @endphp

        <h3 style="text-align: left; margin-top: 0;">1. ASSETS</h3>

        a. Real Properties*
        <table class="bordered">
            <thead>
                <tr>
                    <th colspan="1">DESCRIPTION</th>
                    <th colspan="1">KIND</th>
                    <th rowspan="2">EXACT LOCATION</th>
                    <th colspan="1">ASSESSED VALUE</th>
                    <th colspan="1">CURRENT FAIR MARKET VALUE</th>
                    <th colspan="2">ACQUISITION</th>
                    <th rowspan="2">ACQUISITION COST</th>
                </tr>
                <tr>
                    <th style="font-weight: normal; font-size: 9px;">(e.g. lot, house and lot, condominium, and improvements)</th>
                    <th style="font-weight: normal; font-size: 9px;">(e.g., residential, commercial, industrial, agricultural and mixed used)</th>
                    <th colspan="2" style="font-weight: normal; font-size: 9px;">(As found in the Tax Declaration of Real Property)</th>
                    <th>YEAR</th>
                    <th>MODE</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0; $i < 4; $i++)
                    <tr>
                        <td>{{ $declarant['assets']['realProperties'][$i]['description'] ?? '' }}</td>
                        <td>{{ $declarant['assets']['realProperties'][$i]['kind'] ?? '' }}</td>
                        <td>{{ $declarant['assets']['realProperties'][$i]['exactLocation'] ?? '' }}</td>
                        <td>{{ $declarant['assets']['realProperties'][$i]['assessedValue'] ?? '' }}</td>
                        <td>{{ $declarant['assets']['realProperties'][$i]['currentFairMarketValue'] ?? '' }}</td>
                        <td>{{ $declarant['assets']['realProperties'][$i]['acquisitionYear'] ?? '' }}</td>
                        <td>{{ $declarant['assets']['realProperties'][$i]['acquisitionMode'] ?? '' }}</td>
                        <td>
                            {{ isset($declarant['assets']['realProperties'][$i]['acquisitionCost']) && $declarant['assets']['realProperties'][$i]['acquisitionCost'] !== ''
                                ? 'PHP ' . number_format((float)$declarant['assets']['realProperties'][$i]['acquisitionCost'], 2)
                                : ''
                            }}
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <table class="totals">
            <tbody>
                <tr>
                    <td style="width: 50%;"></td>
                    <td style="text-align: right; width: 35%;">Subtotal:</td>
                    <td class="underline" style="width: 15%;">PHP {{ number_format($subtotalReal, 2) }}</td>
                </tr>
            </tbody>
        </table>
        
        b. Personal Properties*
        <table class="bordered">
            <thead>
                <tr>
                    <th rowspan="1" style="width: 56%;">DESCRIPTION</th>
                    <th rowspan="1" style="width: 13.25%;">YEAR ACQUIRED</th>
                    <th rowspan="1">ACQUISITION COST/AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0; $i < 4; $i++)
                    <tr>
                        <td>{{ $declarant['assets']['personalProperties'][$i]['description'] ?? '' }}</td>
                        <td>{{ $declarant['assets']['personalProperties'][$i]['yearAcquired'] ?? '' }}</td>
                        <td>
                            {{ isset($declarant['assets']['personalProperties'][$i]['acquisitionCost']) && $declarant['assets']['personalProperties'][$i]['acquisitionCost'] !== ''
                                ? 'PHP ' . number_format((float)$declarant['assets']['personalProperties'][$i]['acquisitionCost'], 2)
                                : ''
                            }}
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <table class="totals">
            <tbody>
                <tr>
                    <td style="width: 50%;"></td>
                    <td style="text-align: right; width: 35%;">Subtotal:</td>
                    <td class="underline" style="width: 15%;">PHP {{ number_format($subtotalPersonal, 2) }}</td>
                </tr>
                <tr>
                    <td style="width: 50%;"></td>
                    <td style="text-align: right; width: 35%; font-weight: bold;">TOTAL ASSETS (a+b): </td>
                    <td class="underline" style="width: 15%;">PHP {{ number_format($totalAssets, 2) }}</td>
                </tr>
            </tbody>
        </table>

    </div>
    <div id="main-page-2">
        <h3 style="text-align: left">2. LIABILITIES*</h3>
        <table class="bordered">
            <thead>
                <tr>
                    <th rowspan="1" style="width: 42.5%;">NATURE</th>
                    <th rowspan="1" style="width: 37.5%;">NAME OF CREDITORS</th>
                    <th rowspan="1">OUTSTANDING BALANCE</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0; $i < 4; $i++)
                    <tr>
                        <td>{{ $declarant['liabilities'][$i]['nature'] ?? '' }}</td>
                        <td>{{ $declarant['liabilities'][$i]['nameOfCreditor'] ?? '' }}</td>
                        <td>
                            {{ isset($declarant['liabilities'][$i]['outstandingBalance']) && $declarant['liabilities'][$i]['outstandingBalance'] !== ''
                                ? 'PHP ' . number_format((float)$declarant['liabilities'][$i]['outstandingBalance'], 2)
                                : ''
                            }}
                        </td>
                    </tr>
                @endfor 
            </tbody>
        </table>
        <table class="totals">
            <tbody>
                <tr>
                    <td style="width: 50%;"></td>
                    <td style="text-align: right; width: 35%; font-weight: bold;">TOTAL LIABILITIES:</td>
                    <td class="underline" style="width: 15%;">PHP {{ number_format($totalLiabilities, 2) }}</td>
                </tr>
                <tr>
                    <td style="width: 50%; font-size: 10px; font-style: italic;">* Additional sheet/s may be used, if necessary. </td>
                    <td style="text-align: right; width: 35%; font-weight: bold;">NET WORTH: Total Assets less Total Liabilities = </td>
                    <td class="underline" style="width: 15%;">PHP {{ number_format($netWorth, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <br />
        <h3 style="text-decoration: underline; margin-bottom: 0.1rem;">BUSINESS INTERESTS AND FINANCIAL CONNECTIONS</h3>
        <div class="assets-note">
            (of Declarant/Declarant's Spouse/Unmarried Children Below Eighteen (18) years of Age Living in Declarant's Household)
        </div>

        <div class="checkbox-group">
            <label for="squareCheck" style="font-weight: normal; font-style: normal;">
                <input type="checkbox" id="squareCheck" {{ $declarant['hasNoBusinessInterests'] ? 'checked': '' }}>I/We do not have any business interest or financial connection
            </label>
        </div>

        <table class="bordered">
            <thead>
                <tr>
                    <th rowspan="1" style="width: 27.5%;">NAME OF ENTITY/BUSINESS ENTERPRISE</th>
                    <th rowspan="1" style="width: 32.5%;">BUSINESS ADDRESS</th>
                    <th rowspan="1" style="font-size: 9px; width: 20%;">NATURE OF BUSINESS INTEREST & / OR FINANCIAL CONNECTION</th>
                    <th rowspan="1">DATE OF ACQUISITION OF INTEREST OR CONNECTION</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0; $i < 6; $i++)
                    <tr>
                        <td>{{ $declarant['businessInterestsAndFinancialConnections'][$i]['nameOfEntity'] ?? '' }}</td>
                        <td>{{ $declarant['businessInterestsAndFinancialConnections'][$i]['businessAddress'] ?? '' }}</td>
                        <td>{{ $declarant['businessInterestsAndFinancialConnections'][$i]['natureOfInterestOrConnection'] ?? '' }}</td>
                        <td>{{ $declarant['businessInterestsAndFinancialConnections'][$i]['dateOfAcquisition'] ?? '' }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <br />
        
        <h3 style="text-decoration: underline; margin-bottom: 0.1rem;">RELATIVES IN THE GOVERNMENT SERVICE</h3>
        <div class="assets-note">
            (Within the Fourth Degree of Consanguinity or Affinity, Include also Bilas, Balae and Inso)
        </div>

        <div class="checkbox-group">
            <label for="squareCheck" style="font-weight: normal; font-style: normal;">
                <input type="checkbox" id="squareCheck" {{ $declarant['hasNoRelativesInGovermentService'] ? 'checked': '' }}>I/We do not know of any relative/s in the government service
            </label>
        </div>

        <table class="bordered">
            <thead>
                <tr>
                    <th rowspan="1" style="width: 27.5%;">NAME OF RELATIVE</th>
                    <th rowspan="1" style="width: 20%;">RELATIONSHIP</th>
                    <th rowspan="1" style="width: 17.5%;">POSITION</th>
                    <th rowspan="1">NAME OF AGENCY/OFFICE AND ADDRESS</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0; $i < 6; $i++)
                    <tr>
                        <td>
                            {{ $declarant['relativesInGovernmentService'][$i]['firstName'] ?? '' }}
                            {{ $declarant['relativesInGovernmentService'][$i]['middleInitial'] ?? '' }}
                            {{ $declarant['relativesInGovernmentService'][$i]['familyName'] ?? '' }}
                        </td>
                        <td>{{ $declarant['relativesInGovernmentService'][$i]['relationship'] ?? '' }}</td>
                        <td>{{ $declarant['relativesInGovernmentService'][$i]['position'] ?? '' }}</td>
                        <td>{{ $declarant['relativesInGovernmentService'][$i]['agencyOfficeAndAddress'] ?? '' }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <div>
            <p>
                I hereby certify that these are true and correct statements of my assets, liabilities, net worth, business interests and financial connections, including 
                those of my spouse and unmarried children below eighteen (18) years of age living in my household, and that to  the best of my knowledge, 
                the above-enumerated are names of my relatives in the government within the fourth civil degree of consanguinity or affinity.
            </p>
                
            <p>
                I hereby authorize the Ombudsman or his/her duly authorized representative to obtain and secure from all appropriate government agencies, 
                including the Bureau of Internal Revenue such documents that may show my assets, liabilities, net worth, business interests and financial connections, to 
                include those of my spouse and unmarried children below 18 years of age living with me in my household covering previous years to include the year I first 
                assumed office in government.													
            </p>
        </div>

        <table>
            <tbody>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td style="width: 5%;">Date:</td>
                    <td class="underline" style="width: 25%;"></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <table style="margin: 0 auto; width: 90%;">
            <tbody>
                <tr>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td class="underline" colspan="2" style="width: 45%;"></td>
                    <td style="width: 10%;"></td>
                    <td class="underline" colspan="2" style="width: 45%;"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center; width: 45%;">(Signature of Declarant)</td>
                    <td style="width: 10%;"></td>
                    <td colspan="2" style="text-align: center; width: 45%;">(Signature of Co-Declarant/Spouse)</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td style="font-size: 10px; width: 20%;">Government Issued ID:</td>
                    <td class="underline" style="font-size: 10px; width: 25%;">{{ $declarant['governmentIssuedId']['type'] }}</td>
                    <td style="width: 10%;"></td>
                    <td style="font-size: 10px; width: 20%;">Government Issued ID:</td>
                    <td class="underline" style="font-size: 10px; width: 25%;">{{ $declarant['spouses'][0]['governmentIssuedId']['type'] }}</td>
                </tr>
                <tr>
                    <td style="font-size: 10px; width: 20%;">ID No:</td>
                    <td class="underline" style="font-size: 10px; width: 25%;">{{ $declarant['governmentIssuedId']['idNumber'] }}</td>
                    <td style="width: 10%;"></td>
                    <td style="font-size: 10px; width: 20%;">ID No:</td>
                    <td class="underline" style="font-size: 10px; width: 25%;">{{ $declarant['spouses'][0]['governmentIssuedId']['idNumber'] }}</td>
                </tr>
                <tr>
                    <td style="font-size: 10px; width: 20%;">Date Issued:</td>
                    <td class="underline" style="font-size: 10px; width: 25%;">{{ $declarant['governmentIssuedId']['dateIssued'] }}</td>
                    <td style="width: 10%;"></td>
                    <td style="font-size: 10px; width: 20%;">Date Issued:</td>
                    <td class="underline" style="font-size: 10px; width: 25%;">{{ $declarant['spouses'][0]['governmentIssuedId']['dateIssued'] }}</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                </tr>
            </tbody>
        </table>
        
        <div style="font-size: 10px;">
            <strong>SUBSCRIBED AND SWORN</strong> to before me this _____ day of ____________ , 
            affiant exhibiting to me the above-stated government issued identification card.
        </div>

        <table style="margin: 0 auto; width: 90%;">
            <tbody>
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="underline" style="width: 35%;"></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: center; font-size: 10px;">(Person Administering Oath)</td>
                </tr>
            </tbody>
        </table>
    </div>

    @php
        $noAdditionals = [
            ceil(count($declarant['assets']['realProperties']) / 4) - 1,
            ceil(count($declarant['assets']['personalProperties']) / 4) - 1,
            ceil(count($declarant['liabilities']) / 4) - 1,
            ceil(count($declarant['businessInterestsAndFinancialConnections']) / 6) - 1,
        ];

        $noAdditional = max($noAdditionals);
    @endphp

    @for ($pageIdx=1; $pageIdx <= $noAdditional; $pageIdx++)
        @php    
            $subtotalReal = 0.0;
            $subtotalPersonal = 0.0;

            for ($i=0; $i < 4; $i++) {
                $subtotalReal += (float)($declarant['assets']['realProperties'][4*$pageIdx + $i]['acquisitionCost'] ?? '0');
            }

            for ($i=0; $i < 4; $i++) {
                $subtotalPersonal += (float)($declarant['assets']['personalProperties'][4*$pageIdx + $i]['acquisitionCost'] ?? '0');
            }

            $totalAssets = $subtotalReal + $subtotalPersonal;

            $totalLiabilities = 0.0;

            for ($i=0; $i < 4; $i++) {
                $totalLiabilities  += (float)($declarant['liabilities'][4*$pageIdx + $i]['outstandingBalance'] ?? '0');
            }
        @endphp
        <div class="additional-declarant">
            <table class="header-note">
                <tr>
                    <td style="width: 100%;"></td>
                    <td>
                        Revised as of January 2015
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Per CSC Resolution No. 1500088</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Promulgated on January 23, 2015</td>
                </tr>
            </table>

            <h2>SWORN STATEMENT OF ASSETS, LIABILITIES AND NET WORTH</h2>

            <table>
                <tbody>
                    <tr>
                        <td style="width: 33%;"></td>
                        <td style="text-align: center; width: 6%;">As of</td>
                        <td class="underline" style="width: 27%;">{{ $asOfDate }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-style: italic; text-align: center;">
                            (Sample additional sheet/s for the declarant)
                        </td>
                    </tr>
                </tbody>
            </table>

            <br />

            <table>
                <tbody>
                    <tr>
                        <td>NAME:</td>
                        <td class="underline" style="width: 12%;">{{ $declarant['familyName'] }}</td>
                        <td class="underline" style="width: 12%;">{{ $declarant['firstName'] }}</td>
                        <td class="underline" style="width: 12%;">{{ $declarant['middleInitial'] }}</td>
                        <td style="width: 12%;"></td>
                        <td>POSITION:</td>
                        <td class="underline" style="width: 30%;">{{ $declarant['position'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 10px; text-align: center;">(Family Name)</td>
                        <td style="font-size: 10px; text-align: center;">(First Name)</td>
                        <td style="font-size: 10px; text-align: center;">(M.I.)</td>
                        <td></td>
                        <td>AGENCY/OFFICE:</td>
                        <td class="underline">{{ $declarant['agencyOffice'] }}</td>
                    </tr>
                </tbody>
            </table>

            <hr />
            <h3 style="text-decoration: underline;">ASSETS, LIABILITIES AND NETWORTH</h3>
            <br />
            <h3 style="text-align: left; margin-top: 0;">1. ASSETS</h3>

            a. Real Properties*
            <table class="bordered">
                <thead>
                    <tr>
                        <th colspan="1">DESCRIPTION</th>
                        <th colspan="1">KIND</th>
                        <th rowspan="2">EXACT LOCATION</th>
                        <th colspan="1">ASSESSED VALUE</th>
                        <th colspan="1">CURRENT FAIR MARKET VALUE</th>
                        <th colspan="2">ACQUISITION</th>
                        <th rowspan="2">ACQUISITION COST</th>
                    </tr>
                    <tr>
                        <th style="font-weight: normal; font-size: 9px;">(e.g. lot, house and lot, condominium, and improvements)</th>
                        <th style="font-weight: normal; font-size: 9px;">(e.g., residential, commercial, industrial, agricultural and mixed used)</th>
                        <th colspan="2" style="font-weight: normal; font-size: 9px;">(As found in the Tax Declaration of Real Property)</th>
                        <th>YEAR</th>
                        <th>MODE</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i=0; $i < 4; $i++)
                        <tr>
                            <td>{{ $declarant['assets']['realProperties'][4*$pageIdx + $i]['description'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['realProperties'][4*$pageIdx + $i]['kind'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['realProperties'][4*$pageIdx + $i]['exactLocation'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['realProperties'][4*$pageIdx + $i]['assessedValue'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['realProperties'][4*$pageIdx + $i]['currentFairMarketValue'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['realProperties'][4*$pageIdx + $i]['acquisitionYear'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['realProperties'][4*$pageIdx + $i]['acquisitionMode'] ?? '' }}</td>
                            <td>
                                {{ isset($declarant['assets']['realProperties'][4*$pageIdx + $i]['acquisitionCost']) && $declarant['assets']['realProperties'][4*$pageIdx + $i]['acquisitionCost'] !== ''
                                    ? 'PHP ' . number_format((float)$declarant['assets']['realProperties'][4*$pageIdx + $i]['acquisitionCost'], 2)
                                    : ''
                                }}
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>

            <table class="totals">
                <tbody>
                    <tr>
                        <td style="width: 50%;"></td>
                        <td style="text-align: right; width: 35%;">Subtotal:</td>
                        <td class="underline" style="width: 15%;">PHP {{ number_format($subtotalReal, 2) }}</td>
                    </tr>
                </tbody>
            </table>
            <br />
            b. Personal Properties*
            <table class="bordered">
                <thead>
                    <tr>
                        <th rowspan="1" style="width: 56%;">DESCRIPTION</th>
                        <th rowspan="1" style="width: 13.25%;">YEAR ACQUIRED</th>
                        <th rowspan="1">ACQUISITION COST/AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i=0; $i < 4; $i++)
                        <tr>
                            <td>{{ $declarant['assets']['personalProperties'][4*$pageIdx + $i]['description'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['personalProperties'][4*$pageIdx + $i]['yearAcquired'] ?? '' }}</td>
                            <td>
                                {{ isset($declarant['assets']['personalProperties'][4*$pageIdx + $i]['acquisitionCost']) && $declarant['assets']['personalProperties'][4*$pageIdx + $i]['acquisitionCost'] !== ''
                                    ? 'PHP ' . number_format((float)$declarant['assets']['personalProperties'][4*$pageIdx + $i]['acquisitionCost'], 2)
                                    : ''
                                }}
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>

            <table class="totals">
                <tbody>
                    <tr>
                        <td style="width: 50%;"></td>
                        <td style="text-align: right; width: 35%;">Subtotal:</td>
                        <td class="underline" style="width: 15%;">PHP {{ number_format($subtotalPersonal, 2) }}</td>
                    </tr>
                    <tr>
                        <td style="width: 50%;"></td>
                        <td style="text-align: right; width: 35%; font-weight: bold;">TOTAL ASSETS (a+b): </td>
                        <td class="underline" style="width: 15%;">PHP {{ number_format($totalAssets, 2) }}</td>
                    </tr>
                </tbody>
            </table>

            <h3 style="text-align: left">2. LIABILITIES*</h3>
            <table class="bordered">
                <thead>
                    <tr>
                        <th rowspan="1" style="width: 42.5%;">NATURE</th>
                        <th rowspan="1" style="width: 37.5%;">NAME OF CREDITORS</th>
                        <th rowspan="1">OUTSTANDING BALANCE</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i=0; $i < 4; $i++)
                        <tr>
                            <td>{{ $declarant['liabilities'][4*$pageIdx + $i]['nature'] ?? '' }}</td>
                            <td>{{ $declarant['liabilities'][4*$pageIdx + $i]['nameOfCreditor'] ?? '' }}</td>
                            <td>
                                {{ isset($declarant['liabilities'][4*$pageIdx + $i]['outstandingBalance']) && $declarant['liabilities'][4*$pageIdx + $i]['outstandingBalance'] !== ''
                                    ? 'PHP ' . number_format((float)$declarant['liabilities'][4*$pageIdx + $i]['outstandingBalance'], 2)
                                    : ''
                                }}
                            </td>
                        </tr>
                    @endfor 
                </tbody>
            </table>
            <table class="totals">
                <tbody>
                    <tr>
                        <td style="width: 50%;"></td>
                        <td style="text-align: right; width: 35%; font-weight: bold;">TOTAL LIABILITIES:</td>
                        <td class="underline" style="width: 15%;">PHP {{ number_format($totalLiabilities, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        
            <hr />
            <h3 style="text-decoration: underline;">BUSINESS INTERESTS AND FINANCIAL CONNECTIONS</h3>

            <table class="bordered">
            <thead>
                <tr>
                    <th rowspan="1" style="width: 27.5%;">NAME OF ENTITY/BUSINESS ENTERPRISE</th>
                    <th rowspan="1" style="width: 32.5%;">BUSINESS ADDRESS</th>
                    <th rowspan="1" style="font-size: 9px; width: 20%;">NATURE OF BUSINESS INTEREST & / OR FINANCIAL CONNECTION</th>
                    <th rowspan="1">DATE OF ACQUISITION OF INTEREST OR CONNECTION</th>
                </tr>
            </thead>
                <tbody>
                    @for ($i=0; $i < 6; $i++)
                        <tr>
                            <td>{{ $declarant['businessInterestsAndFinancialConnections'][6*$pageIdx + $i]['nameOfEntity'] ?? '' }}</td>
                            <td>{{ $declarant['businessInterestsAndFinancialConnections'][6*$pageIdx + $i]['businessAddress'] ?? '' }}</td>
                            <td>{{ $declarant['businessInterestsAndFinancialConnections'][6*$pageIdx + $i]['natureOfInterestOrConnection'] ?? '' }}</td>
                            <td>{{ $declarant['businessInterestsAndFinancialConnections'][6*$pageIdx + $i]['dateOfAcquisition'] ?? '' }}</td>
                        </tr>
                    @endfor
            </tbody>
            </table>
            
            <br />
        </div>
    @endfor
    
    @php
        $noSpouseChildAdditionals = [
            ceil(count($declarant['assets']['spouseChildRealProperties']) / 4) - 1,
            ceil(count($declarant['assets']['spouseChildPersonalProperties']) / 4) - 1,
            ceil(count($declarant['spouseChildLiabilities']) / 4) - 1,
            ceil(count($declarant['spouseChildBusinessInterestsAndFinancialConnections']) / 6) - 1,
        ];

        $noSpouseChildAdditional = max($noSpouseChildAdditionals);

        $isSpouseChildRealPropertiesEmpty = collect($declarant['assets']['spouseChildRealProperties'])->every(function ($item) {
            return collect($item)->every(fn($v) => trim($v) === '');
        });

        $isSpouseChildPersonalPropertiesEmpty = collect($declarant['assets']['spouseChildPersonalProperties'])->every(function ($item) {
            return collect($item)->every(fn($v) => trim($v) === '');
        });

        $isSpouseChildLiabilitiesEmpty = collect($declarant['spouseChildLiabilities'])->every(function ($item) {
            return collect($item)->every(fn($v) => trim($v) === '');
        });

        $isSpouseChildBusinessInterests = collect($declarant['spouseChildBusinessInterestsAndFinancialConnections'])->every(function ($item) {
            return collect($item)->every(fn($v) => trim($v) === '');
        });
    @endphp
    
    @if (
        !$isSpouseChildRealPropertiesEmpty ||
        !$isSpouseChildPersonalPropertiesEmpty ||
        !$isSpouseChildLiabilitiesEmpty ||
        !$isSpouseChildBusinessInterests
    )
    @for ($pageIdx=0; $pageIdx <= $noSpouseChildAdditional; $pageIdx++)
        <div class="additional-spouse">
            <table class="header-note">
                <tr>
                    <td style="width: 100%;"></td>
                    <td>
                        Revised as of January 2015
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Per CSC Resolution No. 1500088</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Promulgated on January 23, 2015</td>
                </tr>
            </table>

            <h2>SWORN STATEMENT OF ASSETS, LIABILITIES AND NET WORTH</h2>

            <table>
                <tbody>
                    <tr>
                        <td style="width: 33%;"></td>
                        <td style="text-align: center; width: 6%;">As of</td>
                        <td class="underline" style="width: 27%;">{{ $asOfDate }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-style: italic; text-align: center;">
                            (Sample additional sheet/s for the exclusive properties of the declarant's spouse and unmarried children
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-size: 10px; font-style: italic; text-align: center;">
                            below eighteen (18) years of age living in declarant's household)
                        </td>
                    </tr>
                </tbody>
            </table>

            <br />

            <table>
                <tbody>
                    <tr>
                        <td>NAME:</td>
                        <td class="underline" style="width: 12%;">{{ $declarant['familyName'] }}</td>
                        <td class="underline" style="width: 12%;">{{ $declarant['firstName'] }}</td>
                        <td class="underline" style="width: 12%;">{{ $declarant['middleInitial'] }}</td>
                        <td style="width: 12%;"></td>
                        <td>POSITION:</td>
                        <td class="underline" style="width: 30%;">{{ $declarant['position'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 10px; text-align: center;">(Family Name)</td>
                        <td style="font-size: 10px; text-align: center;">(First Name)</td>
                        <td style="font-size: 10px; text-align: center;">(M.I.)</td>
                        <td></td>
                        <td>AGENCY/OFFICE:</td>
                        <td class="underline">{{ $declarant['agencyOffice'] }}</td>
                    </tr>
                </tbody>
            </table>

            <hr />
            <h3 style="text-decoration: underline;">ASSETS, LIABILITIES AND NETWORTH</h3>
            <br />
            <h3 style="text-align: left; margin-top: 0;">1. ASSETS</h3>

            a. Real Properties*
            <table class="bordered">
                <thead>
                    <tr>
                        <th colspan="1">DESCRIPTION</th>
                        <th colspan="1">KIND</th>
                        <th rowspan="2">EXACT LOCATION</th>
                        <th colspan="1">ASSESSED VALUE</th>
                        <th colspan="1">CURRENT FAIR MARKET VALUE</th>
                        <th colspan="2">ACQUISITION</th>
                        <th rowspan="2">ACQUISITION COST</th>
                    </tr>
                    <tr>
                        <th style="font-weight: normal; font-size: 9px;">(e.g. lot, house and lot, condominium, and improvements)</th>
                        <th style="font-weight: normal; font-size: 9px;">(e.g., residential, commercial, industrial, agricultural and mixed used)</th>
                        <th colspan="2" style="font-weight: normal; font-size: 9px;">(As found in the Tax Declaration of Real Property)</th>
                        <th>YEAR</th>
                        <th>MODE</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i=0; $i < 4; $i++)
                        <tr>
                            <td>{{ $declarant['assets']['spouseChildRealProperties'][4*$pageIdx + $i]['description'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['spouseChildRealProperties'][4*$pageIdx + $i]['kind'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['spouseChildRealProperties'][4*$pageIdx + $i]['exactLocation'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['spouseChildRealProperties'][4*$pageIdx + $i]['assessedValue'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['spouseChildRealProperties'][4*$pageIdx + $i]['currentFairMarketValue'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['spouseChildRealProperties'][4*$pageIdx + $i]['acquisitionYear'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['spouseChildRealProperties'][4*$pageIdx + $i]['acquisitionMode'] ?? '' }}</td>
                            <td>
                                {{ isset($declarant['assets']['spouseChildRealProperties'][4*$pageIdx + $i]['acquisitionCost']) && $declarant['assets']['spouseChildRealProperties'][4*$pageIdx + $i]['acquisitionCost'] !== ''
                                    ? 'PHP ' . number_format((float)$declarant['assets']['spouseChildRealProperties'][4*$pageIdx + $i]['acquisitionCost'], 2)
                                    : ''
                                }}
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
            <br />
            b. Personal Properties*
            <table class="bordered">
                <thead>
                    <tr>
                        <th rowspan="1" style="width: 56%;">DESCRIPTION</th>
                        <th rowspan="1" style="width: 13.25%;">YEAR ACQUIRED</th>
                        <th rowspan="1">ACQUISITION COST/AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i=0; $i < 4; $i++)
                        <tr>
                            <td>{{ $declarant['assets']['spouseChildPersonalProperties'][4*$pageIdx + $i]['description'] ?? '' }}</td>
                            <td>{{ $declarant['assets']['spouseChildPersonalProperties'][4*$pageIdx + $i]['yearAcquired'] ?? '' }}</td>
                            <td>
                                {{ isset($declarant['assets']['spouseChildPersonalProperties'][4*$pageIdx + $i]['acquisitionCost']) && $declarant['assets']['spouseChildPersonalProperties'][4*$pageIdx + $i]['acquisitionCost'] !== ''
                                    ? 'PHP ' . number_format((float)$declarant['assets']['spouseChildPersonalProperties'][4*$pageIdx + $i]['acquisitionCost'], 2)
                                    : ''
                                }}
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>

            <h3 style="text-align: left">2. LIABILITIES*</h3>
            <table class="bordered">
                <thead>
                    <tr>
                        <th rowspan="1" style="width: 42.5%;">NATURE</th>
                        <th rowspan="1" style="width: 37.5%;">NAME OF CREDITORS</th>
                        <th rowspan="1">OUTSTANDING BALANCE</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i=0; $i < 4; $i++)
                        <tr>
                        <td>{{ $declarant['spouseChildLiabilities'][4*$pageIdx + $i]['nature'] ?? '' }}</td>
                        <td>{{ $declarant['spouseChildLiabilities'][4*$pageIdx + $i]['nameOfCreditor'] ?? '' }}</td>
                        <td>
                            {{ isset($declarant['spouseChildLiabilities'][4*$pageIdx + $i]['outstandingBalance']) && $declarant['spouseChildLiabilities'][4*$pageIdx + $i]['outstandingBalance'] !== ''
                                ? 'PHP ' . number_format((float)$declarant['spouseChildLiabilities'][4*$pageIdx + $i]['outstandingBalance'], 2)
                                : ''
                            }}
                        </td>
                        </tr>
                    @endfor 
                </tbody>
            </table>
            
            <hr />
            <h3 style="text-decoration: underline;">BUSINESS INTERESTS AND FINANCIAL CONNECTIONS</h3>

            <table class="bordered">
            <thead>
                <tr>
                    <th rowspan="1" style="width: 27.5%;">NAME OF ENTITY/BUSINESS ENTERPRISE</th>
                    <th rowspan="1" style="width: 32.5%;">BUSINESS ADDRESS</th>
                    <th rowspan="1" style="font-size: 9px; width: 20%;">NATURE OF BUSINESS INTEREST & / OR FINANCIAL CONNECTION</th>
                    <th rowspan="1">DATE OF ACQUISITION OF INTEREST OR CONNECTION</th>
                </tr>
            </thead>
                <tbody>
                    @for ($i=0; $i < 6; $i++)
                        <tr>
                            <td>{{ $declarant['spouseChildBusinessInterestsAndFinancialConnections'][6*$pageIdx + $i]['nameOfEntity'] ?? '' }}</td>
                            <td>{{ $declarant['spouseChildBusinessInterestsAndFinancialConnections'][6*$pageIdx + $i]['businessAddress'] ?? '' }}</td>
                            <td>{{ $declarant['spouseChildBusinessInterestsAndFinancialConnections'][6*$pageIdx + $i]['natureOfInterestOrConnection'] ?? '' }}</td>
                            <td>{{ $declarant['spouseChildBusinessInterestsAndFinancialConnections'][6*$pageIdx + $i]['dateOfAcquisition'] ?? '' }}</td>
                        </tr>
                    @endfor
            </tbody>
            </table>
        </div>
    @endfor
    @endif
    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script('
                $text = __("Page :pageNum of :pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
                $font = $fontMetrics->getFont("Helvetica", "italic");;
                $size = 9;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
 
                // Compute text width to center correctly
                $textWidth = $fontMetrics->getTextWidth($text, $font, $size);
 
                $x = ($pdf->get_width() - $textWidth) / 2;
                $y = $pdf->get_height() - 36;
 
                $pdf->text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            ');
        }
    </script>
</body>

</html>

