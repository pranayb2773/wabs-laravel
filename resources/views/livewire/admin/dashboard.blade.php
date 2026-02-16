<div>
    <div class="flex flex-col gap-4">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('Home') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>{{ __('Dashboard') }}</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <div class="flex items-center justify-between">
            <flux:heading size="xl">{{ __('Dashboard') }}</flux:heading>
        </div>

        @php($userTotal = max($this->totalUsers, 1))
        @php($brokerTotal = max($this->totalBrokers, 1))

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-4">
            <section class="rounded-2xl border border-zinc-200/80 bg-linear-to-br from-white to-zinc-50 p-4 shadow-xs dark:border-zinc-800 dark:from-zinc-900 dark:to-zinc-900/70">
                <div class="flex items-center justify-between gap-3">
                    <flux:text size="sm" class="font-medium text-zinc-600 dark:text-zinc-300">Total Users</flux:text>
                    <div class="grid size-8 place-items-center rounded-lg bg-zinc-100 text-zinc-700 dark:bg-zinc-800 dark:text-zinc-200">
                        <flux:icon name="users" variant="mini" />
                    </div>
                </div>
                <flux:heading size="xl" class="mt-2 tabular-nums text-zinc-900 dark:text-zinc-100">{{ $this->totalUsers }}</flux:heading>
                <flux:text size="sm" class="mt-1 text-zinc-500 dark:text-zinc-400">Registered accounts</flux:text>
            </section>

            <section class="rounded-2xl border border-emerald-200/70 bg-linear-to-br from-emerald-50 to-white p-4 shadow-xs dark:border-emerald-800/60 dark:from-emerald-950/40 dark:to-zinc-900">
                <div class="flex items-center justify-between gap-3">
                    <flux:text size="sm" class="font-medium text-emerald-700 dark:text-emerald-300">Active Users</flux:text>
                    <div class="grid size-8 place-items-center rounded-lg bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300">
                        <flux:icon name="check-circle" variant="mini" />
                    </div>
                </div>
                <div class="mt-2 flex items-end justify-between gap-2">
                    <flux:heading size="xl" class="tabular-nums text-emerald-700 dark:text-emerald-300">{{ $this->activeUsers }}</flux:heading>
                    <flux:badge size="sm" color="green" variant="pill">
                        {{ (int) round(($this->activeUsers / $userTotal) * 100) }}%
                    </flux:badge>
                </div>
                <div class="mt-2 h-1.5 rounded-full bg-emerald-100 dark:bg-emerald-900/35">
                    <div class="h-1.5 rounded-full bg-emerald-500" style="width: {{ (int) round(($this->activeUsers / $userTotal) * 100) }}%"></div>
                </div>
            </section>

            <section class="rounded-2xl border border-amber-200/70 bg-linear-to-br from-amber-50 to-white p-4 shadow-xs dark:border-amber-800/60 dark:from-amber-950/35 dark:to-zinc-900">
                <div class="flex items-center justify-between gap-3">
                    <flux:text size="sm" class="font-medium text-amber-700 dark:text-amber-300">Pending Users</flux:text>
                    <div class="grid size-8 place-items-center rounded-lg bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300">
                        <flux:icon name="clock" variant="mini" />
                    </div>
                </div>
                <div class="mt-2 flex items-end justify-between gap-2">
                    <flux:heading size="xl" class="tabular-nums text-amber-700 dark:text-amber-300">{{ $this->pendingUsers }}</flux:heading>
                    <flux:badge size="sm" color="amber" variant="pill">
                        {{ (int) round(($this->pendingUsers / $userTotal) * 100) }}%
                    </flux:badge>
                </div>
                <div class="mt-2 h-1.5 rounded-full bg-amber-100 dark:bg-amber-900/35">
                    <div class="h-1.5 rounded-full bg-amber-500" style="width: {{ (int) round(($this->pendingUsers / $userTotal) * 100) }}%"></div>
                </div>
            </section>

            <section class="rounded-2xl border border-rose-200/70 bg-linear-to-br from-rose-50 to-white p-4 shadow-xs dark:border-rose-800/60 dark:from-rose-950/35 dark:to-zinc-900">
                <div class="flex items-center justify-between gap-3">
                    <flux:text size="sm" class="font-medium text-rose-700 dark:text-rose-300">Blocked Users</flux:text>
                    <div class="grid size-8 place-items-center rounded-lg bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-300">
                        <flux:icon name="x-circle" variant="mini" />
                    </div>
                </div>
                <div class="mt-2 flex items-end justify-between gap-2">
                    <flux:heading size="xl" class="tabular-nums text-rose-700 dark:text-rose-300">{{ $this->blockedUsers }}</flux:heading>
                    <flux:badge size="sm" color="red" variant="pill">
                        {{ (int) round(($this->blockedUsers / $userTotal) * 100) }}%
                    </flux:badge>
                </div>
                <div class="mt-2 h-1.5 rounded-full bg-rose-100 dark:bg-rose-900/35">
                    <div class="h-1.5 rounded-full bg-rose-500" style="width: {{ (int) round(($this->blockedUsers / $userTotal) * 100) }}%"></div>
                </div>
            </section>
        </div>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-4">
            <section class="rounded-2xl border border-zinc-200/80 bg-linear-to-br from-white to-zinc-50 p-4 shadow-xs dark:border-zinc-800 dark:from-zinc-900 dark:to-zinc-900/70">
                <div class="flex items-center justify-between gap-3">
                    <flux:text size="sm" class="font-medium text-zinc-600 dark:text-zinc-300">Total Brokers</flux:text>
                    <div class="grid size-8 place-items-center rounded-lg bg-zinc-100 text-zinc-700 dark:bg-zinc-800 dark:text-zinc-200">
                        <flux:icon name="building-library" variant="mini" />
                    </div>
                </div>
                <flux:heading size="xl" class="mt-2 tabular-nums text-zinc-900 dark:text-zinc-100">{{ $this->totalBrokers }}</flux:heading>
                <flux:text size="sm" class="mt-1 text-zinc-500 dark:text-zinc-400">Listed brokers</flux:text>
            </section>

            <section class="rounded-2xl border border-violet-200/70 bg-linear-to-br from-violet-50 to-white p-4 shadow-xs dark:border-violet-800/60 dark:from-violet-950/35 dark:to-zinc-900">
                <div class="flex items-center justify-between gap-3">
                    <flux:text size="sm" class="font-medium text-violet-700 dark:text-violet-300">Options Brokers</flux:text>
                    <div class="grid size-8 place-items-center rounded-lg bg-violet-100 text-violet-700 dark:bg-violet-900/40 dark:text-violet-300">
                        <flux:icon name="adjustments-horizontal" variant="mini" />
                    </div>
                </div>
                <div class="mt-2 flex items-end justify-between gap-2">
                    <flux:heading size="xl" class="tabular-nums text-violet-700 dark:text-violet-300">{{ $this->brokersWithOptions }}</flux:heading>
                    <flux:badge size="sm" color="violet" variant="pill">
                        {{ (int) round(($this->brokersWithOptions / $brokerTotal) * 100) }}%
                    </flux:badge>
                </div>
                <div class="mt-2 h-1.5 rounded-full bg-violet-100 dark:bg-violet-900/35">
                    <div class="h-1.5 rounded-full bg-violet-500" style="width: {{ (int) round(($this->brokersWithOptions / $brokerTotal) * 100) }}%"></div>
                </div>
            </section>

            <section class="rounded-2xl border border-sky-200/70 bg-linear-to-br from-sky-50 to-white p-4 shadow-xs dark:border-sky-800/60 dark:from-sky-950/35 dark:to-zinc-900">
                <div class="flex items-center justify-between gap-3">
                    <flux:text size="sm" class="font-medium text-sky-700 dark:text-sky-300">Stocks Brokers</flux:text>
                    <div class="grid size-8 place-items-center rounded-lg bg-sky-100 text-sky-700 dark:bg-sky-900/40 dark:text-sky-300">
                        <flux:icon name="chart-bar" variant="mini" />
                    </div>
                </div>
                <div class="mt-2 flex items-end justify-between gap-2">
                    <flux:heading size="xl" class="tabular-nums text-sky-700 dark:text-sky-300">{{ $this->brokersWithStocks }}</flux:heading>
                    <flux:badge size="sm" color="blue" variant="pill">
                        {{ (int) round(($this->brokersWithStocks / $brokerTotal) * 100) }}%
                    </flux:badge>
                </div>
                <div class="mt-2 h-1.5 rounded-full bg-sky-100 dark:bg-sky-900/35">
                    <div class="h-1.5 rounded-full bg-sky-500" style="width: {{ (int) round(($this->brokersWithStocks / $brokerTotal) * 100) }}%"></div>
                </div>
            </section>

            <section class="rounded-2xl border border-emerald-200/70 bg-linear-to-br from-emerald-50 to-white p-4 shadow-xs dark:border-emerald-800/60 dark:from-emerald-950/35 dark:to-zinc-900">
                <div class="flex items-center justify-between gap-3">
                    <flux:text size="sm" class="font-medium text-emerald-700 dark:text-emerald-300">Futures Brokers</flux:text>
                    <div class="grid size-8 place-items-center rounded-lg bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300">
                        <flux:icon name="arrow-trending-up" variant="mini" />
                    </div>
                </div>
                <div class="mt-2 flex items-end justify-between gap-2">
                    <flux:heading size="xl" class="tabular-nums text-emerald-700 dark:text-emerald-300">{{ $this->brokersWithFutures }}</flux:heading>
                    <flux:badge size="sm" color="emerald" variant="pill">
                        {{ (int) round(($this->brokersWithFutures / $brokerTotal) * 100) }}%
                    </flux:badge>
                </div>
                <div class="mt-2 h-1.5 rounded-full bg-emerald-100 dark:bg-emerald-900/35">
                    <div class="h-1.5 rounded-full bg-emerald-500" style="width: {{ (int) round(($this->brokersWithFutures / $brokerTotal) * 100) }}%"></div>
                </div>
            </section>
        </div>

        <div class="grid grid-cols-1 gap-4 xl:grid-cols-3">
            <section class="overflow-hidden rounded-2xl border border-zinc-200/80 bg-white shadow-xs dark:border-zinc-800 dark:bg-zinc-900">
                <div class="border-b border-zinc-200/80 px-4 py-3 dark:border-zinc-800">
                    <flux:heading size="sm">User Status Distribution</flux:heading>
                    <flux:text size="sm" class="text-zinc-600 dark:text-zinc-400">Current status mix across users</flux:text>
                </div>

                <div class="p-4">
                    <flux:chart class="h-52" :value="$this->userStatusChart">
                        <flux:chart.svg>
                            <flux:chart.axis axis="x" field="label">
                                <flux:chart.axis.line />
                                <flux:chart.axis.tick />
                            </flux:chart.axis>

                            <flux:chart.axis axis="y" field="value">
                                <flux:chart.axis.grid />
                                <flux:chart.axis.tick />
                            </flux:chart.axis>

                            <flux:chart.area field="value" class="text-emerald-500/15" />
                            <flux:chart.line field="value" class="text-emerald-500" />
                            <flux:chart.point field="value" class="text-emerald-500" />
                        </flux:chart.svg>

                        <flux:chart.cursor />

                        <flux:chart.tooltip>
                            <flux:chart.tooltip.heading field="label" />
                            <flux:chart.tooltip.value label="Users" field="value" />
                            <flux:chart.tooltip.value label="Share" field="percentage" />
                        </flux:chart.tooltip>
                    </flux:chart>
                </div>
            </section>

            <section class="overflow-hidden rounded-2xl border border-zinc-200/80 bg-white shadow-xs dark:border-zinc-800 dark:bg-zinc-900">
                <div class="border-b border-zinc-200/80 px-4 py-3 dark:border-zinc-800">
                    <flux:heading size="sm">Broker Type Coverage</flux:heading>
                    <flux:text size="sm" class="text-zinc-600 dark:text-zinc-400">Brokers supporting each market type</flux:text>
                </div>

                <div class="p-4">
                    <flux:chart class="h-52" :value="$this->brokerTypeChart">
                        <flux:chart.svg>
                            <flux:chart.axis axis="x" field="label">
                                <flux:chart.axis.line />
                                <flux:chart.axis.tick />
                            </flux:chart.axis>

                            <flux:chart.axis axis="y" field="value">
                                <flux:chart.axis.grid />
                                <flux:chart.axis.tick />
                            </flux:chart.axis>

                            <flux:chart.area field="value" class="text-sky-500/15" />
                            <flux:chart.line field="value" class="text-sky-500" />
                            <flux:chart.point field="value" class="text-sky-500" />
                        </flux:chart.svg>

                        <flux:chart.cursor />

                        <flux:chart.tooltip>
                            <flux:chart.tooltip.heading field="label" />
                            <flux:chart.tooltip.value label="Brokers" field="value" />
                            <flux:chart.tooltip.value label="Coverage" field="percentage" />
                        </flux:chart.tooltip>
                    </flux:chart>
                </div>
            </section>

            <section class="overflow-hidden rounded-2xl border border-zinc-200/80 bg-white shadow-xs dark:border-zinc-800 dark:bg-zinc-900">
                <div class="border-b border-zinc-200/80 px-4 py-3 dark:border-zinc-800">
                    <flux:heading size="sm">Health Widgets</flux:heading>
                    <flux:text size="sm" class="text-zinc-600 dark:text-zinc-400">Quick system quality indicators</flux:text>
                </div>

                <div class="grid grid-cols-1 gap-3 p-4">
                    <div class="rounded-xl border border-zinc-200/80 bg-zinc-50/70 p-3 dark:border-zinc-700 dark:bg-zinc-800/40">
                        <div class="flex items-center justify-between">
                            <flux:text size="sm" class="text-zinc-600 dark:text-zinc-400">Verified Users</flux:text>
                            <flux:badge color="green" size="sm" icon="check-badge">{{ $this->verifiedUsersPercentage }}%</flux:badge>
                        </div>
                        <div class="mt-2 h-2 rounded-full bg-zinc-200 dark:bg-zinc-700">
                            <div
                                class="h-2 rounded-full bg-green-500"
                                style="width: {{ max($this->verifiedUsersPercentage, 0) }}%;"
                            ></div>
                        </div>
                    </div>

                    <div class="rounded-xl border border-zinc-200/80 bg-zinc-50/70 p-3 dark:border-zinc-700 dark:bg-zinc-800/40">
                        <div class="flex items-center justify-between">
                            <flux:text size="sm" class="text-zinc-600 dark:text-zinc-400">Brokers with Logo</flux:text>
                            <flux:badge color="blue" size="sm" icon="photo">{{ $this->brokersWithLogoCount }}</flux:badge>
                        </div>
                        <flux:text class="mt-1 text-zinc-700 dark:text-zinc-300">out of {{ $this->totalBrokers }} brokers</flux:text>
                    </div>

                    <div class="rounded-xl border border-zinc-200/80 bg-zinc-50/70 p-3 dark:border-zinc-700 dark:bg-zinc-800/40">
                        <div class="mb-2 flex items-center justify-between">
                            <flux:text size="sm" class="text-zinc-600 dark:text-zinc-400">7-Day Activity</flux:text>
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-1">
                                    <span class="inline-block size-2 rounded-full bg-emerald-500"></span>
                                    <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400">Users</flux:text>
                                </div>
                                <div class="flex items-center gap-1">
                                    <span class="inline-block size-2 rounded-full bg-sky-500"></span>
                                    <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400">Brokers</flux:text>
                                </div>
                            </div>
                        </div>

                        @php($maxDailyActivity = max(1, collect($this->weeklyActivityChart)->max(fn ($day) => max($day['users'], $day['brokers']))))
                        <div class="grid grid-cols-7 gap-2">
                            @foreach ($this->weeklyActivityChart as $day)
                                <flux:tooltip :content="$day['day'].' • Users: '.$day['users'].' • Brokers: '.$day['brokers']" position="top">
                                    <div class="flex cursor-default flex-col items-center gap-1.5">
                                        <div class="flex h-14 items-end gap-1">
                                            <div
                                                class="w-2 rounded-full bg-emerald-500/90"
                                                style="height: {{ max(8, (int) round(($day['users'] / $maxDailyActivity) * 100)) }}%;"
                                            ></div>
                                            <div
                                                class="w-2 rounded-full bg-sky-500/90"
                                                style="height: {{ max(8, (int) round(($day['brokers'] / $maxDailyActivity) * 100)) }}%;"
                                            ></div>
                                        </div>
                                        <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400">{{ $day['day'] }}</flux:text>
                                    </div>
                                </flux:tooltip>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="grid grid-cols-1 gap-4 xl:grid-cols-2">
            <section class="overflow-hidden rounded-2xl border border-zinc-200/80 bg-white shadow-xs dark:border-zinc-800 dark:bg-zinc-900">
                <div class="border-b border-zinc-200/80 bg-linear-to-r from-violet-50/80 via-white to-white px-4 py-3 dark:border-zinc-800 dark:from-violet-900/20 dark:via-zinc-900 dark:to-zinc-900">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="grid size-9 place-items-center rounded-lg bg-violet-100 text-violet-700 ring-1 ring-violet-200 dark:bg-violet-900/35 dark:text-violet-400 dark:ring-violet-700/50">
                                <flux:icon name="users" variant="mini" />
                            </div>
                            <div>
                                <flux:heading size="sm">Recent Users</flux:heading>
                                <flux:text size="sm" class="text-zinc-600 dark:text-zinc-400">Newest account activity</flux:text>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <flux:badge size="sm" color="zinc" variant="pill">{{ $this->recentUsers->count() }} total</flux:badge>
                            <flux:button size="sm" variant="ghost" icon="arrow-right" href="{{ route('admin.users') }}">All users</flux:button>
                        </div>
                    </div>
                </div>

                <div class="divide-y divide-zinc-200/80 dark:divide-zinc-800">
                    @forelse ($this->recentUsers as $user)
                        <article class="group px-4 py-3 transition-colors hover:bg-zinc-50 dark:hover:bg-zinc-800/30">
                            <div class="flex items-start justify-between gap-3">
                                <div class="flex min-w-0 items-start gap-2.5">
                                    <flux:avatar name="{{ $user->name }}" size="md" color="violet" />
                                    <div class="min-w-0">
                                        <flux:text class="truncate font-semibold text-zinc-900 dark:text-zinc-100">{{ $user->name }}</flux:text>
                                        <flux:text size="sm" class="mt-0.5 truncate text-zinc-600 dark:text-zinc-400">{{ $user->email }}</flux:text>
                                        <div class="mt-2 flex flex-wrap gap-1.5">
                                            <flux:badge size="sm" :color="$user->status->getColor()" :icon="$user->status->getIcon()">
                                                {{ $user->status->getLabel() }}
                                            </flux:badge>
                                            @if ($user->email_verified_at)
                                                <flux:badge size="sm" color="green" icon="check-badge">Verified</flux:badge>
                                            @else
                                                <flux:badge size="sm" color="amber" icon="clock">Unverified</flux:badge>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="flex shrink-0 items-center gap-2">
                                    <flux:text size="sm" class="rounded-lg border border-zinc-200 bg-white px-2 py-1 text-zinc-600 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-300">
                                        {{ $user->updated_at?->diffForHumans() }}
                                    </flux:text>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="px-4 py-8 text-center text-zinc-500 dark:text-zinc-400">No users found.</div>
                    @endforelse
                </div>
            </section>

            <section class="overflow-hidden rounded-2xl border border-zinc-200/80 bg-white shadow-xs dark:border-zinc-800 dark:bg-zinc-900">
                <div class="border-b border-zinc-200/80 bg-linear-to-r from-sky-50/80 via-white to-white px-4 py-3 dark:border-zinc-800 dark:from-sky-900/20 dark:via-zinc-900 dark:to-zinc-900">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="grid size-9 place-items-center rounded-lg bg-sky-100 text-sky-700 ring-1 ring-sky-200 dark:bg-sky-900/35 dark:text-sky-400 dark:ring-sky-700/50">
                                <flux:icon name="building-library" variant="mini" />
                            </div>
                            <div>
                                <flux:heading size="sm">Recent Brokers</flux:heading>
                                <flux:text size="sm" class="text-zinc-600 dark:text-zinc-400">Latest broker updates</flux:text>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <flux:badge size="sm" color="zinc" variant="pill">{{ $this->recentBrokers->count() }} total</flux:badge>
                            <flux:button size="sm" variant="ghost" icon="arrow-right" href="{{ route('admin.brokers') }}">All brokers</flux:button>
                        </div>
                    </div>
                </div>

                <div class="divide-y divide-zinc-200/80 dark:divide-zinc-800">
                    @forelse ($this->recentBrokers as $broker)
                        <article class="group px-4 py-3 transition-colors hover:bg-zinc-50 dark:hover:bg-zinc-800/30">
                            <div class="flex items-start justify-between gap-3">
                                <div class="flex min-w-0 items-start gap-3">
                                    @if ($broker->logo)
                                        @php($normalizedBrokerName = str($broker->name)->lower()->value())
                                        @php($logoBackgroundClass = str_contains($normalizedBrokerName, 'webull') ? 'bg-blue-600 ring-blue-200 dark:bg-blue-700 dark:ring-blue-500' : (str_contains($normalizedBrokerName, 'fidelity') ? 'bg-green-600 ring-green-200 dark:bg-green-700 dark:ring-green-500' : 'bg-white ring-zinc-200 dark:bg-zinc-700 dark:ring-zinc-600'))

                                        <img
                                            src="{{ asset($broker->logo) }}"
                                            alt="{{ $broker->name }}"
                                            class="size-10 rounded-lg object-contain p-1 ring-1 shadow-xs dark:shadow-none {{ $logoBackgroundClass }}"
                                        />
                                    @else
                                        <div class="grid size-10 place-items-center rounded-lg bg-zinc-100 text-zinc-600 ring-1 ring-zinc-200 dark:bg-zinc-800 dark:text-zinc-300 dark:ring-zinc-700">
                                            <flux:icon name="building-library" variant="mini" />
                                        </div>
                                    @endif

                                    <div class="min-w-0">
                                        <flux:text class="truncate font-semibold text-zinc-900 dark:text-zinc-100">{{ $broker->name }}</flux:text>
                                        <flux:text size="sm" class="mt-0.5 line-clamp-2 text-zinc-600 dark:text-zinc-400">
                                            {{ str($broker->description)->limit(96) }}
                                        </flux:text>
                                        <div class="mt-2 flex flex-wrap gap-1.5">
                                            @foreach ($broker->brokerTypes as $brokerType)
                                                <flux:badge size="sm" :color="$brokerType->type->getColor()" :icon="$brokerType->type->getIcon()">
                                                    {{ $brokerType->type->getLabel() }}
                                                </flux:badge>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <flux:text size="sm" class="shrink-0 rounded-lg border border-zinc-200 bg-white px-2 py-1 text-zinc-600 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-300">
                                    {{ $broker->updated_at?->diffForHumans() }}
                                </flux:text>
                            </div>
                        </article>
                    @empty
                        <div class="px-4 py-8 text-center text-zinc-500 dark:text-zinc-400">No brokers found.</div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>
</div>
