<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;

Route::get('/', function () {
    return view('welcome');
});

// Group backend routes
Route::prefix('backend')->group(function () {

    // Login routes
    Route::get('login', [LoginController::class, 'loginBackend'])->name('backend.login.form');
    Route::post('login', [LoginController::class, 'authenticateBackend'])->name('backend.login.authenticate');
    Route::post('logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');

    // Protected backend routes
    Route::middleware('auth')->group(function () {
        Route::get('beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda');
    });

});
