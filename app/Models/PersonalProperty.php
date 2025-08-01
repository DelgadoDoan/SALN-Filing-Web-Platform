<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'saln_id',
        'description',
        'year_acquired',
        'acquisition_cost',
    ];

    public function saln()
    {
        return $this->belongsTo(Saln::class);
    }
}