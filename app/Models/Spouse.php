<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    protected $fillable = [
        'saln_id',
        'family_name',
        'first_name',
        'mi',
        'same_house_as_declarant',
        'house_number',
        'house_street',
        'house_subdivision',
        'house_barangay',
        'house_city',
        'house_region',
        'house_zip',
        'position',
        'office_name',
        'office_number',
        'office_street',
        'office_city',
        'office_region',
        'office_zip',
        'gov_id',
        'id_no',
        'id_date',
    ];

    protected $casts = [
        'id_date' => 'date',
    ];

    public function saln()
    {
        return $this->belongsTo(SALN::class);
    }
}