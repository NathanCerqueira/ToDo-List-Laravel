<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::view('/', 'pages.auth.login')->name('app.login');
Route::view('/create-account', 'pages.auth.createAccount')->name('app.createAccount');

Route::controller(AuthController::class)->group(function() {
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/create-account', 'createAccount')->name('auth.createAccount');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::middleware('auth')->group(function() {
    Route::view('/dashboard', 'pages.dashboard')->name('app.dashboard');
});
