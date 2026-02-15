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
            [
                'name' => 'Pioneer Trade Desk',
                'logo' => 'https://picsum.photos/seed/pioneer-trade-desk/256/256',
                'description' => 'Low-latency brokerage platform for active equity traders.',
                'types' => [BrokerType::Stocks],
            ],
            [
                'name' => 'Atlas Derivatives',
                'logo' => 'https://picsum.photos/seed/atlas-derivatives/256/256',
                'description' => 'Advanced options analytics and risk tools for derivatives desks.',
                'types' => [BrokerType::Options],
            ],
            [
                'name' => 'BluePeak Securities',
                'logo' => 'https://picsum.photos/seed/bluepeak-securities/256/256',
                'description' => 'Retail-first broker with strong stock and options coverage.',
                'types' => [BrokerType::Options, BrokerType::Stocks],
            ],
            [
                'name' => 'Redwood Futures Exchange',
                'logo' => 'https://picsum.photos/seed/redwood-futures/256/256',
                'description' => 'Institutional-grade futures routing and contract discovery.',
                'types' => [BrokerType::Futures],
            ],
            [
                'name' => 'Harborline Brokerage',
                'logo' => 'https://picsum.photos/seed/harborline-brokerage/256/256',
                'description' => 'Balanced broker for long-term stock investing and covered calls.',
                'types' => [BrokerType::Options, BrokerType::Stocks],
            ],
            [
                'name' => 'QuantEdge Markets',
                'logo' => 'https://picsum.photos/seed/quantedge-markets/256/256',
                'description' => 'API-native broker for quantitative strategies across asset classes.',
                'types' => [BrokerType::Options, BrokerType::Stocks, BrokerType::Futures],
            ],
            [
                'name' => 'Ironclad Trading Co.',
                'logo' => 'https://picsum.photos/seed/ironclad-trading/256/256',
                'description' => 'Robust execution stack tailored for high-volume options workflows.',
                'types' => [BrokerType::Options],
            ],
            [
                'name' => 'Crestline Investor Hub',
                'logo' => 'https://picsum.photos/seed/crestline-investor-hub/256/256',
                'description' => 'Intuitive platform for stocks and multi-leg options strategies.',
                'types' => [BrokerType::Options, BrokerType::Stocks],
            ],
            [
                'name' => 'Falcon Ridge Brokerage',
                'logo' => 'https://picsum.photos/seed/falcon-ridge-brokerage/256/256',
                'description' => 'Cross-market broker supporting equities and futures hedging.',
                'types' => [BrokerType::Stocks, BrokerType::Futures],
            ],
        ];

        foreach ($brokers as $brokerData) {
            $broker = Broker::query()->updateOrCreate(
                ['name' => $brokerData['name']],
                [
                    'logo' => $brokerData['logo'],
                    'description' => $brokerData['description'],
                ]
            );

            $types = array_map(
                static fn (BrokerType $brokerType): string => $brokerType->value,
                $brokerData['types']
            );

            $broker->brokerTypes()
                ->whereNotIn('type', $types)
                ->delete();

            foreach ($types as $type) {
                $broker->brokerTypes()->updateOrCreate(
                    ['type' => $type],
                    []
                );
            }
        }
    }
}
