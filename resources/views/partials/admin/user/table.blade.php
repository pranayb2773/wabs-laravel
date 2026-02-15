@php
    use App\Enums\UserStatus;
@endphp

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
            <flux:table.column class="pl-4!">
                <div>
                    <flux:checkbox
                        x-ref="checkbox"
                        @change="handleCheck"
                        :disabled="$this->users->isEmpty()"
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
            <flux:table.column
                sortable
                :sorted="$sortCol === 'email'"
                :direction="$sortDirection"
                wire:click="sortBy('email')"
            >
                Email
            </flux:table.column>
            <flux:table.column
                sortable
                :sorted="$sortCol === 'status'"
                :direction="$sortDirection"
                wire:click="sortBy('status')"
            >
                Status
            </flux:table.column>
            <flux:table.column>Email Status</flux:table.column>
            <flux:table.column
                sortable
                :sorted="$sortCol === 'updated_at'"
                :direction="$sortDirection"
                wire:click="sortBy('updated_at')"
            >
                Updated At
            </flux:table.column>
            <flux:table.column class="pr-4!"></flux:table.column>
        </flux:table.columns>

        <flux:table.rows class="bg-white dark:bg-zinc-900">
            @forelse ($this->users as $user)
                <flux:table.row :key="$user->id">
                    <flux:table.cell class="pl-4! size-2">
                        <flux:checkbox wire:model="selectedUserIds" value="{{ $user->id }}" />
                    </flux:table.cell>
                    <flux:table.cell>
                        {{ $user->name }}
                    </flux:table.cell>
                    <flux:table.cell>{{ $user->email }}</flux:table.cell>
                    <flux:table.cell>
                        <flux:badge size="sm" :color="$user->status->getColor()" :icon="$user->status->getIcon()">
                            {{ $user->status->getLabel() }}
                        </flux:badge>
                    </flux:table.cell>
                    <flux:table.cell>
                        <flux:badge size="sm" :color="$user->email_verified_at ? 'green' : 'zinc'" variant="pill">
                            {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                        </flux:badge>
                    </flux:table.cell>
                    <flux:table.cell>{{ $user->updated_at?->diffForHumans() }}</flux:table.cell>
                    <flux:table.cell class="pr-4!">
                        <div class="flex items-center justify-end">
                            <flux:dropdown position="left" align="end">
                                <button
                                    type="button"
                                    class="inline-flex cursor-pointer items-center gap-1.5 text-sm text-zinc-600 hover:text-zinc-700 hover:underline dark:text-zinc-300 dark:hover:text-zinc-200"
                                >
                                    <flux:icon name="eye" variant="micro" />
                                    View
                                </button>

                                <flux:popover class="w-[24rem] space-y-4">
                                    <div
                                        class="rounded-lg border border-zinc-200 bg-zinc-800/5 p-3 dark:border-zinc-600 dark:bg-white/10"
                                    >
                                        <flux:heading size="sm">User Overview</flux:heading>
                                        <div class="mt-3 flex items-center gap-3">
                                            <flux:avatar name="{{ $user->name }}" size="sm" color="violet" />
                                            <div class="min-w-0">
                                                <flux:text
                                                    class="truncate font-medium text-zinc-800 dark:text-zinc-100"
                                                >
                                                    {{ $user->name }}
                                                </flux:text>
                                                <flux:text size="sm" class="truncate text-zinc-500 dark:text-zinc-400">
                                                    {{ $user->email }}
                                                </flux:text>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="rounded-md border border-zinc-200 p-2 dark:border-zinc-600">
                                            <flux:text size="xs" class="text-zinc-500 dark:text-zinc-400">
                                                Status
                                            </flux:text>
                                            <div class="mt-1">
                                                <flux:badge
                                                    size="sm"
                                                    :color="$user->status->getColor()"
                                                    :icon="$user->status->getIcon()"
                                                >
                                                    {{ $user->status->getLabel() }}
                                                </flux:badge>
                                            </div>
                                        </div>
                                        <div class="rounded-md border border-zinc-200 p-2 dark:border-zinc-600">
                                            <flux:text size="xs" class="text-zinc-500 dark:text-zinc-400">
                                                Email
                                            </flux:text>
                                            <div class="mt-1">
                                                <flux:badge
                                                    size="sm"
                                                    :color="$user->email_verified_at ? 'green' : 'zinc'"
                                                    variant="pill"
                                                >
                                                    {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                                                </flux:badge>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="flex items-center justify-between text-xs text-zinc-500 dark:text-zinc-400"
                                    >
                                        <span>Updated</span>
                                        <span>{{ $user->updated_at?->diffForHumans() }}</span>
                                    </div>

                                    <flux:separator variant="subtle" />

                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                        <flux:button
                                            variant="filled"
                                            size="sm"
                                            icon="{{ $user->email_verified_at ? 'x-circle' : 'check-circle' }}"
                                            wire:click="{{ $user->email_verified_at ? 'unverifyEmail' : 'verifyEmail' }}({{ $user->id }})"
                                        >
                                            {{ $user->email_verified_at ? 'Unverify' : 'Verify' }}
                                        </flux:button>
                                        @foreach (UserStatus::cases() as $statusOption)
                                            @if ($statusOption !== $user->status)
                                                <flux:button
                                                    size="sm"
                                                    variant="primary"
                                                    :color="$statusOption->getColor()"
                                                    icon="{{ $statusOption->getIcon() }}"
                                                    wire:click="changeStatus({{ $user->id }}, '{{ $statusOption->value }}')"
                                                >
                                                    {{ $statusOption->getLabel() }}
                                                </flux:button>
                                            @endif
                                        @endforeach
                                    </div>
                                </flux:popover>
                            </flux:dropdown>
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @empty
                <flux:table.row>
                    <flux:table.cell colspan="8" class="text-center py-4">
                        <div
                            class="flex flex-col items-center justify-center space-y-2 text-zinc-500 dark:text-zinc-400"
                        >
                            <flux:icon.x-circle variant="solid" class="size-8"></flux:icon.x-circle>
                            <flux:text class="flex align-middle">No users found</flux:text>
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @endforelse
        </flux:table.rows>
    </table>
</div>

@if ($this->users)
    <div wire:loading.remove wire:target="search,filters,sortBy,gotoPage,previousPage,nextPage,setPage">
        <flux:pagination :paginator="$this->users" class="border-t-0" />
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
                        <flux:skeleton.line class="w-12" />
                    </th>
                    <th class="p-3">
                        <flux:skeleton.line class="w-12" />
                    </th>
                    <th class="p-3">
                        <flux:skeleton.line class="w-14" />
                    </th>
                    <th class="p-3">
                        <flux:skeleton.line class="w-20" />
                    </th>
                    <th class="p-3">
                        <flux:skeleton.line class="w-20" />
                    </th>
                    <th class="p-3 w-10"></th>
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
                            <flux:skeleton.line style="width: {{ rand(60, 100) }}%" />
                        </td>
                        <td class="p-3">
                            <flux:skeleton class="h-5 w-16 rounded-md" />
                        </td>
                        <td class="p-3">
                            <flux:skeleton class="h-5 w-18 rounded-full" />
                        </td>
                        <td class="p-3">
                            <flux:skeleton.line style="width: {{ rand(40, 70) }}%" />
                        </td>
                        <td class="p-3"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </flux:skeleton.group>
</div>
