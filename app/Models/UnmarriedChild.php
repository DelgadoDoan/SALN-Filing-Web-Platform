<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnmarriedChild extends Model
{
    protected $fillable = [
        'saln_id',
        'name',
        'date_of_birth',
    ];

    public function saln()
    {
        return $this->belongsTo(SALN::class);
    }
}
