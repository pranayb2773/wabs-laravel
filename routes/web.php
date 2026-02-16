<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/features', function () {
    return view('features');
})->name('features');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::livewire('/supported-broker', 'guest.broker-support')->name('supported-broker');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::livewire('/dashboard', 'app.dashboard')
        ->name('dashboard');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
