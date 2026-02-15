<div
    class="relative overflow-x-auto border border-collapse border-zinc-200 dark:border-zinc-800 rounded-b-xl"
    wire:loading.remove
    wire:target="search,filters,sortBy,gotoPage,previousPage,nextPage,setPage"
>
    <table
        class="[:where(&)]:min-w-full table-fixed text-zinc-800 divide-y divide-zinc-200 dark:divide-zinc-800 whitespace-nowrap [&_dialog]:whitespace-normal **:[[popover]]:whitespace-normal"
    >
        <flux:table.columns class="bg-zinc-50 dark:bg-zinc-800">
            <flux:table.column class="pl-4!">
                <div>
                    <flux:checkbox
                        x-ref="checkbox"
                        @change="handleCheck"
                        :disabled="$this->brokers->isEmpty()"
                    ></flux:checkbox>
                </div>
            </flux:table.column>
            <flux:table.column
                sortable
                :sorted="$sortCol === 'name'"
                :direction="$sortDirection"
                wire:click="sortBy('name')"
            >
                Name
            </flux:table.column>
            <flux:table.column>Types</flux:table.column>
            <flux:table.column>Description</flux:table.column>
            <flux:table.column
                sortable
                :sorted="$sortCol === 'updated_at'"
                :direction="$sortDirection"
                wire:click="sortBy('updated_at')"
            >
                Updated At
            </flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @forelse ($this->brokers as $broker)
                <flux:table.row :key="$broker->id">
                    <flux:table.cell class="pl-4! size-2">
                        <flux:checkbox wire:model="selectedBrokerIds" value="{{ $broker->id }}" />
                    </flux:table.cell>
                    <flux:table.cell>
                        <div class="flex items-center gap-3">
                            @if ($broker->logo)
                                <img
                                    src="{{ $broker->logo }}"
                                    alt="{{ $broker->name }}"
                                    class="size-8 rounded-md object-cover ring-1 ring-zinc-200 dark:ring-zinc-700"
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
                    <flux:table.cell class="text-zinc-600 dark:text-zinc-400">
                        {{ str($broker->description)->limit(80) }}
                    </flux:table.cell>
                    <flux:table.cell>{{ $broker->updated_at?->diffForHumans() }}</flux:table.cell>
                </flux:table.row>
            @empty
                <flux:table.row>
                    <flux:table.cell colspan="5" class="text-center py-4">
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
                    <th class="p-3 w-10">
                        <flux:skeleton class="size-4 rounded" />
                    </th>
                    <th class="p-3">
                        <flux:skeleton.line class="w-18" />
                    </th>
                    <th class="p-3">
                        <flux:skeleton.line class="w-14" />
                    </th>
                    <th class="p-3">
                        <flux:skeleton.line class="w-24" />
                    </th>
                    <th class="p-3">
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
