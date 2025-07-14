<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SALN extends Model
{
    protected $table = 'salns';
    protected $fillable = [
        'user_id',
        'session_id',
        'asof_date',
        'filing_type',
        'declarant_family_name',
        'declarant_first_name',
        'declarant_mi',
        'declarant_house_number',
        'declarant_house_street',
        'declarant_house_subdivision',
        'declarant_house_barangay',
        'declarant_house_city',
        'declarant_house_region',
        'declarant_house_zip',
        'declarant_office_name',
        'declarant_office_street',
        'declarant_office_city',
        'declarant_office_region',
        'declarant_office_zip',
        'spouse_family_name',
        'spouse_first_name',
        'spouse_mi',
        'spouse_house_number',
        'spouse_house_street',
        'spouse_house_subdivision',
        'spouse_house_barangay',
        'spouse_house_city',
        'spouse_house_region',
        'spouse_house_zip',
        'spouse_office_name',
        'spouse_office_street',
        'spouse_office_city',
        'spouse_office_region',
        'spouse_office_zip',
        'real_properties',
        'personal_assets',
        // 'liabilities',
        'business_interests',
        'relatives_in_government',
        'subtotal_real',
        'subtotal_personal',
        'total_assets',
        'subtotal_liabilities',
        'net_worth',
        'cert_date',
        'gov_id_declarant',
        'id_no_declarant',
        'id_date_declarant',
        'gov_id_spouse',
        'id_no_spouse',
        'id_date_spouse',
        'no_business_interest',
        'no_relatives_in_government',
        'is_completed',
    ];

    protected $casts = [
        'asof_date' => 'date',
        'cert_date' => 'date',
        'id_date_declarant' => 'date',
        'id_date_spouse' => 'date',
        'real_properties' => 'array',
        'personal_assets' => 'array',
        // 'liabilities' => 'array',
        'business_interests' => 'array',
        'relatives_in_government' => 'array',
        'subtotal_real' => 'decimal:2',
        'subtotal_personal' => 'decimal:2',
        'total_assets' => 'decimal:2',
        'subtotal_liabilities' => 'decimal:2',
        'net_worth' => 'decimal:2',
        'no_business_interest' => 'boolean',
        'no_relatives_in_government' => 'boolean',
        'is_completed' => 'boolean',
    ];
    public function unmarriedChildren()
    {
        return $this->hasMany(UnmarriedChild::class, 'saln_id');
    }
    public function spouses()
    {
        return $this->hasMany(Spouse::class, 'saln_id');
    }
    public function realProperties()
    {
        return $this->hasMany(RealProperty::class, 'saln_id');
    }
    public function personalProperties()
    {
        return $this->hasMany(PersonalProperty::class, 'saln_id');
    }
    public function liabilities()
    {
        return $this->hasMany(Liability::class, 'saln_id');
    }
    public function businessInterests()
    {
        return $this->hasMany(BusinessInterest::class, 'saln_id');
    }
    public function relativesInGovernment()
    {
        return $this->hasMany(RelativeInGovernment::class, 'saln_id');
    }

}