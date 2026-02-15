<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Enums\BrokerType;
use App\Enums\UserStatus;
use App\Models\Broker;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

final class Dashboard extends Component
{
    public function render(): View
    {
        return view('livewire.admin.dashboard')
            ->layout('layouts.admin')
            ->title('Dashboard');
    }

    #[Computed]
    public function totalUsers(): int
    {
        return User::query()->count();
    }

    #[Computed]
    public function activeUsers(): int
    {
        return User::query()
            ->where('status', UserStatus::Active->value)
            ->count();
    }

    #[Computed]
    public function pendingUsers(): int
    {
        return User::query()
            ->where('status', UserStatus::Pending->value)
            ->count();
    }

    #[Computed]
    public function blockedUsers(): int
    {
        return User::query()
            ->where('status', UserStatus::Blocked->value)
            ->count();
    }

    #[Computed]
    public function totalBrokers(): int
    {
        return Broker::query()->count();
    }

    #[Computed]
    public function brokersWithOptions(): int
    {
        return Broker::query()
            ->whereHas('brokerTypes', fn ($query) => $query->where('type', BrokerType::Options->value))
            ->count();
    }

    #[Computed]
    public function brokersWithStocks(): int
    {
        return Broker::query()
            ->whereHas('brokerTypes', fn ($query) => $query->where('type', BrokerType::Stocks->value))
            ->count();
    }

    #[Computed]
    public function brokersWithFutures(): int
    {
        return Broker::query()
            ->whereHas('brokerTypes', fn ($query) => $query->where('type', BrokerType::Futures->value))
            ->count();
    }

    /**
     * @return Collection<int, User>
     */
    #[Computed]
    public function recentUsers(): Collection
    {
        return User::query()
            ->latest()
            ->limit(6)
            ->get();
    }

    /**
     * @return Collection<int, Broker>
     */
    #[Computed]
    public function recentBrokers(): Collection
    {
        return Broker::query()
            ->with('brokerTypes')
            ->latest()
            ->limit(6)
            ->get();
    }

    /**
     * @return array<int, array{label: string, value: int, color: string, icon: string, percentage: int}>
     */
    #[Computed]
    public function userStatusChart(): array
    {
        $totalUsers = max($this->totalUsers, 1);

        return collect(UserStatus::cases())
            ->map(fn (UserStatus $status): array => [
                'label' => $status->getLabel(),
                'value' => User::query()->where('status', $status->value)->count(),
                'color' => $status->getColor(),
                'icon' => $status->getIcon(),
            ])
            ->map(fn (array $item): array => [
                ...$item,
                'percentage' => (int) round(($item['value'] / $totalUsers) * 100),
            ])
            ->values()
            ->all();
    }

    /**
     * @return array<int, array{label: string, value: int, color: string, icon: string, percentage: int}>
     */
    #[Computed]
    public function brokerTypeChart(): array
    {
        $totalBrokers = max($this->totalBrokers, 1);

        return collect(BrokerType::cases())
            ->map(fn (BrokerType $type): array => [
                'label' => $type->getLabel(),
                'value' => Broker::query()
                    ->whereHas('brokerTypes', fn ($query) => $query->where('type', $type->value))
                    ->count(),
                'color' => $type->getColor(),
                'icon' => $type->getIcon(),
            ])
            ->map(fn (array $item): array => [
                ...$item,
                'percentage' => (int) round(($item['value'] / $totalBrokers) * 100),
            ])
            ->values()
            ->all();
    }

    /**
     * @return array<int, array{day: string, users: int, brokers: int}>
     */
    #[Computed]
    public function weeklyActivityChart(): array
    {
        $startDate = CarbonImmutable::now()->subDays(6)->startOfDay();
        $endDate = CarbonImmutable::now()->endOfDay();

        $usersByDate = User::query()
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->pluck('total', 'day');

        $brokersByDate = Broker::query()
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->pluck('total', 'day');

        return collect(range(0, 6))
            ->map(function (int $dayOffset) use ($startDate, $usersByDate, $brokersByDate): array {
                $date = $startDate->addDays($dayOffset);
                $dateKey = $date->toDateString();

                return [
                    'day' => $date->format('D'),
                    'users' => (int) ($usersByDate[$dateKey] ?? 0),
                    'brokers' => (int) ($brokersByDate[$dateKey] ?? 0),
                ];
            })
            ->values()
            ->all();
    }

    #[Computed]
    public function verifiedUsersPercentage(): int
    {
        $totalUsers = max($this->totalUsers, 1);

        $verifiedUsers = User::query()
            ->whereNotNull('email_verified_at')
            ->count();

        return (int) round(($verifiedUsers / $totalUsers) * 100);
    }

    #[Computed]
    public function brokersWithLogoCount(): int
    {
        return Broker::query()
            ->whereNotNull('logo')
            ->where('logo', '!=', '')
            ->count();
    }
}
