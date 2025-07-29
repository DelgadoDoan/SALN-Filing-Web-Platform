<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpouseChildPersonalProperty extends Model
{
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
