<footer class="px-8 lg:px-16 py-16 border-t border-brand-primary/10 bg-brand-card">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row justify-between items-center gap-8">
        <a href="{{ route('home') }}" class="flex items-center gap-3 no-underline">
            <div class="w-11 h-11 bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow rounded-xl flex items-center justify-center font-mono font-bold text-lg text-white shadow-lg shadow-brand-primary/40">
                W
            </div>
            <span class="font-body font-bold text-xl text-brand-text tracking-tight">Wealth Labs</span>
        </a>

        <div class="flex flex-wrap justify-center gap-8">
            <a href="{{ route('features') }}" class="text-brand-text-muted text-sm transition-colors hover:text-brand-tertiary">Features</a>
            <a href="#pricing" class="text-brand-text-muted text-sm transition-colors hover:text-brand-tertiary">Pricing</a>
            <a href="#" class="text-brand-text-muted text-sm transition-colors hover:text-brand-tertiary">Terms of Service</a>
            <a href="#" class="text-brand-text-muted text-sm transition-colors hover:text-brand-tertiary">Instagram</a>
            <a href="#" class="text-brand-text-muted text-sm transition-colors hover:text-brand-tertiary">Twitter</a>
            <a href="#" class="text-brand-text-muted text-sm transition-colors hover:text-brand-tertiary">Discord</a>
        </div>

        <p class="text-brand-text-muted text-sm">&copy; {{ date('Y') }} WealthLabs.AI</p>
    </div>
</footer>
