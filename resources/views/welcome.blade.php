<x-layouts.guest title="WABS.AI | Wealth Labs - AI-Powered Trading Journal">
    {{-- Hero Section --}}
    <section
        class="min-h-screen flex flex-col justify-center items-center text-center px-8 pt-32 pb-16 relative overflow-hidden"
    >
        {{-- Animated gradient orbs --}}
        <div
            class="absolute w-225 h-225 -top-75 -right-50 bg-[radial-gradient(circle,rgba(168,85,247,0.2)_0%,rgba(124,58,237,0.1)_40%,transparent_70%)] animate-float"
        ></div>
        <div
            class="absolute w-175 h-175 -bottom-37.5 -left-37.5 bg-[radial-gradient(circle,rgba(217,70,239,0.15)_0%,rgba(168,85,247,0.05)_50%,transparent_70%)] animate-float-reverse"
        ></div>
        <div
            class="absolute w-125 h-125 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[radial-gradient(circle,rgba(192,132,252,0.1)_0%,transparent_60%)] animate-pulse-glow"
        ></div>

        <div class="relative z-10 max-w-4xl">
            <div
                class="inline-flex items-center gap-2 px-5 py-2 bg-brand-primary/15 border border-brand-primary/30 rounded-full font-mono text-xs text-brand-tertiary mb-8 animate-fade-in-up"
            >
                <span
                    class="w-1.5 h-1.5 bg-brand-primary rounded-full animate-pulse shadow-lg shadow-brand-primary"
                ></span>
                <span>Release v.01 — Now Live</span>
            </div>

            <h1
                class="font-display text-5xl sm:text-6xl lg:text-7xl font-normal leading-tight mb-6 tracking-tight animate-fade-in-up animation-delay-100"
            >
                Smarter Moves,
                <br />
                <em
                    class="italic bg-linear-to-br from-brand-primary via-brand-secondary to-brand-glow bg-clip-text text-transparent"
                >
                    Stronger Results
                </em>
            </h1>

            <p
                class="text-xl text-brand-text-secondary max-w-xl mx-auto mb-12 leading-relaxed animate-fade-in-up animation-delay-200"
            >
                Powered by AI, our trading journal analyzes every move, reveals key insights, and drives better trading
                outcomes.
            </p>

            <div class="flex gap-4 justify-center flex-wrap animate-fade-in-up animation-delay-300">
                <a
                    href="{{ route('login') }}"
                    class="px-8 py-4 rounded-full font-body font-semibold text-base bg-linear-to-br from-brand-primary via-brand-secondary to-brand-glow text-white shadow-lg shadow-brand-primary/40 transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-brand-primary/50"
                >
                    Start Trading Smarter
                </a>
                <a
                    href="#"
                    class="px-8 py-4 rounded-full font-body font-semibold text-base bg-transparent text-brand-text border border-brand-primary/30 transition-all hover:bg-brand-primary/10 hover:border-brand-primary/50"
                >
                    Watch Demo
                </a>
            </div>
        </div>
    </section>

    {{-- Broker Logos Marquee --}}
    <section class="px-8 py-16 border-t border-b border-brand-primary/10 overflow-hidden bg-brand-card/50">
        <p class="text-center text-xs text-brand-text-muted uppercase tracking-widest mb-8">
            Seamless integration with leading brokerages
        </p>
        <div class="flex gap-16 animate-marquee">
            @foreach (['Robinhood', 'Webull', 'E*TRADE', 'Fidelity', 'Interactive Brokers', 'Charles Schwab', 'ThinkorSwim', 'Tastytrade', 'Topstep', 'Apex', 'Tradeify', 'Robinhood', 'Webull', 'E*TRADE', 'Fidelity', 'Interactive Brokers', 'Charles Schwab', 'ThinkorSwim', 'Tastytrade', 'Topstep', 'Apex', 'Tradeify'] as $broker)
                <span
                    class="font-body font-semibold text-lg text-brand-text-muted whitespace-nowrap opacity-50 transition-all hover:opacity-100 hover:text-brand-tertiary"
                >
                    {{ $broker }}
                </span>
            @endforeach
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="px-8 lg:px-16 py-32 relative">
        <div class="text-center mb-20">
            <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">Features</p>
            <h2 class="font-display text-4xl lg:text-5xl font-normal tracking-tight">AI-Driven Intelligence</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @php
                $features = [
                    ['icon' => '📊', 'title' => 'Trade Log', 'desc' => 'Detailed trade records that follow your journey from entry to exit, built for accurate post-trade evaluation and reflection.'],
                    ['icon' => '✍️', 'title' => 'Advanced Journaling', 'desc' => 'Capture the reasoning behind each trade and build a powerful database of your trading mindset and history.'],
                    ['icon' => '🧠', 'title' => 'AI-Powered Analysis', 'desc' => 'Leverage machine learning to optimize your strategy through deep insights from your trading data.'],
                    ['icon' => '🔗', 'title' => 'Seamless Integration', 'desc' => 'Effortlessly sync with major brokerages and elevate your trading experience without missing a beat.'],
                    ['icon' => '📈', 'title' => 'Interactive Analytics', 'desc' => 'Move beyond the basics with advanced analytics that highlight both strengths and opportunities in your strategy.'],
                    ['icon' => '🎯', 'title' => 'Emotional Insight', 'desc' => 'Track your emotional and analytical confidence before every entry. Uncover how your mindset impacts decisions.'],
                ];
            @endphp

            @foreach ($features as $feature)
                <div
                    class="group bg-linear-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/15 rounded-3xl p-10 relative overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:border-brand-primary/30 hover:shadow-2xl hover:shadow-brand-primary/15 hover:from-brand-primary/15 hover:to-brand-secondary/8"
                >
                    <div
                        class="absolute top-0 left-0 right-0 h-0.5 bg-linear-to-r from-brand-primary via-brand-secondary to-brand-glow opacity-0 transition-opacity group-hover:opacity-100"
                    ></div>
                    <div
                        class="w-14 h-14 bg-linear-to-br from-brand-primary/20 to-brand-secondary/10 border border-brand-primary/20 rounded-2xl flex items-center justify-center mb-6 text-2xl"
                    >
                        {{ $feature['icon'] }}
                    </div>
                    <h3 class="font-body text-xl font-semibold mb-4 tracking-tight">{{ $feature['title'] }}</h3>
                    <p class="text-brand-text-secondary text-sm leading-relaxed">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Showcase Section --}}
    <section class="px-8 lg:px-16 py-32 bg-linear-to-b from-brand-card to-brand-deep relative">
        <div
            class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(168,85,247,0.05)_0%,transparent_70%)]"
        ></div>

        <div class="grid lg:grid-cols-2 gap-24 items-center max-w-7xl mx-auto relative z-10">
            <div>
                <h2 class="font-display text-3xl lg:text-4xl font-normal leading-tight mb-6">
                    Deep Trade Analytics
                    <br />
                    Tailored to You
                </h2>
                <p class="text-brand-text-secondary text-lg leading-relaxed mb-8">
                    See every detail of your execution—from entries to R-multiples—in one clean dashboard. Wealth Labs
                    breaks down your performance so you can optimize your strategy with confidence.
                </p>
                <a
                    href="{{ route('features') }}"
                    class="inline-block px-8 py-4 rounded-full font-body font-semibold text-base bg-linear-to-br from-brand-primary via-brand-secondary to-brand-glow text-white shadow-lg shadow-brand-primary/40 transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-brand-primary/50"
                >
                    Explore Analytics
                </a>
            </div>

            <div class="relative group">
                <div class="bg-brand-card border border-brand-primary/20 rounded-2xl p-8 relative overflow-hidden">
                    <div
                        class="absolute top-0 left-0 right-0 h-0.5 bg-linear-to-r from-brand-primary via-brand-secondary to-brand-glow"
                    ></div>

                    @php
                        $stats = [
                            ['label' => 'Total Trades', 'value' => '247', 'class' => ''],
                            ['label' => 'Win Rate', 'value' => '68.4%', 'class' => 'text-green-400'],
                            ['label' => 'Avg. R-Multiple', 'value' => '+2.3R', 'class' => 'text-green-400'],
                            ['label' => 'Largest Win', 'value' => '+$4,280', 'class' => 'text-green-400'],
                            ['label' => 'Largest Loss', 'value' => '-$890', 'class' => 'text-red-400'],
                            ['label' => 'Profit Factor', 'value' => '3.12', 'class' => 'text-green-400'],
                        ];
                    @endphp

                    @foreach ($stats as $stat)
                        <div class="flex justify-between py-4 border-b border-brand-primary/10 last:border-b-0">
                            <span class="text-brand-text-muted text-sm">{{ $stat['label'] }}</span>
                            <span class="font-mono font-medium {{ $stat['class'] }}">{{ $stat['value'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="px-8 lg:px-16 py-24 border-t border-brand-primary/10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto text-center">
            @php
                $statsDisplay = [
                    ['number' => '10+', 'desc' => 'Supported Brokers'],
                    ['number' => 'AI', 'desc' => 'Powered Insights'],
                    ['number' => '24/7', 'desc' => 'Access Anywhere'],
                    ['number' => '∞', 'desc' => 'Trade History'],
                ];
            @endphp

            @foreach ($statsDisplay as $stat)
                <div class="p-8">
                    <div
                        class="font-display text-5xl lg:text-6xl font-normal bg-linear-to-br from-brand-primary via-brand-secondary to-brand-glow bg-clip-text text-transparent leading-none mb-2"
                    >
                        {{ $stat['number'] }}
                    </div>
                    <p class="text-brand-text-secondary text-sm">{{ $stat['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Why Section --}}
    <section class="px-8 lg:px-16 py-32 bg-brand-card">
        <div class="text-center mb-20">
            <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">Why Wealth Labs</p>
            <h2 class="font-display text-4xl lg:text-5xl font-normal tracking-tight">Built for Modern Traders</h2>
        </div>

        <div class="grid lg:grid-cols-3 gap-px bg-brand-primary/15 rounded-3xl overflow-hidden max-w-7xl mx-auto">
            @php
                $whyItems = [
                    ['num' => '01', 'title' => 'Streamlined by AI', 'desc' => 'Cutting-edge AI decodes your trading behavior, reveals psychological patterns, and helps you stay ahead of the market.'],
                    ['num' => '02', 'title' => 'Cross-Platform Sync', 'desc' => 'Unify your trading data across Robinhood, Webull, Thinkorswim, and more—all insights in one place.'],
                    ['num' => '03', 'title' => 'Complete Logging', 'desc' => 'From detailed trade logs to smart analytics and seamless tagging, empowering continuous improvement.'],
                    ['num' => '04', 'title' => 'Future-Ready', 'desc' => 'Adapt with confidence. Extending support to futures, forex, stocks, and crypto as the landscape evolves.'],
                    ['num' => '05', 'title' => 'Discipline Tools', 'desc' => 'Map your mindset to your strategy. Trade with clarity, control, and emotional intelligence.'],
                    ['num' => '06', 'title' => 'Fully Customizable', 'desc' => 'No two traders are alike. Customize the platform to match your unique approach—no compromises.'],
                ];
            @endphp

            @foreach ($whyItems as $item)
                <div class="bg-brand-card p-12 transition-colors hover:bg-brand-elevated">
                    <p class="font-mono text-xs text-brand-primary mb-6">{{ $item['num'] }}</p>
                    <h3 class="font-body text-xl font-semibold mb-4">{{ $item['title'] }}</h3>
                    <p class="text-brand-text-secondary text-sm leading-relaxed">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Tools Section --}}
    <section id="tools" class="px-8 lg:px-16 py-32 relative">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20">
                <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">Market Tools</p>
                <h2 class="font-display text-4xl lg:text-5xl font-normal tracking-tight">
                    Powerful Trading Intelligence
                </h2>
            </div>

            @php
                $tools = [
                    ['title' => 'Real-Time Options Flow', 'desc' => 'Track unusual options activity, smart money trades, and high-volume flow in real time. Identify market sentiment quickly with dynamic filters, strike analysis, and flow direction indicators.'],
                    ['title' => 'Latest Market News', 'desc' => 'Stay updated with real-time market news from trusted sources. Get instant alerts on major earnings, economic events, and breaking stories that impact your trading decisions.'],
                    ['title' => 'Powerful Screener', 'desc' => 'Scan the market using advanced filters such as volume, price action, trends, indicators, and fundamentals. Instantly discover high-probability setups tailored to your trading strategy.'],
                ];
            @endphp

            @foreach ($tools as $index => $tool)
                <div
                    class="grid lg:grid-cols-2 gap-16 items-center mb-32 last:mb-0 {{ $index % 2 === 1 ? 'lg:[direction:rtl]' : '' }}"
                >
                    <div class="{{ $index % 2 === 1 ? 'lg:[direction:ltr]' : '' }}">
                        <h3 class="font-display text-2xl font-normal mb-4">{{ $tool['title'] }}</h3>
                        <p class="text-brand-text-secondary leading-relaxed">{{ $tool['desc'] }}</p>
                    </div>
                    <div
                        class="bg-linear-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/15 rounded-2xl p-8 min-h-75 flex items-center justify-center relative overflow-hidden {{ $index % 2 === 1 ? 'lg:[direction:ltr]' : '' }}"
                    >
                        <div class="absolute inset-0 bg-linear-to-br from-brand-primary/8 to-transparent"></div>
                        <div class="w-full h-50 flex items-end gap-2 p-4 relative z-10">
                            @for ($i = 0; $i < 10; $i++)
                                <div
                                    class="flex-1 bg-linear-to-t from-brand-primary to-brand-glow rounded-t opacity-70 transition-opacity hover:opacity-100 shadow-lg shadow-brand-primary/30"
                                    style="height: {{ rand(35, 95) }}%"
                                ></div>
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="px-8 lg:px-16 py-40 text-center relative overflow-hidden">
        <div
            class="absolute w-300 h-300 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[radial-gradient(circle,rgba(168,85,247,0.12)_0%,rgba(124,58,237,0.05)_40%,transparent_60%)]"
        ></div>

        <div class="relative z-10 max-w-2xl mx-auto">
            <h2 class="font-display text-4xl lg:text-5xl font-normal mb-6">
                Smart Journaling
                <br />
                Starts
                <em
                    class="italic bg-linear-to-br from-brand-primary via-brand-secondary to-brand-glow bg-clip-text text-transparent"
                >
                    Now
                </em>
            </h2>
            <p class="text-brand-text-secondary text-lg mb-12">
                Join thousands of traders who are already using AI to decode their trading patterns and build
                sustainable profitability.
            </p>
            <a
                href="{{ route('login') }}"
                class="inline-block px-10 py-5 rounded-full font-body font-semibold text-lg bg-linear-to-br from-brand-primary via-brand-secondary to-brand-glow text-white shadow-lg shadow-brand-primary/40 transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-brand-primary/50"
            >
                Get Started Free
            </a>
        </div>
    </section>

    @push('scripts')
        <script>
            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px',
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('[data-animate]').forEach((el) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });

            // Smooth scroll for navigation
            document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });
        </script>
    @endpush
</x-layouts.guest>
