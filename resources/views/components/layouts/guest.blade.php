<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="icon" href="{{ asset('images/logo.webp') }}" type="image/png" sizes="18x18" />
        <link rel="apple-touch-icon" href="{{ asset('images/logo.webp') }}" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Syne:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap"
            rel="stylesheet"
        />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    </head>
    <body class="font-body bg-brand-deep text-brand-text antialiased overflow-x-hidden">
        {{-- Noise texture overlay --}}
        <div
            class="fixed inset-0 pointer-events-none z-[1000] opacity-[0.025]"
            style="
                background-image: url(&quot;data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E&quot;);
            "
        ></div>

        @include('partials.marketing.nav')

        <main>
            {{ $slot }}
        </main>

        @include('partials.marketing.footer')

        @fluxScripts
        @stack('scripts')
    </body>
</html>
