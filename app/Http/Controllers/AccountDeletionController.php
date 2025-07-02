<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class AccountDeletionController extends Controller
{
    public function deleteAccount () {
        $user = Auth::user();

        $user = User::where('email', $user->email)->delete();

        Cookie::expire('user');

        Auth::logout();
    }
}
