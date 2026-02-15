<x-layouts.guest title="Pricing | WABS.AI - Wealth Labs Trading Journal">
    {{-- Page Hero --}}
    <section class="px-8 lg:px-16 pt-40 pb-24 text-center relative overflow-hidden">
        <div class="absolute w-[1000px] h-[1000px] -top-[400px] left-1/2 -translate-x-1/2 bg-[radial-gradient(circle,rgba(168,85,247,0.15)_0%,rgba(124,58,237,0.05)_40%,transparent_70%)] animate-pulse-glow"></div>

        <div class="relative z-10 max-w-4xl mx-auto">
            <div class="inline-block px-5 py-2 bg-brand-primary/15 border border-brand-primary/30 rounded-full font-mono text-xs text-brand-tertiary mb-8 animate-fade-in-up">
                Simple Pricing
            </div>
            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-normal leading-tight mb-6 tracking-tight animate-fade-in-up animation-delay-100">
                Powering Your Path to<br /><em class="italic bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow bg-clip-text text-transparent">Lasting Profitability</em>
            </h1>
            <p class="text-xl text-brand-text-secondary max-w-xl mx-auto leading-relaxed animate-fade-in-up animation-delay-200">
                What's your investment in success worth today? One plan, every feature, no hidden fees.
            </p>
        </div>
    </section>

    {{-- Pricing Card --}}
    <section class="px-8 lg:px-16 pb-24">
        <div class="max-w-lg mx-auto">
            <div class="bg-gradient-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/20 rounded-3xl p-10 relative overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-brand-primary via-brand-secondary to-brand-glow"></div>

                <div class="text-center">
                    <span class="inline-block px-4 py-1.5 bg-brand-primary/20 border border-brand-primary/30 rounded-full font-mono text-xs text-brand-tertiary uppercase tracking-widest mb-6">
                        Premium
                    </span>

                    <div class="flex items-baseline justify-center gap-1 mb-3">
                        <span class="font-display text-6xl font-normal">$24.99</span>
                        <span class="text-brand-text-muted text-lg">/month</span>
                    </div>

                    <p class="text-brand-text-secondary mb-8">Perfect for growing portfolios</p>

                    <a
                        href="{{ route('login') }}"
                        class="inline-block w-full px-10 py-4 rounded-full font-body font-semibold text-lg bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow text-white shadow-lg shadow-brand-primary/40 transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-brand-primary/50"
                    >
                        Get Started
                    </a>
                </div>

                <div class="mt-10 grid grid-cols-3 gap-4 text-center">
                    @php
                        $limits = [
                            ['value' => '20', 'label' => 'Accounts'],
                            ['value' => '2.5 GB', 'label' => 'Storage'],
                            ['value' => '∞', 'label' => 'Trades'],
                        ];
                    @endphp

                    @foreach ($limits as $limit)
                        <div class="bg-brand-elevated rounded-xl p-4">
                            <p class="font-mono text-2xl font-semibold text-brand-primary">{{ $limit['value'] }}</p>
                            <p class="text-xs text-brand-text-muted mt-1">{{ $limit['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Features Breakdown --}}
    <section class="px-8 lg:px-16 py-24 bg-brand-card">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">Everything Included</p>
                <h2 class="font-display text-3xl lg:text-4xl font-normal tracking-tight mb-4">One Plan, Every Feature</h2>
                <p class="text-brand-text-secondary text-lg max-w-xl mx-auto leading-relaxed">
                    No feature gates, no upsells. Get the complete toolkit from day one.
                </p>
            </div>

            @php
                $featureGroups = [
                    [
                        'icon' => '⚡',
                        'title' => 'General Features',
                        'features' => [
                            'Oversee multiple trading accounts seamlessly from one dashboard',
                            'Securely store all your trading data',
                            'Get your trade history from multiple brokers via syncing, uploading, or manual input',
                            'Collaborate by sharing trades and insights with other traders',
                            'Analyze your trades by factoring in all commissions and fees paid',
                            'Track your performance in the currency of your choice',
                            'Set your breakeven range to enable accurate analysis',
                        ],
                    ],
                    [
                        'icon' => '📒',
                        'title' => 'Journal Your Trades',
                        'features' => [
                            'Comprehensive Analytics Dashboard',
                            'Dynamic Pricing Chart',
                            'Filters & Categories',
                            'Global Smart Filter',
                            'Personalized Tag Groups',
                            'Notebook',
                            'Note Templates',
                            'Risk Assessment Tools',
                            'Live P/L',
                            'MFE & MFA Stats',
                            'Hive Scale',
                            'Exit Point Analysis',
                            'Personalized Chart Settings',
                            'Option Market Charts',
                            'Upload Image',
                        ],
                    ],
                    [
                        'icon' => '📊',
                        'title' => 'In-Depth Reporting',
                        'features' => [
                            'Detailed Reporting (50+ reports)',
                            'Date & Time Analytics',
                            'Pricing and Quantity Analytics',
                            'Options Expiration Summary',
                            'Risk Analysis Reports',
                            'Personalized Reports',
                            'Win/Loss Comparison',
                            'Evaluate',
                        ],
                    ],
                    [
                        'icon' => '🎯',
                        'title' => 'Hive Station',
                        'features' => [
                            'Strategy Playbook Creation',
                            'Track Days Missed',
                            'Collaborative Playbooks',
                            'Playbook Data Analysis',
                        ],
                    ],
                    [
                        'icon' => '🔍',
                        'title' => 'Wealth Labs Screener',
                        'features' => [
                            'Playback Your Trades',
                            'Replay Speed Control',
                            'Trade Time Data',
                            'Market Depth Data',
                        ],
                    ],
                ];
            @endphp

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($featureGroups as $group)
                    <div class="bg-gradient-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/15 rounded-2xl p-8 transition-all hover:border-brand-primary/30">
                        <div class="w-12 h-12 bg-brand-elevated rounded-xl flex items-center justify-center mb-5 text-xl">
                            {{ $group['icon'] }}
                        </div>
                        <h3 class="text-lg font-semibold mb-5">{{ $group['title'] }}</h3>
                        <ul class="space-y-3">
                            @foreach ($group['features'] as $feature)
                                <li class="flex items-start gap-3 text-sm text-brand-text-secondary">
                                    <span class="text-brand-primary font-semibold mt-0.5">&#10003;</span>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="px-8 lg:px-16 py-24">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-16">
                <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">Support</p>
                <h2 class="font-display text-3xl lg:text-4xl font-normal tracking-tight mb-4">Frequently Asked Questions</h2>
            </div>

            @php
                $faqs = [
                    [
                        'question' => 'Is my payment information secure?',
                        'answer' => 'Yes. We use encrypted payment gateways and never store sensitive financial details on our servers.',
                    ],
                    [
                        'question' => 'Can I use WealthLabs.ai with multiple broker accounts under one plan?',
                        'answer' => 'Yes. Even on a single subscription, you can connect multiple broker accounts depending on your plan limits.',
                    ],
                ];
            @endphp

            <div
                x-data="{ open: null }"
                class="space-y-4"
            >
                @foreach ($faqs as $index => $faq)
                    <div class="bg-gradient-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/15 rounded-2xl overflow-hidden transition-all hover:border-brand-primary/30">
                        <button
                            type="button"
                            @click="open = open === {{ $index }} ? null : {{ $index }}"
                            class="flex items-center justify-between w-full p-6 text-left cursor-pointer"
                        >
                            <span class="font-semibold pr-4">{{ $faq['question'] }}</span>
                            <span
                                class="shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-brand-primary/20 text-brand-tertiary transition-transform duration-300"
                                :class="open === {{ $index }} ? 'rotate-45' : ''"
                            >
                                +
                            </span>
                        </button>
                        <div
                            x-show="open === {{ $index }}"
                            x-collapse
                        >
                            <p class="px-6 pb-6 text-brand-text-secondary leading-relaxed">{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="px-8 lg:px-16 py-32 text-center relative overflow-hidden">
        <div class="absolute w-[1200px] h-[1200px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[radial-gradient(circle,rgba(168,85,247,0.12)_0%,rgba(124,58,237,0.05)_40%,transparent_60%)]"></div>

        <div class="relative z-10 max-w-2xl mx-auto">
            <h2 class="font-display text-4xl lg:text-5xl font-normal mb-6">
                Your Path to <em class="italic bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow bg-clip-text text-transparent">Profitable Trading</em>
            </h2>
            <p class="text-brand-text-secondary text-lg mb-10">
                Your journey to smarter trading starts here. One powerful tool. Every feature you need. Get started now.
            </p>
            <a href="{{ route('login') }}" class="inline-block px-10 py-5 rounded-full font-body font-semibold text-lg bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow text-white shadow-lg shadow-brand-primary/40 transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-brand-primary/50">
                Get Started
            </a>
        </div>
    </section>
</x-layouts.guest>
