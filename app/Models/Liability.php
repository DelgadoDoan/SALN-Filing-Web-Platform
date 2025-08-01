<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Liability extends Model
{
    use HasFactory;

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