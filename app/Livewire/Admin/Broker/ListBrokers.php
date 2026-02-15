<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Broker;

use App\Enums\BrokerType;
use App\Models\Broker;
use Flux\Flux;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Sleep;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

final class ListBrokers extends Component
{
    use WithPagination;

    public array $selectedBrokerIds = [];

    public array $brokerIdsOnPage = [];

    public array $brokerIds = [];

    public array $filters = [];

    public int $activeFilterCount = 0;

    public string $search = '';

    public string $sortCol = '';

    public string $sortDirection = 'asc';

    public function render(): View
    {
        return view('livewire.admin.broker.list-brokers')
            ->layout('layouts.admin')
            ->title('Brokers');
    }

    public function populateIds(): void
    {
        $this->brokerIds = $this->allBrokerIds();
        $this->brokerIdsOnPage = $this->brokers->map(fn (Broker $broker): string => (string) $broker->id)->toArray();
    }

    public function updated(string $propertyName): void
    {
        if (str($propertyName)->contains('filters')) {
            $this->activeFilterCount = count(array_filter($this->filters));
            $this->reset(['selectedBrokerIds', 'brokerIdsOnPage']);
            $this->resetPage();
        }

        if ($propertyName === 'search') {
            $this->reset(['selectedBrokerIds', 'brokerIdsOnPage']);
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

    public function deleteSelectedBrokers(): void
    {
        if ($this->selectedBrokerIds === []) {
            Flux::modal('delete-brokers-bulk')->close();

            return;
        }

        $deletedCount = Broker::query()
            ->whereIn('id', $this->selectedBrokerIds)
            ->delete();

        $this->reset(['selectedBrokerIds', 'brokerIdsOnPage']);
        $this->resetPage();

        Flux::modal('delete-brokers-bulk')->close();

        if ($deletedCount > 0) {
            Flux::toast(
                text: "{$deletedCount} broker(s) deleted successfully.",
                heading: 'Brokers Deleted',
                variant: 'success'
            );
        }
    }

    #[Computed]
    public function brokers(): LengthAwarePaginator
    {
        Sleep::sleep(0.2);

        $query = Broker::query()->with('brokerTypes');

        $this->applySearch($query);
        $this->applyFilters($query);
        $this->applySorting($query);

        return $query->paginate(10);
    }

    protected function allBrokerIds(): array
    {
        $query = Broker::query();

        $this->applySearch($query);
        $this->applyFilters($query);

        return $query->pluck('id')
            ->map(fn (int $id): string => (string) $id)
            ->toArray();
    }

    protected function applySearch(Builder $query): void
    {
        $query->when($this->search, function (Builder $query): void {
            $query->whereAny(['name', 'description'], 'like', "%{$this->search}%");
        });
    }

    protected function applyFilters(Builder $query): void
    {
        $query->when($this->filters['type'] ?? null, function (Builder $query, string $type): void {
            $brokerType = BrokerType::tryFrom($type);

            if ($brokerType === null) {
                return;
            }

            $query->whereHas('brokerTypes', function (Builder $typeQuery) use ($brokerType): void {
                $typeQuery->where('type', $brokerType->value);
            });
        });
    }

    protected function applySorting(Builder $query): void
    {
        match ($this->sortCol) {
            'name' => $query->orderBy('name', $this->sortDirection),
            'updated_at' => $query->orderBy('updated_at', $this->sortDirection),
            default => $query->orderBy('updated_at', 'desc'),
        };
    }
}
