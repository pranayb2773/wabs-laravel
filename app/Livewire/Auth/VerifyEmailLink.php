<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Livewire\Component;

final class VerifyEmailLink extends Component
{
    public function mount(int $id, string $hash): void
    {
        $user = User::findOrFail($id);

        if (! hash_equals(sha1($user->getEmailForVerification()), $hash)) {
            abort(403, __('auth.invalid_verification_link'));
        }

        if (! $user->hasVerifiedEmail()) {
            $user->status = UserStatus::Active;
            $user->markEmailAsVerified();

            event(new Verified($user));
        }

        $this->redirectIntended(
            $user->isAdmin() ? route('admin.dashboard') : route('dashboard'),
            navigate: true
        );
    }

    public function render(): string
    {
        return <<<'HTML'
        <div></div>
        HTML;
    }
}
