<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::prefix('client')->name('client')->middleware("guest:web")->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('Login');
    Route::post('/login_process', [LoginController::class, 'login'])->name('LoginAttempt'); 
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('Register');
    Route::post('/register_process', [RegisterController::class, 'register'])->name('RegisterAttempt');
    
});

Route::prefix('client')->name('client')->middleware("auth:web")->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('Logout');
});