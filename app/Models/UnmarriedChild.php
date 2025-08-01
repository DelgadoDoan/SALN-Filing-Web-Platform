<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnmarriedChild extends Model
{
    use HasFactory;

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