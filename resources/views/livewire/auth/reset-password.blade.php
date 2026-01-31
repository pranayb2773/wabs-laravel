<div>
    <div class="flex flex-col gap-6">
        <div class="flex w-full flex-col text-center">
            <flux:heading size="xl">{{ __('Reset password') }}</flux:heading>
            <flux:subheading>{{ __('Please enter your new password below') }}</flux:subheading>
        </div>

        <!-- Session Status -->
        @if (session()->has('status'))
            <flux:callout variant="success" icon="check-circle" :heading="session('status')" />
        @endif

        <form method="POST" wire:submit="resetPassword" class="flex flex-col gap-6">
            <!-- Email Address -->
            <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

            <!-- Password -->
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Password')"
                viewable
            />

            <!-- Confirm Password -->
            <flux:input
                wire:model="password_confirmation"
                :label="__('Confirm password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Confirm password')"
                viewable
            />

            <div class="flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="w-full" data-test="reset-password-button">
                    {{ __('Reset password') }}
                </flux:button>
            </div>
        </form>
    </div>
</div>
