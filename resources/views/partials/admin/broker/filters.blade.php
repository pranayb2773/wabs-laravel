@php
    use App\Enums\BrokerType;
@endphp

<div
    class="border border-collapse border-b-0 rounded-t-xl border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900"
>
    <div
        class="flex flex-col md:flex-row items-start md:items-center md:justify-between gap-y-4 md:gap-x-4 p-4 sm:px-6"
    >
        <div class="flex shrink-0 items-center gap-x-4">
            <div
                class="flex shrink-0 items-center gap-3 justify-end"
                x-show="$wire.selectedBrokerIds.length"
                x-cloak
            >
                <flux:dropdown position="bottom" align="start">
                    <flux:button size="sm" icon="ellipsis-horizontal" inset="top bottom">Bulk actions</flux:button>
                    <flux:menu>
                        <flux:modal.trigger name="delete-brokers-bulk">
                            <flux:menu.item icon="trash" variant="danger">Delete selected</flux:menu.item>
                        </flux:modal.trigger>
                    </flux:menu>
                </flux:dropdown>
            </div>
        </div>

        <div class="md:ms-auto flex items-center align-middle gap-x-4">
            <flux:input
                wire:model.live.debounce.250ms="search"
                icon="magnifying-glass"
                size="sm"
                placeholder="Search brokers"
                :clearable="true"
            />

            <flux:dropdown>
                <flux:button icon="funnel" size="sm" icon:class="text-zinc-400">
                    Filters
                    <x-slot name="iconTrailing">
                        <flux:badge size="sm" class="-mr-1">
                            <span x-text="$wire.activeFilterCount" class="tabular-nums">&nbsp;</span>
                        </flux:badge>
                    </x-slot>
                </flux:button>

                <flux:popover class="max-w-[18rem] flex flex-col gap-4 md:w-96">
                    <flux:select
                        wire:model.live="filters.type"
                        variant="listbox"
                        size="sm"
                        label="Broker type"
                        placeholder="Choose broker type..."
                    >
                        @foreach (BrokerType::cases() as $brokerType)
                            <flux:select.option :value="$brokerType->value">
                                <div class="flex items-center gap-2">
                                    <flux:icon
                                        name="{{ $brokerType->getIcon() }}"
                                        color="{{ $brokerType->getColor() }}"
                                        variant="mini"
                                    />
                                    {{ $brokerType->getLabel() }}
                                </div>
                            </flux:select.option>
                        @endforeach
                    </flux:select>

                    <flux:select
                        wire:model.live="filters.file_upload"
                        variant="listbox"
                        size="sm"
                        label="File Upload"
                        placeholder="Choose file upload status..."
                    >
                        <flux:select.option value="yes">Yes</flux:select.option>
                        <flux:select.option value="no">No</flux:select.option>
                    </flux:select>

                    <flux:select
                        wire:model.live="filters.auto_sync"
                        variant="listbox"
                        size="sm"
                        label="Auto Sync"
                        placeholder="Choose auto sync status..."
                    >
                        <flux:select.option value="yes">Yes</flux:select.option>
                        <flux:select.option value="no">No</flux:select.option>
                    </flux:select>

                    <flux:separator variant="subtle" />

                    <flux:button
                        variant="danger"
                        size="sm"
                        class="justify-center -m-2 px-2!"
                        wire:click="$set('filters', [])"
                    >
                        Clear all
                    </flux:button>
                </flux:popover>
            </flux:dropdown>
        </div>
    </div>

    <div
        class="flex flex-col justify-between gap-y-1 bg-zinc-50 dark:bg-zinc-800 px-3 py-2 sm:flex-row sm:items-center sm:px-6 sm:py-1.5 border-t border-zinc-200 dark:border-zinc-700"
        x-bind:hidden="!$wire.selectedBrokerIds.length"
        x-show="$wire.selectedBrokerIds.length"
        x-cloak
    >
        <div class="flex gap-x-3">
            <span
                class="text-sm font-medium leading-6 text-zinc-800 dark:text-white"
                x-text="
                    window.pluralize(
                        '1 record selected|:count records selected',
                        $wire.selectedBrokerIds.length,
                        { count: $wire.selectedBrokerIds.length },
                    )
                "
            ></span>
        </div>
        <div class="flex gap-x-3">
            <flux:text
                @click="selectAll"
                color="violet"
                size="sm"
                class="cursor-pointer hover:underline hover:text-accent/90"
                x-text="`Select All ${$wire.brokerIds.length}`"
                x-bind:hidden="$wire.selectedBrokerIds.length === $wire.brokerIds.length"
            >
                Select All
            </flux:text>
            <flux:text
                @click="deselectAll"
                color="red"
                size="sm"
                class="cursor-pointer hover:underline hover:text-red-500/90"
            >
                Deselect All
            </flux:text>
        </div>
    </div>
</div>

<flux:modal
    name="delete-brokers-bulk"
    class="md:w-2xl rounded-2xl border border-zinc-200 bg-white text-zinc-900 shadow-2xl dark:border-zinc-700 dark:bg-zinc-900/95 dark:text-white"
    :dismissible="false"
    :closeable="false"
    variant="bare"
>
    <div class="relative px-6 py-7 md:px-8">
        <flux:modal.close>
            <button
                type="button"
                class="absolute right-6 top-6 inline-flex size-8 items-center justify-center rounded-md text-zinc-400 transition hover:bg-zinc-100 hover:text-zinc-700 dark:text-zinc-500 dark:hover:bg-zinc-800 dark:hover:text-zinc-300"
            >
                <flux:icon name="x-mark" variant="mini" />
            </button>
        </flux:modal.close>

        <div class="mx-auto max-w-xl text-center">
            <div
                class="mx-auto inline-flex size-16 items-center justify-center rounded-full bg-red-100 text-red-600 ring-1 ring-red-200 dark:bg-red-900/30 dark:text-red-500 dark:ring-red-900/40"
            >
                <flux:icon name="trash" class="size-7" />
            </div>

            <flux:heading size="xl" class="mt-5 text-zinc-900 dark:text-white">Delete selected brokers?</flux:heading>

            <div class="mt-3 space-y-1 text-zinc-600 dark:text-zinc-400">
                <p class="text-base leading-tight">Are you sure you would like to do this?</p>
                <p class="text-base leading-tight">This action cannot be reversed.</p>
            </div>

            <div
                class="mt-4 inline-flex items-center gap-3 rounded-full border border-zinc-200 bg-zinc-50 px-4 py-2 text-sm dark:border-zinc-700 dark:bg-zinc-800/70"
            >
                <span class="text-zinc-600 dark:text-zinc-400">Selected brokers</span>
                <span
                    class="inline-flex min-w-8 items-center justify-center rounded-full bg-red-100 px-2 py-0.5 font-semibold text-red-700 dark:bg-red-500/20 dark:text-red-300"
                    x-text="$wire.selectedBrokerIds.length"
                ></span>
            </div>

            <div class="mt-6 grid grid-cols-2 gap-3">
                <flux:modal.close>
                    <flux:button class="h-11 w-full text-base" variant="filled" color="zinc">Cancel</flux:button>
                </flux:modal.close>
                <flux:button
                    class="h-11 w-full text-base"
                    variant="danger"
                    wire:click="deleteSelectedBrokers"
                    wire:loading.attr="disabled"
                    wire:target="deleteSelectedBrokers"
                >
                    Delete
                </flux:button>
            </div>
        </div>
    </div>
</flux:modal>
