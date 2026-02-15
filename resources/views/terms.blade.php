<x-layouts.guest title="Terms of Service | WABS.AI - Wealth Labs Trading Journal">
    {{-- Page Hero --}}
    <section class="px-8 lg:px-16 pt-40 pb-16 text-center relative overflow-hidden">
        <div class="absolute w-[1000px] h-[1000px] -top-[400px] left-1/2 -translate-x-1/2 bg-[radial-gradient(circle,rgba(168,85,247,0.15)_0%,rgba(124,58,237,0.05)_40%,transparent_70%)] animate-pulse-glow"></div>

        <div class="relative z-10 max-w-4xl mx-auto">
            <div class="inline-block px-5 py-2 bg-brand-primary/15 border border-brand-primary/30 rounded-full font-mono text-xs text-brand-tertiary mb-8 animate-fade-in-up">
                Legal
            </div>
            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-normal leading-tight mb-6 tracking-tight animate-fade-in-up animation-delay-100">
                Terms of <em class="italic bg-gradient-to-br from-brand-primary via-brand-secondary to-brand-glow bg-clip-text text-transparent">Service</em>
            </h1>
            <p class="text-brand-text-secondary max-w-xl mx-auto leading-relaxed animate-fade-in-up animation-delay-200">
                Please read these terms carefully before using our services.
            </p>
        </div>
    </section>

    {{-- Terms Content --}}
    <section class="px-8 lg:px-16 pb-24">
        <div class="max-w-3xl mx-auto space-y-6">
            @php
                $sections = [
                    [
                        'number' => '1',
                        'title' => 'Acceptance of Terms',
                        'content' => 'By accessing or using Wealth Labs services, you agree to be bound by these Terms of Service, our Privacy Policy, and any additional posted guidelines. We may update these Terms at any time, and continued use constitutes acceptance.',
                    ],
                    [
                        'number' => '2',
                        'title' => 'Eligibility',
                        'content' => 'You must be at least 18 years old to use our Services. You agree to provide accurate registration information and maintain account security.',
                    ],
                    [
                        'number' => '3',
                        'title' => 'Professional Trader Certification',
                        'content' => 'By using Wealth Labs, you certify you are <strong class="text-brand-text">not</strong> a professional trader, are using the services for personal trading only, and do not trade for institutions or receive compensation for managing others\' trades. If your status changes, you must notify us immediately.',
                    ],
                    [
                        'number' => '4',
                        'title' => 'Subscription & Billing',
                        'content' => 'All purchases are final. Subscriptions auto-renew unless canceled at least 24 hours before renewal. Free trials convert to paid subscriptions unless canceled. Only one trial period is allowed every 6 months.',
                    ],
                    [
                        'number' => '5',
                        'title' => 'Permitted Use',
                        'content' => 'Wealth Labs grants you a limited license for personal use only. You may not copy, distribute, automate, scrape, resell, or redistribute our services or data. Account sharing is strictly prohibited; violations may result in suspension without refund.',
                    ],
                    [
                        'number' => '6',
                        'title' => 'Prohibited Conduct',
                        'list' => [
                            'Employ services for unlawful or fraudulent purposes',
                            'Manipulate markets or breach securities laws',
                            'Harass other users on the platform',
                            'Promote competing services on the platform',
                        ],
                    ],
                    [
                        'number' => '7',
                        'title' => 'Market Data Disclaimer',
                        'content' => 'Wealth Labs is <strong class="text-brand-text">not</strong> a registered investment adviser. All AI-generated insights are for educational purposes only. You are solely responsible for all trading decisions.',
                    ],
                    [
                        'number' => '8',
                        'title' => 'Third-Party Services',
                        'content' => 'The platform integrates with brokers and third-party vendors but bears no responsibility for their errors, outages, or service disruptions.',
                    ],
                    [
                        'number' => '9',
                        'title' => 'Service Availability',
                        'content' => 'The Services are provided "as is" and "as available." We do not guarantee uninterrupted or error-free operation.',
                    ],
                    [
                        'number' => '10',
                        'title' => 'Intellectual Property',
                        'content' => 'All platform content, features, software, and trademarks belong to the company or its licensors. Unauthorized use is strictly prohibited.',
                    ],
                    [
                        'number' => '11',
                        'title' => 'Privacy & Data',
                        'content' => 'Data processing follows our Privacy Policy and applicable regulations including GDPR and CCPA.',
                    ],
                    [
                        'number' => '12',
                        'title' => 'Limitation of Liability',
                        'content' => 'Liability excludes indirect, incidental, or consequential damages and is capped at $1,000 or the total fees paid within the preceding 12 months, whichever is less.',
                    ],
                    [
                        'number' => '13',
                        'title' => 'Indemnification',
                        'content' => 'Users agree to indemnify and hold harmless the company from any claims, damages, or expenses arising from service use or violations of these Terms.',
                    ],
                    [
                        'number' => '14',
                        'title' => 'Termination',
                        'content' => 'Accounts may be suspended or terminated for violations, fraud, or payment failures without refund of any prepaid fees.',
                    ],
                    [
                        'number' => '15',
                        'title' => 'Governing Law',
                        'content' => 'These Terms are governed by the laws of the State of New York. Disputes will be resolved through binding arbitration.',
                    ],
                ];
            @endphp

            <div x-data="{ open: null }" class="space-y-4">
                @foreach ($sections as $index => $section)
                    <div class="bg-gradient-to-br from-brand-primary/5 to-brand-secondary/5 border border-brand-primary/10 rounded-2xl overflow-hidden transition-all" :class="open === {{ $index }} ? 'border-brand-primary/25' : 'hover:border-brand-primary/20'">
                        <button
                            type="button"
                            @click="open = open === {{ $index }} ? null : {{ $index }}"
                            class="flex items-center gap-4 w-full p-6 lg:px-8 text-left cursor-pointer"
                        >
                            <span class="shrink-0 w-9 h-9 rounded-lg bg-brand-primary/15 flex items-center justify-center font-mono text-sm font-semibold text-brand-tertiary">
                                {{ $section['number'] }}
                            </span>
                            <h2 class="font-body text-lg font-semibold flex-1">{{ $section['title'] }}</h2>
                            <span
                                class="shrink-0 w-8 h-8 rounded-full bg-brand-primary/15 flex items-center justify-center text-brand-tertiary transition-transform duration-300"
                                :class="open === {{ $index }} ? 'rotate-45' : ''"
                            >
                                +
                            </span>
                        </button>
                        <div x-show="open === {{ $index }}" x-collapse>
                            <div class="px-6 lg:px-8 pb-6 lg:pb-8 pl-[4.75rem] lg:pl-[5.25rem]">
                                @if (isset($section['content']))
                                    <p class="text-brand-text-secondary text-sm leading-relaxed">{!! $section['content'] !!}</p>
                                @endif

                                @if (isset($section['list']))
                                    <ul class="space-y-2">
                                        @foreach ($section['list'] as $item)
                                            <li class="flex items-start gap-2.5 text-sm text-brand-text-secondary">
                                                <span class="text-brand-primary mt-1">&#8226;</span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Risk Disclaimer --}}
            <div class="bg-red-500/10 border border-red-500/20 rounded-2xl p-6 lg:p-8">
                <div class="flex items-start gap-4">
                    <span class="shrink-0 w-9 h-9 rounded-lg bg-red-500/15 flex items-center justify-center text-red-400">
                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                    </span>
                    <div>
                        <h2 class="font-body text-lg font-semibold text-red-400 mb-3">Risk Disclaimer</h2>
                        <p class="text-brand-text-secondary text-sm leading-relaxed">
                            Trading involves substantial risk of loss. Wealth Labs is NOT a registered investment adviser. Services are provided "as is" without guarantees. Past performance does not guarantee future results.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.guest>
