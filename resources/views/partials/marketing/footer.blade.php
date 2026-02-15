<footer class="px-8 lg:px-16 pt-16 pb-8 border-t border-brand-primary/10 bg-brand-card">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-8">
            {{-- Brand --}}
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 no-underline">
                    <img src="{{ asset('images/logo.svg') }}" alt="{{ config('app.name') }}" class="size-9" />
                    <span class="font-body font-bold text-xl text-brand-text tracking-tight">Wealth Labs</span>
                </a>
                <p class="text-brand-text-muted text-sm leading-relaxed max-w-xs">
                    AI-powered trading journal built for serious traders. Analyze, learn, and grow.
                </p>
            </div>

            {{-- Pages --}}
            <div>
                <h4 class="font-semibold text-sm text-brand-text mb-4">Pages</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('features') }}" class="text-brand-text-muted text-sm transition-colors hover:text-brand-tertiary">Features</a>
                    </li>
                    <li>
                        <a href="{{ route('pricing') }}" class="text-brand-text-muted text-sm transition-colors hover:text-brand-tertiary">Pricing</a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}" class="text-brand-text-muted text-sm transition-colors hover:text-brand-tertiary">Terms of Service</a>
                    </li>
                </ul>
            </div>

            {{-- Social --}}
            <div>
                <h4 class="font-semibold text-sm text-brand-text mb-4">Follow Us</h4>
                <div class="flex gap-3">
                    <a
                        href="https://www.instagram.com/wabs.ai?igsh=Yzc0NTFhNGhzNDk4&utm_source=qr"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="w-10 h-10 rounded-xl bg-brand-primary/10 border border-brand-primary/20 flex items-center justify-center text-brand-text-muted transition-all hover:bg-brand-primary/20 hover:text-brand-tertiary hover:border-brand-primary/40"
                        aria-label="Instagram"
                    >
                        <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" /></svg>
                    </a>
                    <a
                        href="https://youtu.be/OICcWA0fiMg"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="w-10 h-10 rounded-xl bg-brand-primary/10 border border-brand-primary/20 flex items-center justify-center text-brand-text-muted transition-all hover:bg-brand-primary/20 hover:text-brand-tertiary hover:border-brand-primary/40"
                        aria-label="YouTube"
                    >
                        <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" /></svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="mt-12 pt-6 border-t border-brand-primary/10 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-brand-text-muted text-xs">&copy; {{ date('Y') }} WealthLabs.AI. All rights reserved.</p>
        </div>
    </div>
</footer>
