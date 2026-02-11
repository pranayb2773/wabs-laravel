<nav
    x-data="{ open: false }"
    class="fixed top-0 left-0 right-0 z-50 px-6 lg:px-16 py-4 lg:py-6 flex justify-between items-center backdrop-blur-xl bg-brand-deep/80 border-b border-brand-primary/10"
>
    <a href="{{ route('home') }}" class="flex items-center gap-2 no-underline">
        <img src="{{ asset('images/logo.svg') }}" alt="{{ config('app.name') }}" class="size-8 lg:size-9" />
        <span class="font-body font-bold text-lg lg:text-xl text-brand-text tracking-tight">Wealth Labs</span>
    </a>

    {{-- Desktop Navigation --}}
    <div class="hidden lg:flex gap-12 items-center">
        <a
            href="{{ route('features') }}"
            class="text-sm font-medium tracking-wide transition-colors hover:text-brand-tertiary {{ request()->routeIs('features') ? 'text-brand-tertiary' : 'text-brand-text-secondary' }}"
        >
            Features
        </a>
        <a
            href="#tools"
            class="text-brand-text-secondary text-sm font-medium tracking-wide transition-colors hover:text-brand-tertiary"
        >
            Tools
        </a>
        <a
            href="#pricing"
            class="text-brand-text-secondary text-sm font-medium tracking-wide transition-colors hover:text-brand-tertiary"
        >
            Pricing
        </a>
    </div>

    {{-- Desktop CTA --}}
    <div class="hidden lg:flex gap-4 items-center">
        @auth
            <a
                href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : route('dashboard') }}"
                class="px-6 py-3 rounded-full font-body font-semibold text-sm bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow text-white shadow-lg shadow-brand-primary/40 transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-brand-primary/50"
            >
                Dashboard
            </a>
        @else
            <a
                href="{{ route('login') }}"
                class="px-6 py-3 rounded-full font-body font-semibold text-sm bg-transparent text-brand-text border border-brand-primary/30 transition-all hover:bg-brand-primary/10 hover:border-brand-primary/50"
            >
                Sign In
            </a>
            <a
                href="{{ route('login') }}"
                class="px-6 py-3 rounded-full font-body font-semibold text-sm bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow text-white shadow-lg shadow-brand-primary/40 transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-brand-primary/50"
            >
                Get Started
            </a>
        @endauth
    </div>

    {{-- Mobile Menu Button --}}
    <button
        @click="open = !open"
        class="lg:hidden flex flex-col justify-center items-center w-10 h-10 rounded-lg bg-brand-primary/10 border border-brand-primary/20"
        aria-label="Toggle menu"
    >
        <span
            class="block w-5 h-0.5 bg-brand-text transition-all duration-300"
            :class="open ? 'rotate-45 translate-y-1' : ''"
        ></span>
        <span
            class="block w-5 h-0.5 bg-brand-text mt-1 transition-all duration-300"
            :class="open ? 'opacity-0' : ''"
        ></span>
        <span
            class="block w-5 h-0.5 bg-brand-text mt-1 transition-all duration-300"
            :class="open ? '-rotate-45 -translate-y-1.5' : ''"
        ></span>
    </button>

    {{-- Mobile Menu --}}
    <div
        x-cloak
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        @click.away="open = false"
        class="lg:hidden absolute top-full left-0 right-0 bg-brand-card/95 backdrop-blur-xl border-b border-brand-primary/10 px-6 py-6"
    >
        <div class="flex flex-col gap-4">
            <a
                href="{{ route('features') }}"
                @click="open = false"
                class="text-base font-medium py-2 transition-colors hover:text-brand-tertiary {{ request()->routeIs('features') ? 'text-brand-tertiary' : 'text-brand-text-secondary' }}"
            >
                Features
            </a>
            <a
                href="#tools"
                @click="open = false"
                class="text-brand-text-secondary text-base font-medium py-2 transition-colors hover:text-brand-tertiary"
            >
                Tools
            </a>
            <a
                href="#pricing"
                @click="open = false"
                class="text-brand-text-secondary text-base font-medium py-2 transition-colors hover:text-brand-tertiary"
            >
                Pricing
            </a>

            <div class="border-t border-brand-primary/10 pt-4 mt-2 flex flex-col gap-3">
                @auth
                    <a
                        href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : route('dashboard') }}"
                        class="w-full text-center px-6 py-3 rounded-full font-body font-semibold text-sm bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow text-white shadow-lg shadow-brand-primary/40"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="w-full text-center px-6 py-3 rounded-full font-body font-semibold text-sm bg-transparent text-brand-text border border-brand-primary/30"
                    >
                        Sign In
                    </a>
                    <a
                        href="{{ route('login') }}"
                        class="w-full text-center px-6 py-3 rounded-full font-body font-semibold text-sm bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow text-white shadow-lg shadow-brand-primary/40"
                    >
                        Get Started
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
