<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\StoreLoginController;
use App\Http\Controllers\Auth\StoreRegistrationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Member\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');

Route::middleware('guest')->group(function (): void {
    Route::get('/login', LoginController::class)->name('login');
    Route::post('/login', StoreLoginController::class)->name('login.post');
    Route::get('/register', RegisterController::class)->name('register');
    Route::post('/register', StoreRegistrationController::class)->name('register.post');
});

Route::middleware('auth')->group(function (): void {
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::get('/dashboard', Dashboard::class)->name('member.dashboard');
});
