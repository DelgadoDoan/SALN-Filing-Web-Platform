<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpouseChildLiability extends Model
{
    protected $fillable = [
        'saln_id',
        'nature',
        'name_creditor',
        'outstanding_balance',
    ];

    public function saln()
    {
        return $this->belongsTo(Saln::class);
    }
}
