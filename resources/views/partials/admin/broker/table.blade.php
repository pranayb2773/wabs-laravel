<div
    class="relative overflow-x-auto border border-collapse border-zinc-200 dark:border-zinc-800 dark:border-t-zinc-700 rounded-b-xl"
    wire:loading.remove
    wire:target="search,filters,sortBy,gotoPage,previousPage,nextPage,setPage"
>
    <table
        data-flux-table
        class="[:where(&)]:min-w-full table-fixed text-zinc-800 divide-y divide-zinc-200 dark:divide-zinc-800 whitespace-nowrap [&_dialog]:whitespace-normal **:[[popover]]:whitespace-normal"
    >
        <flux:table.columns class="bg-zinc-50 dark:bg-zinc-800">
            <flux:table.column class="pl-4! w-12">
                <div>
                    <flux:checkbox
                        x-ref="checkbox"
                        @change="handleCheck"
                        :disabled="$this->brokers->isEmpty()"
                    ></flux:checkbox>
                </div>
            </flux:table.column>
            <flux:table.column
                class="w-72"
                sortable
                :sorted="$sortCol === 'name'"
                :direction="$sortDirection"
                wire:click="sortBy('name')"
            >
                Name
            </flux:table.column>
            <flux:table.column class="w-96">Types</flux:table.column>
            <flux:table.column>File Upload</flux:table.column>
            <flux:table.column>Auto Sync</flux:table.column>
            <flux:table.column
                class="w-36"
                sortable
                :sorted="$sortCol === 'updated_at'"
                :direction="$sortDirection"
                wire:click="sortBy('updated_at')"
            >
                Updated At
            </flux:table.column>
        </flux:table.columns>

        <flux:table.rows class="bg-white dark:bg-zinc-900">
            @forelse ($this->brokers as $broker)
                <flux:table.row :key="$broker->id">
                    <flux:table.cell class="pl-4! size-2">
                        <flux:checkbox wire:model="selectedBrokerIds" value="{{ $broker->id }}" />
                    </flux:table.cell>
                    <flux:table.cell>
                        <div class="flex items-center gap-3">
                            @if ($broker->logo)
                                @php
                                    $normalizedBrokerName = str($broker->name)->lower()->value();
                                    $logoBackgroundClass = str_contains($normalizedBrokerName, 'webull')
                                        ? 'bg-blue-600 ring-blue-200 dark:bg-blue-700 dark:ring-blue-500'
                                        : (str_contains($normalizedBrokerName, 'fidelity')
                                            ? 'bg-green-600 ring-green-200 dark:bg-green-700 dark:ring-green-500'
                                            : 'bg-white ring-zinc-200 dark:bg-zinc-700 dark:ring-zinc-600');
                                @endphp
                                <img
                                    src="{{ asset($broker->logo) }}"
                                    alt="{{ $broker->name }}"
                                    class="size-8 rounded-md object-contain p-1 ring-1 shadow-xs dark:shadow-none {{ $logoBackgroundClass }}"
                                />
                            @endif

                            <span class="font-medium">{{ $broker->name }}</span>
                        </div>
                    </flux:table.cell>
                    <flux:table.cell>
                        <div class="flex flex-wrap gap-1.5">
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
                    </flux:table.cell>
                    <flux:table.cell>
                        <flux:badge
                            size="sm"
                            :color="$broker->is_file_upload ? 'green' : 'zinc'"
                            :icon="$broker->is_file_upload ? 'check' : 'x-mark'"
                        >
                            {{ $broker->is_file_upload ? 'Yes' : 'No' }}
                        </flux:badge>
                    </flux:table.cell>
                    <flux:table.cell>
                        <flux:badge
                            size="sm"
                            :color="$broker->is_auto_sync ? 'green' : 'zinc'"
                            :icon="$broker->is_auto_sync ? 'check' : 'x-mark'"
                        >
                            {{ $broker->is_auto_sync ? 'Yes' : 'No' }}
                        </flux:badge>
                    </flux:table.cell>
                    <flux:table.cell>{{ $broker->updated_at?->diffForHumans() }}</flux:table.cell>
                </flux:table.row>
            @empty
                <flux:table.row>
                    <flux:table.cell colspan="7" class="text-center py-4">
                        <div
                            class="flex flex-col items-center justify-center space-y-2 text-zinc-500 dark:text-zinc-400"
                        >
                            <flux:icon.x-circle variant="solid" class="size-8"></flux:icon.x-circle>
                            <flux:text class="flex align-middle">No brokers found</flux:text>
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @endforelse
        </flux:table.rows>
    </table>
</div>

@if ($this->brokers)
    <div wire:loading.remove wire:target="search,filters,sortBy,gotoPage,previousPage,nextPage,setPage">
        <flux:pagination :paginator="$this->brokers" class="border-t-0" />
    </div>
@endif

<div
    class="border border-collapse border-zinc-200 dark:border-zinc-800 rounded-b-xl overflow-hidden"
    wire:loading
    wire:target="search,filters,sortBy,gotoPage,previousPage,nextPage,setPage"
>
    <flux:skeleton.group animate="shimmer">
        <table class="w-full table-fixed">
            <thead class="bg-zinc-50 dark:bg-zinc-800">
                <tr>
                    <th class="p-3 w-12">
                        <flux:skeleton class="size-4 rounded" />
                    </th>
                    <th class="p-3 w-72">
                        <flux:skeleton.line class="w-18" />
                    </th>
                    <th class="p-3 w-64">
                        <flux:skeleton.line class="w-14" />
                    </th>
                    <th class="p-3">
                        <flux:skeleton.line class="w-16" />
                    </th>
                    <th class="p-3">
                        <flux:skeleton.line class="w-16" />
                    </th>
                    <th class="p-3 w-36">
                        <flux:skeleton.line class="w-20" />
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">
                @foreach (range(1, 10) as $i)
                    <tr>
                        <td class="p-3">
                            <flux:skeleton class="size-4 rounded" />
                        </td>
                        <td class="p-3">
                            <flux:skeleton.line style="width: {{ rand(55, 90) }}%" />
                        </td>
                        <td class="p-3">
                            <flux:skeleton class="h-5 w-24 rounded-full" />
                        </td>
                        <td class="p-3">
                            <flux:skeleton class="h-5 w-12 rounded-full" />
                        </td>
                        <td class="p-3">
                            <flux:skeleton class="h-5 w-12 rounded-full" />
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
