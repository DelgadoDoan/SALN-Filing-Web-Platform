<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessInterest extends Model
{
    use HasFactory;

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