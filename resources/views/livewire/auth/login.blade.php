<div>
    <div class="flex flex-col gap-6">
        <div class="flex w-full flex-col text-center">
            <flux:heading size="xl">{{ __('Login into admin account') }}</flux:heading>
            <flux:subheading>{{ __('Enter admin email and password below to log in') }}</flux:subheading>
        </div>

        <form method="POST" wire:submit="login" class="flex flex-col gap-6">
            <!-- Email Address -->
            <flux:input
                wire:model="email"
                :label="__('Email Address')"
                type="email"
                autofocus
                autocomplete="email"
                placeholder="hello@example.com"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    wire:model="password"
                    :label="__('Password')"
                    type="password"
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                    viewable
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-sm end-0" :href="route('password.request')" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox wire:model="remember" :label="__('Remember me')" />

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary" class="flex-1">{{ __('Log in') }}</flux:button>
            </div>
        </form>
    </div>
</div>
