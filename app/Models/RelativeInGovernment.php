<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RelativeInGovernment extends Model
{
    use HasFactory;

    protected $fillable = [
        'saln_id',
        'relative_family_name',
        'relative_first_name',
        'relative_mi',
        'relationship',
        'position',
        'name_agency',
    ];

    public function saln()
    {
        return $this->belongsTo(Saln::class);
    }
}