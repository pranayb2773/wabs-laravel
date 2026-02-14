<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use Illuminate\View\View;
use Livewire\Component;

final class Dashboard extends Component
{
    public function render(): View
    {
        return view('livewire.admin.dashboard')
            ->layout('layouts.admin')
            ->title('Dashboard');
    }
}
