<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalProperty extends Model
{
    protected $fillable = [
        'saln_id',
        'personal_description',
        'personal_year_acquired',
        'personal_acquisition_cost',
    ];

    public function saln()
    {
        return $this->belongsTo(Saln::class);
    }
}