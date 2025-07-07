<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'filingType' => 'required|string',
            'asOfDate' => 'required|date',

            //declarant
            'declarant.familyName' => 'required|string|max:255',
            'declarant.firstName' => 'required|string|max:255',
            'declarant.middleInitial' => 'nullable|string|max:1', // Middle initial can be optional
            'declarant.position' => 'required|string|max:255',
            'declarant.agencyOffice' => 'required|string|max:255',

            'declarant.officeAddress' => 'required|array', 
            'declarant.officeAddress.officeNo' => 'required|string|max:10',
            'declarant.officeAddress.officeStreet' => 'required|string|max:255',
            'declarant.officeAddress.officeCity' => 'required|string|max:255',
            'declarant.officeAddress.officeRegion' => 'required|string|max:255',
            'declarant.officeAddress.officeZipCode' => 'required|string|max:10',

            'declarant.houseAddress' => 'required|array', 
            'declarant.houseAddress.houseNo' => 'required|string|max:50',
            'declarant.houseAddress.houseStreet' => 'required|string|max:255',
            'declarant.houseAddress.houseSubdivision' => 'nullable|string|max:255',
            'declarant.houseAddress.houseBarangay' => 'required|string|max:255',
            'declarant.houseAddress.houseCity' => 'required|string|max:255',
            'declarant.houseAddress.houseRegion' => 'required|string|max:255',
            'declarant.houseAddress.houseZipCode' => 'required|string|max:10',

            'declarant.governmentIssuedId' => 'required|array', 
            'declarant.governmentIssuedId.type' => 'required|string|max:100',
            'declarant.governmentIssuedId.idNumber' => 'required|string|max:255',
            'declarant.governmentIssuedId.dateIssued' => 'required|date',

            // spouse
            'spouses' => 'required|array',
            'spouses.*.familyName' => 'required|string|max:255',
            'spouses.*.firstName' => 'required|string|max:255',
            'spouses.*.middleInitial' => 'nullable|string|max:1', // Middle initial can be optional
            'spouses.*.position' => 'required|string|max:255',
            'spouses.*.agencyOffice' => 'required|string|max:255',

            'spouses.officeAddress' => 'required|array', 
            'spouses.officeAddress.officeNo' => 'required|string|max:10',
            'spouses.officeAddress.officeStreet' => 'required|string|max:255',
            'spouses.officeAddress.officeCity' => 'required|string|max:255',
            'spouses.officeAddress.officeRegion' => 'required|string|max:255',
            'spouses.officeAddress.officeZipCode' => 'required|string|max:10',

            'spouses.governmentIssuedId' => 'required|array', 
            'spouses.governmentIssuedId.type' => 'required|string|max:100',
            'spouses.governmentIssuedId.idNumber' => 'required|string|max:255',
            'spouses.governmentIssuedId.dateIssued' => 'required|date',

            // unmarried children
            'unmarriedChildren' => 'nullable|array',
            'unmarriedChildren.*.name' => 'nullable|string|max:255',
            'unmarriedChildren.*.dateOfBirth' => 'nullable|date',

            // assets
            'assets' => 'required|array', 
            'assets.realProperties' => 'required|array', 
            'assets.realProperties.*.description' => 'required|string|max:255',
            'assets.realProperties.*.kind' => 'required|string|max:100',
            'assets.realProperties.*.exactLocation' => 'required|string|max:255',
            'assets.realProperties.*.assessedValue' => 'required|numeric|min:0', 
            'assets.realProperties.*.currentFairMarketValue' => 'required|numeric|min:0',
            'assets.realProperties.*.acquisitionYear' => 'required|integer|min:1800|max:' . (date('Y') + 1), 
            'assets.realProperties.*.acquisitionMode' => 'required|string|max:100',
            'assets.realProperties.*.acquisitionCost' => 'required|numeric|min:0',

            'assets.personalProperties' => 'required|array', 
            'assets.personalProperties.*.description' => 'required|string|max:255',
            'assets.personalProperties.*.yearAcquired' => 'required|integer|min:1800|max:' . (date('Y') + 1),
            'assets.personalProperties.*.acquisitionCost' => 'required|numeric|min:0',

            'assets.totalAssets' => 'required|numeric|min:0',

            // liabilities
            'liabilities' => 'required|array', 
            'liabilities.*.nature' => 'required|string|max:255',
            'liabilities.*.nameOfCreditors' => 'required|string|max:255',
            'liabilities.*.outstandingBalance' => 'required|numeric|min:0',

            // business
            'hasBusinessInterests' => 'required|bolean',
            'businessInterestsAndFinancialConnections' => 'array|required_if:hasBusinessInterests,true|min_if:hasBusinessInterests,true,1',
            'businessInterestsAndFinancialConnections.*.nameOfEntity' => 'required_if:hasBusinessInterests,true|string|max:255',
            'businessInterestsAndFinancialConnections.*.businessAddress' => 'required_if:hasBusinessInterests,true|string|max:255',
            'businessInterestsAndFinancialConnections.*.natureOfInterestOrConnection' => 'required_if:hasBusinessInterests,true|string|max:255',
            'businessInterestsAndFinancialConnections.*.dateOfAcquisition' => 'required_if:hasBusinessInterests,true|date', 

            // relatives in goverment
            'hasRelativesInGovermentService' => 'required|boolean',
            'relativesInGovernmentService' => 'array|required_if:hasRelativesInGovermentService,true|min_if:hasRelativesInGovermentService,true,1',
            'relativesInGovernmentService.*.familyName' => 'required_if:hasRelativesInGovermentService,true|string|max:255',
            'relativesInGovernmentService.*.firstName' => 'required_if:hasRelativesInGovermentService,true|string|max:255',
            'relativesInGovernmentService.*.middleInitial' => 'nullable|string|max:1',
            'relativesInGovernmentService.*.relationship' => 'required_if:hasRelativesInGovermentService,true|string|max:100',
            'relativesInGovernmentService.*.position' => 'required_if:hasRelativesInGovermentService,true|string|max:255',
            'relativesInGovernmentService.*.agencyOfficeAndAddress' => 'required_if:hasRelativesInGovermentService,true|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'asOfDate.required' => 'This field is required',
        ];
    }
}
