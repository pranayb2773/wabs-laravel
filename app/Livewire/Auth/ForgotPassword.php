<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;

final class ForgotPassword extends Component
{
    public string $email = '';

    public function sendPasswordResetLink(): void
    {
        $this->validate();

        $user = Auth::getProvider()->retrieveByCredentials(['email' => $this->email]);

        if (! $user) {
            throw ValidationException::withMessages([
                'email' => __('passwords.user'),
            ]);
        }

        Password::sendResetLink($this->only('email'));

        Session::flash('status', __('passwords.sent'));
    }

    public function render(): View
    {
        return view('livewire.auth.forgot-password')
            ->layout('layouts.auth')
            ->title('Forgot Password');
    }

    protected function rules(): array
    {
        return [
            'email' => ['required', 'email'],
        ];
    }
}
