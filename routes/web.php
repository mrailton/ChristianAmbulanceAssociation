<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProcessForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\StoreLoginController;
use App\Http\Controllers\Auth\StoreRegistrationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Member\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');

Route::get('/reset-password', ResetPasswordController::class)->name('password.reset');
Route::post('/reset-password', ResetPasswordController::class)->name('password.store');

Route::middleware('guest')->group(function (): void {
    Route::get('/login', LoginController::class)->name('login');
    Route::post('/login', StoreLoginController::class)->name('login.post');
    Route::get('/register', RegisterController::class)->name('register');
    Route::post('/register', StoreRegistrationController::class)->name('register.post');

    Route::get('/forgot-password', ForgotPasswordController::class)->name('forgot-password');
    Route::post('/forgot-password', ProcessForgotPasswordController::class)->name('forgot-password.post');
});

Route::middleware('auth')->group(function (): void {
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::get('/dashboard', Dashboard::class)->name('member.dashboard');
});
