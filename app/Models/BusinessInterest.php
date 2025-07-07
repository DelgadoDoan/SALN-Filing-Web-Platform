<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessInterest extends Model
{
    protected $fillable = [
        'saln_id',
        'name_business',
        'address_business',
        'nature_business',
        'date_interest',
    ];

    public function saln()
    {
        return $this->belongsTo(Saln::class);
    }
}