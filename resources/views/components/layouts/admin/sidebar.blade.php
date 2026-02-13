<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white antialiased dark:bg-zinc-800">
        <flux:sidebar
            sticky
            collapsible="mobile"
            class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700 px-0! py-4"
        >
            <flux:sidebar.header class="px-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2" wire:navigate>
                    <div class="size-8 flex items-center justify-center rounded-full bg-brand-primary text-white">
                        <flux:icon name="sparkles" />
                    </div>
                    <span class="text-xl font-semibold text-zinc-800 dark:text-white">{{ config('app.name') }}</span>
                </a>

                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>

            <flux:separator />

            <flux:sidebar.nav class="space-y-4 px-4">
                <flux:sidebar.group heading="{{ __('Platform') }}" class="grid">
                    <flux:sidebar.item
                        icon="home"
                        :href="route('admin.dashboard')"
                        :current="request()->routeIs('admin.dashboard')"
                        wire:navigate
                        class="size-6"
                    >
                        {{ __('Dashboard') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>

                <flux:sidebar.group heading="{{ __('User Management') }}" class="grid">
                    <flux:sidebar.item
                        icon="users"
                        :href="route('home')"
                        :current="request()->routeIs('home')"
                        wire:navigate
                    >
                        {{ __('Users') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>
            </flux:sidebar.nav>

            <flux:sidebar.spacer />
            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block px-4" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevron-up-down"
                    avatar:color="violet"
                    data-test="sidebar-menu-button"
                />

                <flux:menu class="w-55">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar name="{{ auth()->user()->name }}" size="sm" color="violet" />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">
                                        {{ auth()->user()->name }}
                                    </span>
                                    <span class="truncate text-xs">
                                        {{ auth()->user()->email }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <div class="px-2 pb-2">
                            <div class="text-xs mb-1 text-zinc-500 dark:text-zinc-400">
                                {{ __('Appearance') }}
                            </div>
                            <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                                <flux:radio value="light" icon="sun"></flux:radio>
                                <flux:radio value="dark" icon="moon"></flux:radio>
                                <flux:radio value="system" icon="computer-desktop"></flux:radio>
                            </flux:radio.group>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full"
                            data-test="logout-button"
                        >
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>
        {{ $slot }}

        @fluxScripts

        @persist('toast')
            <flux:toast />
        @endpersist
    </body>
</html>
