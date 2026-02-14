<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use Flux\Flux;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

final class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public bool $terms = false;

    public bool $is18Plus = false;

    public bool $isProfessionalTrader = false;

    public bool $tosAccepted = false;

    #[Computed]
    public function canAcceptTerms(): bool
    {
        return $this->tosAccepted && $this->is18Plus && $this->isProfessionalTrader;
    }

    public function declineTerms(): void
    {
        $this->terms = false;
        $this->tosAccepted = false;
        $this->is18Plus = false;
        $this->isProfessionalTrader = false;

        Flux::modal('terms-of-service')->close();
    }

    public function acceptTerms(): void
    {
        if (! $this->canAcceptTerms) {
            return;
        }

        $this->terms = true;

        Flux::modal('terms-of-service')->close();
    }

    public function register(): void
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => UserRole::Trader,
            'status' => UserStatus::Pending,
            'tos_accepted' => $this->tosAccepted,
            'is_18_plus' => $this->is18Plus,
            'is_professional_trader' => $this->isProfessionalTrader,
        ]);

        event(new Registered($user));

        Auth::login($user);

        Session::regenerate();

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.auth.register')
            ->layout('layouts.auth')
            ->title('Register');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
            'terms' => ['required', 'accepted'],
        ];
    }
}
