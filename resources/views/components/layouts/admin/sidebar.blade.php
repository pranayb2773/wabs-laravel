<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-950 antialiased">
        <flux:sidebar
            sticky
            collapsible
            class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700"
        >
            <flux:sidebar.header>
                <flux:sidebar.brand
                    href="{{ route('admin.dashboard') }}"
                    logo="{{ asset('images/logo.svg') }}"
                    name="{{ config('app.name') }}"
                />
                <flux:sidebar.collapse
                    class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2"
                />
            </flux:sidebar.header>
            <flux:sidebar.nav class="space-y-2">
                <flux:sidebar.item
                    icon="home"
                    href="{{ route('admin.dashboard') }}"
                    :current="request()->routeIs('admin.dashboard')"
                >
                    {{ __('Dashboard') }}
                </flux:sidebar.item>
                <flux:sidebar.group expandable icon="users" heading="{{ __('User Management') }}" class="grid">
                    <flux:sidebar.item
                        :href="route('admin.users')"
                        :current="request()->routeIs('admin.users')"
                        wire:navigate
                    >
                        {{ __('Users') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>
                <flux:sidebar.item
                    icon="banknotes"
                    :href="route('admin.brokers')"
                    :current="request()->routeIs('admin.brokers')"
                    wire:navigate
                >
                    {{ __('Brokers') }}
                </flux:sidebar.item>
            </flux:sidebar.nav>
            <flux:sidebar.spacer />
            <flux:sidebar.nav>
                <flux:sidebar.item icon="cog-6-tooth" href="#">Settings</flux:sidebar.item>
                <flux:sidebar.item icon="information-circle" href="#">Help</flux:sidebar.item>
            </flux:sidebar.nav>
            <flux:dropdown position="top" align="start" class="max-lg:hidden">
                <flux:sidebar.profile
                    avatar:color="violet"
                    name="{{ auth()->user()->name }}"
                    initials="{{ auth()->user()->initials() }}"
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

        <!-- Mobile header -->
        <flux:header class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700 pr-2!">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-3" inset="left" />
            <flux:spacer />
            <flux:dropdown position="top" align="start">
                <flux:profile initials="{{ auth()->user()->initials() }}" />
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
        </flux:header>

        {{ $slot }}

        @fluxScripts

        @persist('toast')
            <flux:toast />
        @endpersist
    </body>
</html>
