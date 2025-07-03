<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
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

            Mail::to($newUser->email)->send(new MagicLinkMail($magicToken));

            $encrypted = Crypt::encryptString($newUser->email);

            return redirect()->route('linksent', ['email' => $encrypted]);
        }

        return redirect()->back();
    }

    public function login(LoginRequest $request) {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!empty($user)) {
            $magicToken = MagicToken::create([
                'user_id' => $user->id,
                'token' => Str::uuid()->toString(),
            ]);

            Mail::to($user->email)->send(new MagicLinkMail($magicToken));

            $encrypted = Crypt::encryptString($user->email);

            return redirect()->route('linksent', ['email' => $encrypted]);
        }

        return redirect->back();
    }

    public function onSuccess(string $encryptedEmail) {
        $decrypted = Crypt::decryptString($encryptedEmail);

        return view('linksent', ['email' => $decrypted]);
    }

    public function authenticate(MagicToken $magicToken) {
        // if link is not clicked within 30 min or already used
        if ($magicToken->created_at <= Carbon::now()->subMinutes(30) || !is_null($magicToken->used_at))
            abort(403);

        $magicToken->update([
            'used_at' => Carbon::now()
        ]);

        Auth::login($magicToken->user);

        Cookie::queue('user', $magicToken->user, 120); // cookie lifetime set to 120 minutes

        return redirect('/home');
    }
}
