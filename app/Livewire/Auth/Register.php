<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
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

    public function register(): void
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => UserRole::User,
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
            'is18Plus' => ['required', 'accepted'],
            'isProfessionalTrader' => ['required', 'accepted'],
            'tosAccepted' => ['required', 'accepted'],
        ];
    }
}
