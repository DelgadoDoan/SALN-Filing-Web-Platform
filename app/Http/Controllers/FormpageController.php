<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\FormDataRequest;
use App\Models\User;

class FormpageController extends Controller
{
    public function isLoggedIn(Request $request) {
        // check if user is logged in
        if (!Auth::check()) {
            Cookie::expire('user');
            
            return redirect('/login');
        }

        // check if cookie exists        
        $cookie = $request->cookie('user');
        
        if (!$cookie) {
            Auth::logout();

            return redirect('/login');
        }

        return view('home');
    }

    public function logout() {
        Cookie::expire('user');

        Auth::logout();

        return redirect('/login');
    }

    public function deleteAccount () {
        $user = Auth::user();

        $user = User::where('email', $user->email)->delete();

        Cookie::expire('user');

        Auth::logout();
    }

    public function saveToDatabase(FormDataRequest $request) {
        $validated = $request->validated();
    }
}
