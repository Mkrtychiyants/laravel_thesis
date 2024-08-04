<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LoginController;

Route::prefix('admin')->name('admin')->middleware("guest:web")->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('Login');
    Route::post('/login_process', [LoginController::class, 'login'])->name('LoginAttempt'); 
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('Register');
    Route::post('/register_process', [RegisterController::class, 'register'])->name('RegisterAttempt');
    
});

Route::prefix('admin')->name('admin')->middleware("auth:admin")->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('Logout');
});