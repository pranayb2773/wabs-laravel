<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\BrokerType;
use App\Models\Broker;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->admin()->active()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        User::factory(5)->create();
        User::factory(3)->pending()->create();
        User::factory(2)->blocked()->create();
        User::factory(3)->unverified()->pending()->create();
        User::factory(2)->unverified()->create();

        $brokers = [
            [
                'name' => 'Tradier Markets',
                'logo' => 'https://picsum.photos/seed/tradier/256/256',
                'description' => 'Options-focused broker with strong API tooling.',
                'types' => [BrokerType::Options, BrokerType::Stocks],
            ],
            [
                'name' => 'Summit Futures',
                'logo' => 'https://picsum.photos/seed/summit-futures/256/256',
                'description' => 'Execution platform optimized for futures traders.',
                'types' => [BrokerType::Futures],
            ],
            [
                'name' => 'Northbound Capital',
                'logo' => 'https://picsum.photos/seed/northbound-capital/256/256',
                'description' => 'Multi-asset broker for options, stocks, and futures.',
                'types' => [BrokerType::Options, BrokerType::Stocks, BrokerType::Futures],
            ],
        ];

        foreach ($brokers as $brokerData) {
            $broker = Broker::query()->create([
                'name' => $brokerData['name'],
                'logo' => $brokerData['logo'],
                'description' => $brokerData['description'],
            ]);

            $broker->brokerTypes()->createMany(
                array_map(
                    static fn (BrokerType $brokerType): array => ['type' => $brokerType->value],
                    $brokerData['types']
                )
            );
        }
    }
}
