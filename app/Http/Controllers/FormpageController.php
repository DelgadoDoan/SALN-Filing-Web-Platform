<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class FormpageController extends Controller
{
    public function isLoggedIn(Request $request) {
        // check if cookie exists        
        $cookie = $request->cookie('user');
        
        if (!$cookie) {
            Auth::logout();

            return redirect()->to('login');
        }

        return view('home');
    }

    public function logout() {
        Cookie::expire('user');

        Auth::logout();

        return redirect()->to('login');
    }
}
