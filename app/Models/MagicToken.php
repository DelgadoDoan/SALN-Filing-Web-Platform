<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MagicToken extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function getToken() {
        return 'token';
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
