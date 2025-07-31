<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagicLinkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormpageController;
use App\Http\Controllers\PDFController;

use Illuminate\Support\Facades\Cookie;

if (App::environment('staging')) {
    URL::forceScheme('https');
}

Route::get('/', [FormpageController::class, 'isLoggedIn']);

Route::get('/signup', [MagicLinkController::class, 'showSignup'])->name('signup');

Route::get('/login', [MagicLinkController::class, 'showLogin'])->name('login');

Route::post('/login/magic-link', [MagicLinkController::class, 'login'])->name('magic-link.login');

Route::post('/signup/magic-link', [MagicLinkController::class, 'signup'])->name('magic-link.signup');

Route::get('/magic-link/{magicToken}/{randomStr}', [MagicLinkController::class, 'authenticate'])->name('magic-link.authenticate');

Route::get('/home/logout', [FormpageController::class, 'logout']);

Route::get('/home/delete-account', [FormpageController::class, 'deleteAccount']);

Route::get('/link-sent/{email}', [MagicLinkController::class, 'onSuccess'])->name('linksent');

Route::post('/save-saln', [FormpageController::class, 'saveToDatabase'])->name('saln.save');

Route::post('/home/import-json', [FormpageController::class, 'importJson'])->name('saln.import');

Route::get('/home/export-json', [FormpageController::class, 'exportJson'])->name('saln.export');

Route::get('/get-regions', [FormpageController::class, 'getRegions'])->name('regions');

Route::get('/home/generate-pdf', [PDFController::class, 'generatePDF'])->name('saln.pdf');

Route::middleware(['prevent-back'])->group(function() {
    Route::get('/home', [FormpageController::class, 'isLoggedIn']);
});