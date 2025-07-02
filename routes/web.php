<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagicLinkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountDeletionController;
use App\Http\Controllers\FormpageController;

use Illuminate\Support\Facades\Cookie;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/home', [FormpageController::class, 'isLoggedIn']);

Route::post('/login/magic-link', [MagicLinkController::class, 'login'])->name('magic-link.login');

Route::post('/signup/magic-link', [MagicLinkController::class, 'signup'])->name('magic-link.signup');

Route::get('/magic-link/{magicToken}', [MagicLinkController::class, 'authenticate'])->name('magic-link.authenticate');

Route::get('/home/logout', [FormpageController::class, 'logout']);

Route::get('/home/delete-account', [AccountDeletionController::class, 'deleteAccount']);