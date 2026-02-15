<div>
    <div class="flex flex-col gap-4">
        <!-- Breadcrumbs -->
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('Home') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>{{ __('Brokers') }}</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <!-- Page Heading -->
        <div class="flex items-center justify-between">
            <flux:heading size="xl">{{ __('Brokers') }}</flux:heading>
        </div>

        <!-- Filters and Table -->
        @island(defer: true)
            @placeholder
                <div>
                    {{-- Table rows skeleton --}}
                    <div
                        class="border border-collapse border-zinc-200 dark:border-zinc-800 rounded-xl overflow-hidden"
                    >
                        <flux:skeleton.group animate="shimmer">
                            <table class="min-w-full table-fixed">
                                <thead class="bg-zinc-50 dark:bg-zinc-800">
                                    <tr>
                                        <th class="p-3 w-10">
                                            <flux:skeleton class="size-4 rounded" />
                                        </th>
                                        <th class="p-3"><flux:skeleton.line class="w-12" /></th>
                                        <th class="p-3"><flux:skeleton.line class="w-12" /></th>
                                        <th class="p-3"><flux:skeleton.line class="w-14" /></th>
                                        <th class="p-3"><flux:skeleton.line class="w-20" /></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">
                                    @foreach (range(1, 10) as $i)
                                        <tr>
                                            <td class="p-3">
                                                <flux:skeleton class="size-4 rounded" />
                                            </td>
                                            <td class="p-3">
                                                <flux:skeleton.line style="width: {{ rand(50, 90) }}%" />
                                            </td>
                                            <td class="p-3">
                                                <flux:skeleton class="h-5 w-20 rounded-full" />
                                            </td>
                                            <td class="p-3">
                                                <flux:skeleton.line style="width: {{ rand(60, 100) }}%" />
                                            </td>
                                            <td class="p-3">
                                                <flux:skeleton.line style="width: {{ rand(40, 70) }}%" />
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </flux:skeleton.group>
                    </div>
                </div>
            @endplaceholder

            <div x-data="checkAll">
                @php($this->populateIds())
                @include('partials.admin.broker.filters')
                @include('partials.admin.broker.table')
            </div>
        @endisland
    </div>
</div>

@script
    <script>
        Alpine.data('checkAll', () => {
            return {
                init() {
                    this.$wire.$watch('selectedBrokerIds', () => {
                        this.updateCheckAllState();
                    });

                    this.$wire.$watch('brokerIdsOnPage', () => {
                        this.updateCheckAllState();
                    });

                    this.$wire.$watch('brokerIds', (newBrokers) => {
                        if (!newBrokers.length) {
                            this.$refs.checkbox.checked = false;
                            this.$refs.checkbox.indeterminate = false;
                        }
                    });
                },

                updateCheckAllState() {
                    if (this.pageIsSelected()) {
                        this.$refs.checkbox.checked = true;
                        this.$refs.checkbox.indeterminate = false;
                    } else if (this.pageIsEmpty()) {
                        this.$refs.checkbox.checked = false;
                        this.$refs.checkbox.indeterminate = false;
                    } else {
                        this.$refs.checkbox.checked = false;
                        this.$refs.checkbox.indeterminate = true;
                    }
                },

                pageIsSelected() {
                    return this.$wire.brokerIdsOnPage.every((id) => this.$wire.selectedBrokerIds.includes(id));
                },

                pageIsEmpty() {
                    return this.$wire.selectedBrokerIds.length === 0;
                },

                handleCheck(e) {
                    e.target.hasAttribute('data-checked') ? this.selectAllOnPage() : this.deselectAllOnPage();
                },

                selectAllOnPage() {
                    this.$wire.brokerIdsOnPage.forEach((id) => {
                        if (this.$wire.selectedBrokerIds.includes(id)) return;

                        this.$wire.selectedBrokerIds.push(id);
                    });
                },

                selectAll() {
                    this.$wire.selectedBrokerIds = this.$wire.brokerIds;
                },

                deselectAllOnPage() {
                    const idsOnPage = new Set(this.$wire.brokerIdsOnPage);
                    this.$wire.selectedBrokerIds = this.$wire.selectedBrokerIds.filter((id) => !idsOnPage.has(id));
                },

                deselectAll() {
                    this.$wire.selectedBrokerIds = [];
                },
            };
        });
    </script>
@endscript
