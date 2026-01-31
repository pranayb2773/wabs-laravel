<div>
    <div class="flex flex-col gap-6">
        <div class="flex w-full flex-col text-center">
            <flux:heading size="xl">{{ __('Forgot password') }}</flux:heading>
            <flux:subheading>{{ __('Enter admin email to receive a password reset link') }}</flux:subheading>
        </div>

        <form method="POST" wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
            <!-- Email Address -->
            <flux:input
                wire:model="email"
                :label="__('Email Address')"
                type="email"
                autofocus
                placeholder="email@example.com"
            />

            <flux:button variant="primary" type="submit" data-test="email-password-reset-link-button">
                {{ __('Email password reset link') }}
            </flux:button>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
            <span>{{ __('Or, return to') }}</span>
            <flux:link :href="route('login')" wire:navigate>{{ __('log in') }}</flux:link>
        </div>
    </div>
</div>
