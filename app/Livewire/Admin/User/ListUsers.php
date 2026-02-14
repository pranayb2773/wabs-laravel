<?php

declare(strict_types=1);

namespace App\Livewire\Admin\User;

use App\Enums\UserStatus;
use App\Models\User;
use Flux\Flux;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Sleep;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

final class ListUsers extends Component
{
    use WithPagination;

    public array $selectedUserIds = [];

    public array $userIdsOnPage = [];

    public array $userIds = [];

    public array $filters = [];

    public int $activeFilterCount = 0;

    public string $search = '';

    public string $sortCol = '';

    public string $sortDirection = 'asc';

    public function render(): View
    {
        return view('livewire.admin.user.list-users')
            ->layout('layouts.admin')
            ->title('Users');
    }

    public function populateIds(): void
    {
        $this->userIds = $this->allUserIds();
        $this->userIdsOnPage = $this->users->map(fn ($user) => (string) $user->id)->toArray();
    }

    public function updated(string $propertyName): void
    {
        if (str($propertyName)->contains('filters')) {
            $this->activeFilterCount = count(array_filter($this->filters));
            $this->reset(['selectedUserIds', 'userIdsOnPage']);
            $this->resetPage();
        }

        if ($propertyName === 'search') {
            $this->reset(['selectedUserIds', 'userIdsOnPage']);
            $this->resetPage();
        }
    }

    public function sortBy(string $col): void
    {
        if ($this->sortCol === $col) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortCol = $col;
            $this->sortDirection = 'asc';
        }
    }

    public function verifyEmail(int $userId): void
    {
        $updated = User::query()
            ->trader()
            ->whereKey($userId)
            ->update(['email_verified_at' => now()]);

        if ($updated > 0) {
            Flux::toast(text: 'Email has been verified.', heading: 'User Updated', variant: 'success');
        }
    }

    public function unverifyEmail(int $userId): void
    {
        $updated = User::query()
            ->trader()
            ->whereKey($userId)
            ->update(['email_verified_at' => null]);

        if ($updated > 0) {
            Flux::toast(text: 'Email has been marked as unverified.', heading: 'User Updated', variant: 'success');
        }
    }

    public function changeStatus(int $userId, string $status): void
    {
        $userStatus = UserStatus::tryFrom($status);

        if ($userStatus === null) {
            return;
        }

        $updated = User::query()
            ->trader()
            ->whereKey($userId)
            ->update(['status' => $userStatus->value]);

        if ($updated > 0) {
            Flux::toast(text: "Status changed to {$userStatus->getLabel()}.", heading: 'User Updated', variant: 'success');
        }
    }

    #[Computed]
    public function users(): LengthAwarePaginator
    {
        Sleep::sleep(0.2);
        $query = User::query()->trader();

        $this->applySearch($query);
        $this->applyFilters($query);
        $this->applySorting($query);

        return $query->paginate(10);
    }

    protected function allUserIds(): array
    {
        $query = User::query()->trader();
        $this->applySearch($query);
        $this->applyFilters($query);

        return $query->pluck('id')
            ->map(fn ($id) => (string) $id)
            ->toArray();
    }

    protected function applySearch(Builder $query): void
    {
        $query->when($this->search, function (Builder $query) {
            $query->whereAny(['name', 'email'], 'like', "%{$this->search}%");
        });
    }

    protected function applyFilters(Builder $query): void
    {
        $query->when($this->filters['status'] ?? null, fn (Builder $query, string $status) => $query->where('status', $status));
        $query->when($this->filters['email_status'] ?? null, function (Builder $query, string $emailStatus) {
            match ($emailStatus) {
                'verified' => $query->whereNotNull('email_verified_at'),
                'unverified' => $query->whereNull('email_verified_at'),
            };
        });
    }

    protected function applySorting(Builder $query): void
    {
        match ($this->sortCol) {
            'name' => $query->orderBy('name', $this->sortDirection),
            'email' => $query->orderBy('email', $this->sortDirection),
            'status' => $query->orderBy('status', $this->sortDirection),
            'updated_at' => $query->orderBy('updated_at', $this->sortDirection),
            default => $query->orderBy('updated_at', 'desc'),
        };
    }
}
