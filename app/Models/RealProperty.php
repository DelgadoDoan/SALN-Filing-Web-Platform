<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RealProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'saln_id',
        'description',
        'kind',
        'location',
        'assessed_value',
        'market_value',
        'acquisition_year',
        'acquisition_mode',
        'acquisition_cost',
    ];

    public function saln()
    {
        return $this->belongsTo(Saln::class);
    }
}