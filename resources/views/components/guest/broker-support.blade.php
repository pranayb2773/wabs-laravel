<?php

use App\Enums\BrokerType;
use App\Models\Broker;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.guest'), Title('Support Brokers')] class extends Component {
    public string $search = '';

    #[Computed]
    public function brokers(): Collection
    {
        return Broker::query()
            ->with('brokerTypes')
            ->when($this->search !== '', fn ($query) => $query->where('name', 'like', "%{$this->search}%"))
            ->orderBy('name')
            ->get();
    }
}; ?>

<div>
    {{-- Hero Section --}}
    <section class="px-8 lg:px-16 pt-40 pb-20 text-center relative overflow-hidden">
        <div
            class="absolute w-250 h-250 -top-105 left-1/2 -translate-x-1/2 bg-[radial-gradient(circle,rgba(168,85,247,0.15)_0%,rgba(124,58,237,0.05)_40%,transparent_70%)] animate-pulse-glow"
        ></div>

        <div class="relative z-10 max-w-4xl mx-auto">
            <div
                class="inline-block px-5 py-2 bg-brand-primary/15 border border-brand-primary/30 rounded-full font-mono text-xs text-brand-tertiary mb-8 animate-fade-in-up"
            >
                Brokerage Integrations
            </div>
            <h1
                class="font-display text-4xl sm:text-5xl lg:text-6xl font-normal leading-tight mb-6 tracking-tight animate-fade-in-up animation-delay-100"
            >
                Broker
                <em
                    class="italic bg-linear-to-br from-brand-primary via-brand-secondary to-brand-glow bg-clip-text text-transparent"
                >
                    Analytics
                </em>
            </h1>
            <p
                class="text-xl text-brand-text-secondary max-w-2xl mx-auto leading-relaxed animate-fade-in-up animation-delay-200"
            >
                Connect your broker, auto-sync your account, or upload a quick file to add trades seamlessly into Wealth
                Labs.
            </p>
        </div>
    </section>

    {{-- Broker Logos Marquee --}}
    <section class="px-8 py-16 border-t border-b border-brand-primary/10 overflow-hidden bg-brand-card/50">
        <p class="text-center text-xs text-brand-text-muted uppercase tracking-widest mb-8">
            Seamless integration with leading brokerages
        </p>
        <div class="flex gap-16 animate-marquee">
            @foreach ($this->brokers->merge($this->brokers) as $broker)
                <div class="flex items-center gap-3 shrink-0">
                    @if ($broker->logo)
                        <img
                            src="{{ asset($broker->logo) }}"
                            alt="{{ $broker->name }}"
                            class="h-6 w-auto object-contain opacity-60"
                        />
                    @endif

                    <span
                        class="font-body font-semibold text-lg text-brand-text-muted whitespace-nowrap opacity-50 transition-all hover:opacity-100 hover:text-brand-tertiary"
                    >
                        {{ $broker->name }}
                    </span>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Brokers Section with Search + Tabs --}}
    <section class="px-8 lg:px-16 py-24" x-data="{ view: 'grid' }">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-4">All Brokers</p>
                <h2 class="font-display text-3xl lg:text-4xl font-normal tracking-tight">Supported Broker Partners</h2>
            </div>

            {{-- Search + View Toggle --}}
            <div class="flex flex-col sm:flex-row items-center gap-4 mb-8">
                <div class="relative w-full sm:max-w-sm">
                    <flux:icon
                        name="magnifying-glass"
                        variant="mini"
                        class="absolute left-3 top-1/2 -translate-y-1/2 size-4 text-brand-text-muted pointer-events-none"
                    />
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search brokers..."
                        class="w-full rounded-xl border border-brand-primary/20 bg-brand-elevated py-2.5 pl-10 pr-9 text-sm text-brand-text placeholder-brand-text-muted/50 outline-none transition-colors focus:border-brand-primary/50 focus:ring-1 focus:ring-brand-primary/25"
                    />
                    @if ($search !== '')
                        <button
                            type="button"
                            wire:click="$set('search', '')"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-brand-text-muted hover:text-brand-text transition-colors"
                        >
                            <flux:icon name="x-mark" variant="mini" class="size-4" />
                        </button>
                    @endif
                </div>

                <div class="sm:ml-auto flex gap-1 rounded-xl border border-brand-primary/20 bg-brand-elevated p-1">
                    <button
                        type="button"
                        x-on:click="view = 'grid'"
                        :class="view === 'grid' ? 'bg-brand-primary/20 text-brand-tertiary' : 'text-brand-text-muted hover:text-brand-text'"
                        class="flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-semibold transition-all"
                    >
                        <flux:icon name="squares-2x2" variant="mini" class="size-4" />
                        Grid
                    </button>
                    <button
                        type="button"
                        x-on:click="view = 'list'"
                        :class="view === 'list' ? 'bg-brand-primary/20 text-brand-tertiary' : 'text-brand-text-muted hover:text-brand-text'"
                        class="flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-semibold transition-all"
                    >
                        <flux:icon name="list-bullet" variant="mini" class="size-4" />
                        List
                    </button>
                </div>
            </div>

            {{-- Grid View --}}
            <div x-show="view === 'grid'" x-cloak>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($this->brokers as $broker)
                        <article
                            wire:key="grid-{{ $broker->id }}"
                            wire:transition
                            class="group bg-linear-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/15 rounded-2xl p-6 transition-all hover:-translate-y-1 hover:border-brand-primary/30 hover:shadow-lg hover:shadow-brand-primary/10 relative overflow-hidden"
                        >
                            <div
                                class="absolute top-0 left-0 right-0 h-0.5 bg-linear-to-r from-brand-primary via-brand-secondary to-brand-glow opacity-0 transition-opacity group-hover:opacity-100"
                            ></div>

                            <div class="flex items-center gap-4 mb-5">
                                @if ($broker->logo)
                                    <div
                                        class="size-12 shrink-0 rounded-xl bg-white/10 border border-brand-primary/15 flex items-center justify-center p-2"
                                    >
                                        <img
                                            src="{{ asset($broker->logo) }}"
                                            alt="{{ $broker->name }}"
                                            class="max-h-8 w-auto object-contain"
                                        />
                                    </div>
                                @endif

                                <flux:heading size="lg">{{ $broker->name }}</flux:heading>
                            </div>

                            @if ($broker->description)
                                <flux:text class="text-sm text-brand-text-secondary leading-relaxed mb-5">
                                    {{ $broker->description }}
                                </flux:text>
                            @endif

                            <div class="flex flex-wrap gap-1.5 mb-5">
                                @foreach ($broker->brokerTypes as $brokerType)
                                    <flux:badge
                                        size="sm"
                                        :color="$brokerType->type->getColor()"
                                        :icon="$brokerType->type->getIcon()"
                                    >
                                        {{ $brokerType->type->getLabel() }}
                                    </flux:badge>
                                @endforeach
                            </div>

                            <div class="grid grid-cols-2 gap-2 text-xs">
                                <div class="rounded-lg border border-brand-primary/20 bg-brand-elevated px-3 py-2">
                                    <flux:text class="text-brand-text-muted text-xs">File Upload</flux:text>
                                    <p
                                        class="mt-1 font-semibold {{ $broker->is_file_upload ? 'text-emerald-400' : 'text-amber-300' }}"
                                    >
                                        {{ $broker->is_file_upload ? 'Available' : 'Coming Soon' }}
                                    </p>
                                </div>
                                <div class="rounded-lg border border-brand-primary/20 bg-brand-elevated px-3 py-2">
                                    <flux:text class="text-brand-text-muted text-xs">Auto Sync</flux:text>
                                    <p
                                        class="mt-1 font-semibold {{ $broker->is_auto_sync ? 'text-emerald-400' : 'text-amber-300' }}"
                                    >
                                        {{ $broker->is_auto_sync ? 'Available' : 'Coming Soon' }}
                                    </p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if ($search !== '' && $this->brokers->isEmpty())
                    <div class="text-center py-16">
                        <flux:icon name="magnifying-glass" class="size-12 text-brand-text-muted mx-auto mb-4" />
                        <flux:heading size="lg">No brokers found</flux:heading>
                        <flux:text class="text-brand-text-secondary mt-2">
                            Try a different search term or browse all brokers.
                        </flux:text>
                    </div>
                @endif
            </div>

            {{-- List View --}}
            <div x-show="view === 'list'" x-cloak>
                <div
                    class="bg-linear-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/15 rounded-2xl overflow-hidden"
                >
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-brand-primary/15">
                                <th
                                    class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-brand-text-muted"
                                >
                                    Broker
                                </th>
                                <th
                                    class="px-5 py-3.5 text-center text-xs font-semibold uppercase tracking-wider text-blue-300 w-24"
                                >
                                    Stocks
                                </th>
                                <th
                                    class="px-5 py-3.5 text-center text-xs font-semibold uppercase tracking-wider text-violet-300 w-24"
                                >
                                    Options
                                </th>
                                <th
                                    class="px-5 py-3.5 text-center text-xs font-semibold uppercase tracking-wider text-emerald-300 w-24"
                                >
                                    Futures
                                </th>
                                <th
                                    class="px-5 py-3.5 text-center text-xs font-semibold uppercase tracking-wider text-brand-text-muted w-32"
                                >
                                    File Upload
                                </th>
                                <th
                                    class="px-5 py-3.5 text-center text-xs font-semibold uppercase tracking-wider text-brand-text-muted w-32"
                                >
                                    Auto Sync
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-brand-primary/10">
                            @foreach ($this->brokers as $broker)
                                @php
                                    $types = $broker->brokerTypes
                                        ->pluck('type')
                                        ->map(fn ($t) => $t->value)
                                        ->all();
                                @endphp

                                <tr
                                    wire:key="list-{{ $broker->id }}"
                                    wire:transition
                                    class="transition-colors hover:bg-brand-primary/5"
                                >
                                    <td class="px-5 py-3.5">
                                        <div class="flex items-center gap-3">
                                            @if ($broker->logo)
                                                <div
                                                    class="size-8 shrink-0 rounded-lg bg-white/10 border border-brand-primary/15 flex items-center justify-center p-1"
                                                >
                                                    <img
                                                        src="{{ asset($broker->logo) }}"
                                                        alt="{{ $broker->name }}"
                                                        class="max-h-6 w-auto object-contain"
                                                    />
                                                </div>
                                            @endif

                                            <span class="font-medium text-brand-text">{{ $broker->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3.5 text-center">
                                        @if (in_array('stocks', $types))
                                            <span
                                                class="inline-flex items-center justify-center size-6 rounded-full bg-blue-500/15"
                                            >
                                                <flux:icon name="check" variant="mini" class="text-blue-400" />
                                            </span>
                                        @else
                                            <span class="text-brand-text-muted">&mdash;</span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-3.5 text-center">
                                        @if (in_array('options', $types))
                                            <span
                                                class="inline-flex items-center justify-center size-6 rounded-full bg-violet-500/15"
                                            >
                                                <flux:icon name="check" variant="mini" class="text-violet-400" />
                                            </span>
                                        @else
                                            <span class="text-brand-text-muted">&mdash;</span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-3.5 text-center">
                                        @if (in_array('futures', $types))
                                            <span
                                                class="inline-flex items-center justify-center size-6 rounded-full bg-emerald-500/15"
                                            >
                                                <flux:icon name="check" variant="mini" class="text-emerald-400" />
                                            </span>
                                        @else
                                            <span class="text-brand-text-muted">&mdash;</span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-3.5 text-center">
                                        @if ($broker->is_file_upload)
                                            <flux:badge size="sm" color="green">Available</flux:badge>
                                        @else
                                            <flux:badge size="sm" color="yellow">Coming Soon</flux:badge>
                                        @endif
                                    </td>
                                    <td class="px-5 py-3.5 text-center">
                                        @if ($broker->is_auto_sync)
                                            <flux:badge size="sm" color="green">Available</flux:badge>
                                        @else
                                            <flux:badge size="sm" color="yellow">Coming Soon</flux:badge>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            @if ($search !== '' && $this->brokers->isEmpty())
                                <tr>
                                    <td colspan="6" class="px-5 py-16 text-center">
                                        <flux:icon name="magnifying-glass" class="size-12 text-brand-text-muted mx-auto mb-4" />
                                        <flux:heading size="lg">No brokers found</flux:heading>
                                        <flux:text class="text-brand-text-secondary mt-2">
                                            Try a different search term or browse all brokers.
                                        </flux:text>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Strip --}}
    <section class="px-8 lg:px-16 pb-24">
        <div class="max-w-7xl mx-auto">
            <div
                class="bg-linear-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/20 rounded-3xl p-8 lg:p-10"
            >
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-brand-elevated rounded-xl p-5">
                        <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-2">Broker Count</p>
                        <p class="font-display text-4xl leading-none">{{ $this->brokers->count() }}+</p>
                        <flux:text class="text-brand-text-secondary text-sm mt-2">
                            Supported broker platforms and prop firms
                        </flux:text>
                    </div>
                    <div class="bg-brand-elevated rounded-xl p-5">
                        <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-2">
                            Import Methods
                        </p>
                        <p class="font-display text-4xl leading-none">2</p>
                        <flux:text class="text-brand-text-secondary text-sm mt-2">
                            Auto sync and statement upload support
                        </flux:text>
                    </div>
                    <div class="bg-brand-elevated rounded-xl p-5">
                        <p class="font-mono text-xs text-brand-primary uppercase tracking-widest mb-2">Market Types</p>
                        <p class="font-display text-4xl leading-none">3</p>
                        <flux:text class="text-brand-text-secondary text-sm mt-2">
                            Options, stocks, and futures coverage
                        </flux:text>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="px-8 lg:px-16 pb-32">
        <div class="max-w-3xl mx-auto">
            <div
                class="bg-linear-to-br from-brand-primary/10 to-brand-secondary/5 border border-brand-primary/20 rounded-3xl p-8 lg:p-12 text-center"
            >
                <h2 class="font-display text-3xl lg:text-4xl font-normal mb-4">
                    Didn't spot your
                    <em
                        class="italic bg-linear-to-br from-brand-primary via-brand-secondary to-brand-glow bg-clip-text text-transparent"
                    >
                        broker?
                    </em>
                </h2>
                <flux:text class="text-brand-text-secondary max-w-lg mx-auto mb-8">
                    Tell us which broker or integration you want &mdash; just submit this form and we'll review it for
                    Wealth Labs.
                </flux:text>

                <form class="grid sm:grid-cols-2 gap-4 text-left max-w-lg mx-auto">
                    <flux:input label="Full name" placeholder="Your name" />
                    <flux:input label="Email address" type="email" placeholder="you@example.com" />
                    <div class="sm:col-span-2">
                        <flux:textarea
                            label="Broker"
                            placeholder="Which broker would you like us to support?"
                            rows="3"
                        />
                    </div>
                    <div class="sm:col-span-2">
                        <flux:button
                            type="submit"
                            variant="primary"
                            class="w-full bg-linear-to-br from-brand-primary via-brand-secondary to-brand-glow shadow-lg shadow-brand-primary/35"
                        >
                            Send
                        </flux:button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
