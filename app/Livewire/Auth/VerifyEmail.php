<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Actions\LogoutAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Livewire\Component;

final class VerifyEmail extends Component
{
    public function sendVerification(): void
    {
        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    public function logout(LogoutAction $logoutAction): void
    {
        $logoutAction->handle();
    }

    public function rendering(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(
                Auth::user()->isAdmin() ? route('admin.dashboard') : route('dashboard'),
                navigate: true
            );

            return;
        }
    }

    public function render(): View
    {
        return view('livewire.auth.verify-email')
            ->layout('layouts.auth')
            ->title('Verify Email');
    }
}
