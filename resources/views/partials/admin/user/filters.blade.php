@php
    use App\Enums\UserStatus;
@endphp

<div
    class="border border-collapse border-b-0 rounded-t-xl border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900"
>
    <div
        class="flex flex-col md:flex-row items-start md:items-center md:justify-between gap-y-4 md:gap-x-4 p-4 sm:px-6"
    >
        <div class="flex shrink-0 items-center gap-x-4">
            <div class="flex shrink-0 items-center gap-3 justify-end" x-show="$wire.selectedUserIds.length" x-cloak>
                <flux:dropdown position="bottom" align="start">
                    <flux:button size="sm" icon="ellipsis-horizontal" inset="top bottom">Bulk actions</flux:button>
                    <flux:menu>
                        <flux:modal.trigger name="delete-applications-bulk">
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
                placeholder="Search users"
                :clearable="true"
                data-dim-filter
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
                        wire:model.live="filters.status"
                        variant="listbox"
                        size="sm"
                        label="Status"
                        placeholder="Choose status..."
                        data-dim-filter
                    >
                        @foreach (UserStatus::cases() as $status)
                            <flux:select.option :value="$status">
                                <div class="flex items-center gap-2">
                                    <flux:icon
                                        name="{{ $status->getIcon() }}"
                                        color="{{ $status->getColor() }}"
                                        variant="mini"
                                    />
                                    {{ $status }}
                                </div>
                            </flux:select.option>
                        @endforeach
                    </flux:select>
                    <flux:select
                        wire:model.live="filters.email_status"
                        variant="listbox"
                        size="sm"
                        label="Email status"
                        placeholder="Choose email status..."
                        data-dim-filter
                    >
                        <flux:select.option value="verified">Verified</flux:select.option>
                        <flux:select.option value="unverified">Unverified</flux:select.option>
                    </flux:select>
                    <flux:separator variant="subtle" />
                    <flux:button
                        variant="danger"
                        size="sm"
                        class="justify-center -m-2 px-2!"
                        wire:click="$set('filters', [])"
                        data-dim-filter
                    >
                        Clear all
                    </flux:button>
                </flux:popover>
            </flux:dropdown>
        </div>
    </div>
    <div
        class="flex flex-col justify-between gap-y-1 bg-zinc-50 dark:bg-zinc-600/40 px-3 py-2 sm:flex-row sm:items-center sm:px-6 sm:py-1.5"
        x-bind:hidden="!$wire.selectedUserIds.length"
        x-show="$wire.selectedUserIds.length"
        x-cloak
    >
        <div class="flex gap-x-3">
            <span
                class="text-sm font-medium leading-6 text-zinc-800 dark:text-white"
                x-text="
                    window.pluralize(
                        '1 record selected|:count records selected',
                        $wire.selectedUserIds.length,
                        { count: $wire.selectedUserIds.length },
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
                x-text="`Select All ${$wire.userIds.length}`"
                x-bind:hidden="$wire.selectedUserIds.length === $wire.userIds.length"
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
