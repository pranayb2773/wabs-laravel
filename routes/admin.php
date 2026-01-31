<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::livewire('/admin/dashboard', 'admin.dashboard')
        ->name('admin.dashboard');
});
