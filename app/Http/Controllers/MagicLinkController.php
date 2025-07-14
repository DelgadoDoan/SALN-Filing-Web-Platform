<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Mail\MagicLinkMail;
use Illuminate\Support\Str;
use App\Models\MagicToken;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class MagicLinkController extends Controller
{
    public function showSignup() {
        if (Auth::check()) {
            return redirect('/home');
        }

        return view('signup');
    }

    public function showLogin() {
        if (Auth::check()) {
            return redirect('/home');
        }

        return view('login');
    }

    public function signup(SignupRequest $request) {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (empty($user)) {
            $newUser = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
            ]);

            $magicToken = MagicToken::create([
                'user_id' => $newUser->id,
                'token' => Str::uuid()->toString(),
            ]);

            $randomStr = Str::random(30);

            Mail::to($newUser->email)->send(new MagicLinkMail($magicToken, $randomStr));

            $encrypted = Crypt::encryptString($newUser->email);

            return redirect()->route('linksent', ['email' => $encrypted]);
        }

        return redirect()->back();
    }

    public function login(LoginRequest $request) {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!empty($user)) {
            // prevent login spam
            $recentToken = MagicToken::where('created_at', '>=', Carbon::now()->subMinutes(5))
                ->where('user_id', '=', $user->id)
                ->whereNull('used_at')
                ->first();
            
            if (!empty($recentToken)) {
                return redirect()
                    ->back()
                    ->with('error', 'Too many login attempts. Please try again in 5 minutes.')
                    ->withInput();
            }

            $magicToken = MagicToken::create([
                'user_id' => $user->id,
                'token' => Str::uuid()->toString(),
            ]);

            $randomStr = Str::random(30);

            Mail::to($user->email)->send(new MagicLinkMail($magicToken, $randomStr));

            $encrypted = Crypt::encryptString($user->email);

            return redirect()->route('linksent', ['email' => $encrypted]);
        }

        return redirect()->back();
    }

    public function onSuccess(string $encryptedEmail) {
        $decrypted = Crypt::decryptString($encryptedEmail);

        return view('linksent', ['email' => $decrypted]);
    }

    public function authenticate(MagicToken $magicToken, string $randomStr) {
        // if link is not clicked within 30 min or already used
        if ($magicToken->created_at <= Carbon::now()->subMinutes(30) || !is_null($magicToken->used_at))
            abort(403);

        $magicToken->update([
            'used_at' => Carbon::now()
        ]);

        Auth::login($magicToken->user);

        return redirect('/home');
    }
}
