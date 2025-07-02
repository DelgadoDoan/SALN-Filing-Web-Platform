<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MagicToken extends Model
{
    protected $guarded = ['id'];
    
    public function getToken() {
        return 'token';
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
