<div class="relative overflow-x-auto border border-collapse border-zinc-200 dark:border-zinc-800 rounded-b-xl">
    <table
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
            <flux:table.column></flux:table.column>
        </flux:table.columns>

        <flux:table.rows class="[*:has([data-dim-filter][data-loading])_&]:opacity-50">
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
                    <flux:table.cell></flux:table.cell>
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
    <flux:pagination :paginator="$this->users" />
@endif
