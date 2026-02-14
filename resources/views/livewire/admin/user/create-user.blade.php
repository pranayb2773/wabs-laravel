<?php

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;

new class extends Component {
    public string $name;
    public string $email;
    public string $password = '';
    public string $password_confirmation = '';
    public bool $is18Plus = true;
    public bool $isProfessionalTrader = true;
    public bool $tosAccepted = true;

    public function createUser(): void
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => \Illuminate\Support\Facades\Hash::make($this->password),
            'rule' => \App\Enums\UserRole::Trader,
            'status' => \App\Enums\UserStatus::Pending,
            'tos_accepted' => $this->tosAccepted,
            'is_18_plus' => $this->is18Plus,
            'is_professional_trader' => $this->isProfessionalTrader,
        ]);

        \Flux\Flux::modal('create-user')->close();

        \Flux\Flux::toast(text: 'User created successfully!', heading: 'User Created', variant: 'success');

        $this->reset();
        $this->resetValidation();
    }

    public function closeModal(): void
    {
        \Flux\Flux::modal('create-user')->close();

        $this->reset();
        $this->resetValidation();

        $this->dispatch('refresh-parent');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
            'is18Plus' => ['required', 'boolean'],
            'isProfessionalTrader' => ['required', 'boolean'],
            'tosAccepted' => ['required', 'boolean'],
        ];
    }
}; ?>

<div>
    <flux:modal name="create-user" class="md:w-200" :dismissible="false">
        <div>
            <flux:heading size="lg">{{ __('Create User') }}</flux:heading>
            <flux:subheading>{{ __('Create a new user account via admin side.') }}</flux:subheading>
        </div>

        <form wire:submit="createUser" class="flex flex-col gap-6 mt-6">
            <!-- Name -->
            <flux:input
                wire:model="name"
                :label="__('Full Name')"
                type="text"
                autofocus
                autocomplete="name"
                :placeholder="__('Full name')"
            />

            <!-- Email Address -->
            <flux:input
                wire:model="email"
                :label="__('Email address')"
                type="email"
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Password -->
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                autocomplete="new-password"
                :placeholder="__('Password')"
                viewable
            />

            <!-- Confirm Password -->
            <flux:input
                wire:model="password_confirmation"
                :label="__('Confirm password')"
                type="password"
                autocomplete="new-password"
                :placeholder="__('Confirm password')"
                viewable
            />

            <div class="flex gap-2">
                <flux:spacer />

                <flux:button variant="primary" color="zinc" wire:click="closeModal">Cancel</flux:button>

                <flux:button type="submit" variant="primary">Create</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
