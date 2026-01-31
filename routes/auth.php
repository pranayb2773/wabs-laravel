<?php

declare(strict_types=1);

use App\Actions\LogoutAction;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::livewire('/login', 'auth.login')
        ->name('login');

    Route::livewire('/register', 'auth.register')
        ->name('register');

    Route::livewire('/forgot-password', 'auth.forgot-password')
        ->name('password.request');

    Route::livewire('/reset-password/{token}', 'auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::livewire('verify-email', 'auth.verify-email')
        ->name('verification.notice');
});

Route::livewire('verify-email/{id}/{hash}', 'auth.verify-email-link')
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('logout', [LogoutAction::class, 'handle'])
    ->name('logout');
