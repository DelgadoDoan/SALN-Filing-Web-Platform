<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagicLinkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormpageController;

use Illuminate\Support\Facades\Cookie;

if (App::environment('staging')) {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::post('/login/magic-link', [MagicLinkController::class, 'login'])->name('magic-link.login');

Route::post('/signup/magic-link', [MagicLinkController::class, 'signup'])->name('magic-link.signup');

Route::get('/magic-link/{magicToken}/{randomStr}', [MagicLinkController::class, 'authenticate'])->name('magic-link.authenticate');

Route::get('/home/logout', [FormpageController::class, 'logout']);

Route::get('/home/delete-account', [FormpageController::class, 'deleteAccount']);

Route::get('/link-sent/{email}', [MagicLinkController::class, 'onSuccess'])->name('linksent');

Route::post('/save-saln', [FormpageController::class, 'saveToDatabase'])->name('saln.save');

Route::middleware(['prevent-back'])->group(function() {
    Route::get('/home', [FormpageController::class, 'isLoggedIn']);
});

Route::post('/home/import-json', [FormpageController::class, 'importJson']);