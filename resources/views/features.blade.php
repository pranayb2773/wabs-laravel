<x-layouts.guest title="Features | WABS.AI - Wealth Labs Trading Journal">
    {{-- Page Hero --}}
    <section class="px-8 lg:px-16 pt-40 pb-24 text-center relative overflow-hidden">
        <div class="absolute w-[1000px] h-[1000px] -top-[400px] left-1/2 -translate-x-1/2 bg-[radial-gradient(circle,rgba(168,85,247,0.15)_0%,rgba(124,58,237,0.05)_40%,transparent_70%)] animate-pulse-glow"></div>

        <div class="relative z-10 max-w-4xl mx-auto">
            <div class="inline-block px-5 py-2 bg-brand-primary/15 border border-brand-primary/30 rounded-full font-mono text-xs text-brand-tertiary mb-8 animate-fade-in-up">
                AI-Powered Trading Journal
            </div>
            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-normal leading-tight mb-6 tracking-tight animate-fade-in-up animation-delay-100">
                Features Built for<br /><em class="italic bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow bg-clip-text text-transparent">Serious Traders</em>
            </h1>
            <p class="text-xl text-brand-text-secondary max-w-xl mx-auto leading-relaxed animate-fade-in-up animation-delay-200">
                Discover the complete toolkit designed to analyze your trades, understand your psychology, and consistently improve your performance.
            </p>
        </div>
    </section>

    {{-- Trade Log Feature --}}
    <section class="px-8 lg:px-16 py-24">
        <div class="max-w-7xl mx-auto">
            <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">Core Feature</p>
            <h2 class="font-display text-3xl lg:text-4xl font-normal tracking-tight mb-4">Comprehensive Trade Log</h2>
            <p class="text-brand-text-secondary text-lg max-w-xl leading-relaxed">
                Every trade documented, analyzed, and ready for review. From entry to exit, capture the full picture.
            </p>

            <div class="grid lg:grid-cols-2 gap-16 items-center mt-16">
                <div>
                    <h3 class="font-body text-2xl font-semibold mb-4">Track Every Detail That Matters</h3>
                    <p class="text-brand-text-secondary leading-relaxed mb-6">
                        Your trade log automatically captures entry and exit points, position sizes, P&L, and timing data. No manual entry needed when you connect your broker.
                    </p>
                    <ul class="space-y-4">
                        @foreach(['Automatic trade import from connected brokers', 'Real-time P&L calculations and tracking', 'Options-specific data: strikes, expiry, Greeks', 'Custom tags for strategy classification', 'Historical trade search and filtering'] as $item)
                            <li class="flex items-start gap-3 text-brand-text-secondary">
                                <span class="text-brand-primary font-semibold mt-0.5">✓</span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/20 rounded-3xl p-8 relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-brand-primary via-brand-secondary to-brand-glow"></div>

                    <div class="bg-brand-elevated rounded-xl overflow-hidden">
                        <div class="flex justify-between items-center px-6 py-4 border-b border-brand-primary/10">
                            <span class="font-semibold text-sm">Recent Trades</span>
                            <div class="flex gap-2">
                                <span class="px-4 py-1.5 rounded-full text-xs bg-brand-primary/20 text-brand-tertiary">All</span>
                                <span class="px-4 py-1.5 rounded-full text-xs text-brand-text-muted">Options</span>
                                <span class="px-4 py-1.5 rounded-full text-xs text-brand-text-muted">Stocks</span>
                            </div>
                        </div>

                        @php
                            $trades = [
                                ['symbol' => 'NVDA', 'name' => 'NVIDIA Corporation', 'type' => 'CALL', 'pnl' => '+$1,240', 'positive' => true, 'date' => 'Today'],
                                ['symbol' => 'SPY', 'name' => 'SPDR S&P 500', 'type' => 'PUT', 'pnl' => '-$380', 'positive' => false, 'date' => 'Today'],
                                ['symbol' => 'AAPL', 'name' => 'Apple Inc.', 'type' => 'CALL', 'pnl' => '+$890', 'positive' => true, 'date' => 'Yesterday'],
                                ['symbol' => 'TSLA', 'name' => 'Tesla Inc.', 'type' => 'CALL', 'pnl' => '+$2,150', 'positive' => true, 'date' => 'Yesterday'],
                            ];
                        @endphp

                        @foreach($trades as $trade)
                            <div class="grid grid-cols-[80px_1fr_80px_100px_80px] items-center px-6 py-4 border-b border-white/5 last:border-b-0 text-sm transition-colors hover:bg-brand-primary/5">
                                <div class="font-mono font-semibold">{{ $trade['symbol'] }}</div>
                                <div class="text-brand-text-muted text-xs">{{ $trade['name'] }}</div>
                                <div>
                                    <span class="px-3 py-1 rounded-full text-xs {{ $trade['type'] === 'CALL' ? 'bg-green-400/15 text-green-400' : 'bg-red-400/15 text-red-400' }}">
                                        {{ $trade['type'] }}
                                    </span>
                                </div>
                                <div class="font-mono font-medium {{ $trade['positive'] ? 'text-green-400' : 'text-red-400' }}">
                                    {{ $trade['pnl'] }}
                                </div>
                                <div class="text-brand-text-muted text-xs">{{ $trade['date'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Advanced Journaling --}}
    <section class="px-8 lg:px-16 py-24 bg-brand-card">
        <div class="max-w-7xl mx-auto">
            <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">Deep Insights</p>
            <h2 class="font-display text-3xl lg:text-4xl font-normal tracking-tight mb-4">Advanced Journaling</h2>
            <p class="text-brand-text-secondary text-lg max-w-xl leading-relaxed">
                Document your reasoning, track your mindset, and build a searchable database of trading wisdom.
            </p>

            <div class="grid lg:grid-cols-2 gap-16 items-center mt-16">
                <div class="order-2 lg:order-1 bg-gradient-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/20 rounded-3xl p-8 relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-brand-primary via-brand-secondary to-brand-glow"></div>

                    <div class="bg-brand-elevated rounded-xl p-6 space-y-6">
                        @php
                            $journalEntries = [
                                [
                                    'date' => 'Jan 28, 2026 • NVDA CALL',
                                    'title' => 'Earnings momentum play',
                                    'text' => 'Entered based on strong pre-earnings IV and bullish flow. Thesis: AI spending commentary will exceed expectations. Risk managed with 1R position size.',
                                    'tags' => ['Earnings', 'Momentum', 'Winner'],
                                ],
                                [
                                    'date' => 'Jan 27, 2026 • SPY PUT',
                                    'title' => 'FOMC hedge - stopped out',
                                    'text' => 'Mistake: Entered too early before the announcement. Should have waited for initial reaction. Lesson: Patience on event-driven trades.',
                                    'tags' => ['FOMC', 'Timing Error', 'Lesson'],
                                ],
                            ];
                        @endphp

                        @foreach($journalEntries as $entry)
                            <div class="pb-6 border-b border-brand-primary/10 last:pb-0 last:border-b-0">
                                <p class="font-mono text-xs text-brand-primary mb-2">{{ $entry['date'] }}</p>
                                <h4 class="font-semibold mb-2">{{ $entry['title'] }}</h4>
                                <p class="text-brand-text-secondary text-sm leading-relaxed mb-3">{{ $entry['text'] }}</p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($entry['tags'] as $tag)
                                        <span class="px-3 py-1 bg-brand-primary/10 border border-brand-primary/20 rounded-full text-xs text-brand-tertiary">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <h3 class="font-body text-2xl font-semibold mb-4">Capture the "Why" Behind Every Trade</h3>
                    <p class="text-brand-text-secondary leading-relaxed mb-6">
                        The best traders learn from every position. Our journaling system helps you document your thesis, track your emotions, and identify patterns in your decision-making.
                    </p>
                    <ul class="space-y-4">
                        @foreach(['Pre-trade thesis documentation', 'Post-trade reflection prompts', 'Setup and mistake tagging system', 'AI-powered pattern recognition in notes', 'Searchable journal history'] as $item)
                            <li class="flex items-start gap-3 text-brand-text-secondary">
                                <span class="text-brand-primary font-semibold mt-0.5">✓</span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- AI Analytics --}}
    <section class="px-8 lg:px-16 py-24">
        <div class="max-w-7xl mx-auto">
            <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">AI-Powered</p>
            <h2 class="font-display text-3xl lg:text-4xl font-normal tracking-tight mb-4">Intelligent Analytics</h2>
            <p class="text-brand-text-secondary text-lg max-w-xl leading-relaxed">
                Let machine learning uncover the patterns you can't see. Get actionable insights from your trading data.
            </p>

            <div class="grid lg:grid-cols-2 gap-16 items-center mt-16">
                <div>
                    <h3 class="font-body text-2xl font-semibold mb-4">Data-Driven Performance Insights</h3>
                    <p class="text-brand-text-secondary leading-relaxed mb-6">
                        Wealth Labs AI analyzes your complete trading history to surface patterns, identify strengths, and highlight areas for improvement—all personalized to your trading style.
                    </p>
                    <ul class="space-y-4">
                        @foreach(['Win rate by setup type and market condition', 'Optimal position sizing recommendations', 'Time-of-day performance analysis', 'R-multiple tracking and optimization', 'Drawdown analysis and recovery patterns'] as $item)
                            <li class="flex items-start gap-3 text-brand-text-secondary">
                                <span class="text-brand-primary font-semibold mt-0.5">✓</span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/20 rounded-3xl p-8 relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-brand-primary via-brand-secondary to-brand-glow"></div>

                    <div class="grid grid-cols-2 gap-4">
                        @php
                            $analytics = [
                                ['label' => 'Win Rate', 'value' => '68.4%', 'change' => '↑ 4.2% vs last month', 'positive' => true],
                                ['label' => 'Avg R-Multiple', 'value' => '2.3R', 'change' => '↑ 0.4R improvement', 'positive' => true],
                                ['label' => 'Profit Factor', 'value' => '3.12', 'change' => 'Excellent', 'positive' => false],
                                ['label' => 'Total Trades', 'value' => '247', 'change' => 'This month', 'positive' => false],
                            ];
                        @endphp

                        @foreach($analytics as $stat)
                            <div class="bg-brand-elevated rounded-xl p-5">
                                <p class="text-xs text-brand-text-muted mb-2">{{ $stat['label'] }}</p>
                                <p class="font-mono text-2xl font-semibold {{ $stat['positive'] ? 'text-green-400' : '' }}">{{ $stat['value'] }}</p>
                                <p class="text-xs text-green-400 mt-1">{{ $stat['change'] }}</p>
                            </div>
                        @endforeach

                        <div class="col-span-2 bg-brand-elevated rounded-xl p-5 h-40 flex items-end gap-1">
                            @for($i = 0; $i < 12; $i++)
                                <div class="flex-1 bg-gradient-to-t from-brand-primary to-brand-glow rounded-t opacity-70 transition-opacity hover:opacity-100" style="height: {{ rand(35, 95) }}%"></div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Emotional Tracking --}}
    <section class="px-8 lg:px-16 py-24 bg-brand-card">
        <div class="max-w-7xl mx-auto">
            <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">Psychology</p>
            <h2 class="font-display text-3xl lg:text-4xl font-normal tracking-tight mb-4">Emotional Insight & Discipline</h2>
            <p class="text-brand-text-secondary text-lg max-w-xl leading-relaxed">
                Track your mindset before and after trades. Discover how emotions impact your performance.
            </p>

            <div class="grid lg:grid-cols-2 gap-16 items-center mt-16">
                <div class="order-2 lg:order-1 bg-gradient-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/20 rounded-3xl p-8 relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-brand-primary via-brand-secondary to-brand-glow"></div>

                    <div class="bg-brand-elevated rounded-xl p-6">
                        <div class="flex justify-between items-center mb-6">
                            <span class="font-semibold">How are you feeling before this trade?</span>
                        </div>

                        <div class="flex gap-2 justify-center">
                            @foreach(['😰', '😟', '😐', '🙂', '😊', '🤩'] as $index => $emoji)
                                <button class="w-10 h-10 rounded-full flex items-center justify-center text-xl bg-brand-primary/10 border-2 transition-all hover:scale-110 {{ $index === 4 ? 'border-brand-primary bg-brand-primary/20' : 'border-transparent' }}">
                                    {{ $emoji }}
                                </button>
                            @endforeach
                        </div>

                        <div class="flex justify-between mt-8">
                            @php
                                $emotionStats = [
                                    ['value' => '72%', 'label' => 'Confidence'],
                                    ['value' => '+18%', 'label' => 'Win Rate When Confident'],
                                    ['value' => '2.1R', 'label' => 'Avg Win at This Level'],
                                ];
                            @endphp

                            @foreach($emotionStats as $stat)
                                <div class="text-center">
                                    <p class="font-mono text-2xl font-semibold text-brand-primary">{{ $stat['value'] }}</p>
                                    <p class="text-xs text-brand-text-muted mt-1">{{ $stat['label'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <h3 class="font-body text-2xl font-semibold mb-4">Master Your Trading Psychology</h3>
                    <p class="text-brand-text-secondary leading-relaxed mb-6">
                        Wealth Labs maps your emotional state to your trading outcomes, helping you identify when you trade best and when you should step away.
                    </p>
                    <ul class="space-y-4">
                        @foreach(['Pre-trade confidence rating', 'Emotional state tracking (fear, greed, FOMO)', 'Correlation analysis: mood vs. performance', 'Tilt detection and alerts', 'Mindfulness prompts and check-ins'] as $item)
                            <li class="flex items-start gap-3 text-brand-text-secondary">
                                <span class="text-brand-primary font-semibold mt-0.5">✓</span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Broker Integrations --}}
    <section class="px-8 lg:px-16 py-24">
        <div class="max-w-7xl mx-auto">
            <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">Connectivity</p>
            <h2 class="font-display text-3xl lg:text-4xl font-normal tracking-tight mb-4">Seamless Broker Integration</h2>
            <p class="text-brand-text-secondary text-lg max-w-xl leading-relaxed">
                Connect once and let your trades sync automatically. We support the platforms you already use.
            </p>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-12">
                @php
                    $integrations = [
                        ['icon' => '🟢', 'name' => 'Robinhood', 'desc' => 'Full options & stock sync', 'status' => 'Connected'],
                        ['icon' => '🔵', 'name' => 'Webull', 'desc' => 'Real-time trade import', 'status' => 'Connected'],
                        ['icon' => '🟣', 'name' => 'ThinkorSwim', 'desc' => 'Advanced options data', 'status' => 'Connected'],
                        ['icon' => '🔴', 'name' => 'E*TRADE', 'desc' => 'Complete portfolio sync', 'status' => 'Connected'],
                        ['icon' => '🟠', 'name' => 'Interactive Brokers', 'desc' => 'Multi-asset support', 'status' => 'Connected'],
                        ['icon' => '⚪', 'name' => 'Charles Schwab', 'desc' => 'Seamless integration', 'status' => 'Connected'],
                        ['icon' => '🟡', 'name' => 'Tastytrade', 'desc' => 'Options-focused sync', 'status' => 'Connected'],
                        ['icon' => '🔷', 'name' => 'Fidelity', 'desc' => 'Full account access', 'status' => 'Connected'],
                        ['icon' => '🏆', 'name' => 'Topstep', 'desc' => 'Futures trading sync', 'status' => 'Coming Soon'],
                        ['icon' => '📈', 'name' => 'Apex', 'desc' => 'Prop firm integration', 'status' => 'Coming Soon'],
                    ];
                @endphp

                @foreach($integrations as $integration)
                    <div class="bg-gradient-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/15 rounded-2xl p-8 text-center transition-all hover:-translate-y-1 hover:border-brand-primary/30 hover:shadow-xl hover:shadow-brand-primary/10">
                        <div class="w-16 h-16 bg-brand-elevated rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl">
                            {{ $integration['icon'] }}
                        </div>
                        <h4 class="font-semibold mb-2">{{ $integration['name'] }}</h4>
                        <p class="text-xs text-brand-text-muted mb-4">{{ $integration['desc'] }}</p>
                        <span class="inline-flex items-center gap-2 text-xs {{ $integration['status'] === 'Connected' ? 'text-green-400' : 'text-orange-400' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $integration['status'] === 'Connected' ? 'bg-green-400' : 'bg-orange-400' }}"></span>
                            {{ $integration['status'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Market Tools --}}
    <section class="px-8 lg:px-16 py-24 bg-brand-card">
        <div class="max-w-7xl mx-auto">
            <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">Market Intelligence</p>
            <h2 class="font-display text-3xl lg:text-4xl font-normal tracking-tight mb-4">Powerful Market Tools</h2>
            <p class="text-brand-text-secondary text-lg max-w-xl leading-relaxed">
                Real-time options flow, breaking news, and advanced screeners—all in one place.
            </p>

            <div class="grid lg:grid-cols-3 gap-8 mt-12">
                @php
                    $tools = [
                        ['icon' => '📊', 'title' => 'Options Flow', 'desc' => 'Track unusual options activity and smart money movements in real-time. Filter by sentiment, volume, and premium size.'],
                        ['icon' => '📰', 'title' => 'Market News', 'desc' => 'Stay informed with curated market news from trusted sources. Instant alerts on earnings, economic events, and breaking stories.'],
                        ['icon' => '🔍', 'title' => 'Stock Screener', 'desc' => 'Scan thousands of stocks with advanced filters. Volume, price action, technical indicators, and fundamentals at your fingertips.'],
                    ];
                @endphp

                @foreach($tools as $tool)
                    <div class="group bg-gradient-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/15 rounded-2xl p-8 relative overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:border-brand-primary/30 hover:shadow-2xl hover:shadow-brand-primary/15">
                        <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-brand-primary via-brand-secondary to-brand-glow opacity-0 transition-opacity group-hover:opacity-100"></div>
                        <div class="w-16 h-16 bg-gradient-to-br from-brand-primary/20 to-brand-secondary/10 border border-brand-primary/20 rounded-2xl flex items-center justify-center mb-6 text-2xl">
                            {{ $tool['icon'] }}
                        </div>
                        <h3 class="text-xl font-semibold mb-3">{{ $tool['title'] }}</h3>
                        <p class="text-brand-text-secondary text-sm leading-relaxed">{{ $tool['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Options Flow Detail --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center mt-16">
                <div>
                    <h3 class="font-body text-2xl font-semibold mb-4">Real-Time Options Flow</h3>
                    <p class="text-brand-text-secondary leading-relaxed mb-6">
                        See what the smart money is doing. Our options flow dashboard tracks unusual activity, large block trades, and sentiment shifts across the market.
                    </p>
                    <ul class="space-y-4">
                        @foreach(['Live unusual options activity feed', 'Bullish/bearish sentiment indicators', 'Premium and volume filters', 'Strike and expiry analysis'] as $item)
                            <li class="flex items-start gap-3 text-brand-text-secondary">
                                <span class="text-brand-primary font-semibold mt-0.5">✓</span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/20 rounded-3xl p-8 relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-brand-primary via-brand-secondary to-brand-glow"></div>

                    <div class="bg-brand-elevated rounded-xl p-6 overflow-hidden">
                        <div class="flex justify-between items-center mb-4 pb-4 border-b border-brand-primary/10">
                            <span class="font-semibold">Live Options Flow</span>
                            <div class="flex gap-2">
                                <button class="px-3 py-1 rounded-md text-xs bg-brand-primary text-white">All</button>
                                <button class="px-3 py-1 rounded-md text-xs bg-brand-primary/10 text-brand-text-secondary">Calls</button>
                                <button class="px-3 py-1 rounded-md text-xs bg-brand-primary/10 text-brand-text-secondary">Puts</button>
                            </div>
                        </div>

                        @php
                            $flowData = [
                                ['time' => '14:32', 'ticker' => 'NVDA', 'strike' => '$950 C', 'premium' => '$2.4M', 'sentiment' => 'Bullish', 'volume' => '12.4K'],
                                ['time' => '14:28', 'ticker' => 'SPY', 'strike' => '$480 P', 'premium' => '$1.8M', 'sentiment' => 'Bearish', 'volume' => '8.2K'],
                                ['time' => '14:25', 'ticker' => 'AAPL', 'strike' => '$200 C', 'premium' => '$980K', 'sentiment' => 'Bullish', 'volume' => '5.6K'],
                                ['time' => '14:21', 'ticker' => 'TSLA', 'strike' => '$420 C', 'premium' => '$3.1M', 'sentiment' => 'Bullish', 'volume' => '18.9K'],
                            ];
                        @endphp

                        @foreach($flowData as $flow)
                            <div class="grid grid-cols-[60px_1fr_80px_80px_60px_80px] items-center py-3 border-b border-white/5 last:border-b-0 text-xs">
                                <span class="text-brand-text-muted font-mono">{{ $flow['time'] }}</span>
                                <span class="font-semibold">{{ $flow['ticker'] }}</span>
                                <span class="text-brand-text-secondary">{{ $flow['strike'] }}</span>
                                <span class="font-mono">{{ $flow['premium'] }}</span>
                                <span class="px-2 py-0.5 rounded text-xs {{ $flow['sentiment'] === 'Bullish' ? 'bg-green-400/15 text-green-400' : 'bg-red-400/15 text-red-400' }}">
                                    {{ $flow['sentiment'] }}
                                </span>
                                <span class="font-mono text-brand-tertiary">{{ $flow['volume'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="px-8 lg:px-16 py-32 text-center relative overflow-hidden">
        <div class="absolute w-[1200px] h-[1200px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[radial-gradient(circle,rgba(168,85,247,0.12)_0%,rgba(124,58,237,0.05)_40%,transparent_60%)]"></div>

        <div class="relative z-10 max-w-2xl mx-auto">
            <h2 class="font-display text-4xl lg:text-5xl font-normal mb-6">
                Ready to Trade <em class="italic bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow bg-clip-text text-transparent">Smarter?</em>
            </h2>
            <p class="text-brand-text-secondary text-lg mb-10">
                Join thousands of traders using AI-powered insights to improve their performance and build consistent profitability.
            </p>
            <a href="{{ route('login') }}" class="inline-block px-10 py-5 rounded-full font-body font-semibold text-lg bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow text-white shadow-lg shadow-brand-primary/40 transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-brand-primary/50">
                Start Your Free Trial
            </a>
        </div>
    </section>
</x-layouts.guest>
