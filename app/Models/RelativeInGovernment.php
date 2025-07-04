<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelativeInGovernment extends Model
{
    protected $fillable = [
        'saln_id',
        'name_relative',
        'relationship',
        'position',
        'name_agency',
    ];

    public function saln()
    {
        return $this->belongsTo(Saln::class);
    }
}
