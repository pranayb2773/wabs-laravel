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
                'name' => 'Tastytrade',
                'logo' => 'images/brokers/tastytrade.jpeg',
                'description' => 'Options-focused broker with powerful analytics and low commissions.',
                'is_file_upload' => true,
                'is_auto_sync' => false,
                'types' => [BrokerType::Options, BrokerType::Stocks, BrokerType::Futures],
            ],
            [
                'name' => 'Ally Invest',
                'logo' => 'images/brokers/ally-invest.svg',
                'description' => 'Full-service online broker with integrated banking and investing.',
                'is_file_upload' => true,
                'is_auto_sync' => false,
                'types' => [BrokerType::Options, BrokerType::Stocks],
            ],
            [
                'name' => 'Webull',
                'logo' => 'images/brokers/webull.png',
                'description' => 'Commission-free trading platform with advanced charting tools.',
                'is_file_upload' => true,
                'is_auto_sync' => true,
                'types' => [BrokerType::Options, BrokerType::Stocks],
            ],
            [
                'name' => 'ThinkorSwim',
                'logo' => 'images/brokers/thinkorswim.png',
                'description' => 'Advanced trading platform with professional-grade options tools.',
                'is_file_upload' => true,
                'is_auto_sync' => false,
                'types' => [BrokerType::Options, BrokerType::Stocks, BrokerType::Futures],
            ],
            [
                'name' => 'E*TRADE',
                'logo' => 'images/brokers/etrade.png',
                'description' => 'Comprehensive brokerage with powerful tools for options and stock trading.',
                'is_file_upload' => true,
                'is_auto_sync' => false,
                'types' => [BrokerType::Options, BrokerType::Stocks],
            ],
            [
                'name' => 'Fidelity',
                'logo' => 'images/brokers/fidelity.png',
                'description' => 'Full-service broker with research, retirement, and active trading support.',
                'is_file_upload' => true,
                'is_auto_sync' => false,
                'types' => [BrokerType::Options, BrokerType::Stocks],
            ],
            [
                'name' => 'Charles Schwab',
                'logo' => 'images/brokers/charles-schwab.svg',
                'description' => 'Leading brokerage offering stocks, options, and comprehensive financial services.',
                'is_file_upload' => true,
                'is_auto_sync' => true,
                'types' => [BrokerType::Options, BrokerType::Stocks, BrokerType::Futures],
            ],
            [
                'name' => 'Interactive Brokers',
                'logo' => 'images/brokers/interactive-brokers.svg',
                'description' => 'Global multi-asset broker with low-cost execution and professional tools.',
                'is_file_upload' => true,
                'is_auto_sync' => true,
                'types' => [BrokerType::Options, BrokerType::Stocks, BrokerType::Futures],
            ],
            [
                'name' => 'Merrill Edge',
                'logo' => 'images/brokers/merrill-edge.png',
                'description' => 'Bank of America\'s online brokerage with integrated banking features.',
                'is_file_upload' => true,
                'is_auto_sync' => false,
                'types' => [BrokerType::Options, BrokerType::Stocks],
            ],
            [
                'name' => 'Vanguard',
                'logo' => 'images/brokers/vanguard.svg',
                'description' => 'Investor-owned brokerage known for low-cost index funds and ETFs.',
                'is_file_upload' => true,
                'is_auto_sync' => false,
                'types' => [BrokerType::Stocks],
            ],
            [
                'name' => 'TD Ameritrade',
                'logo' => 'images/brokers/td-ameritrade.png',
                'description' => 'Full-featured broker with extensive educational resources and tools.',
                'is_file_upload' => true,
                'is_auto_sync' => false,
                'types' => [BrokerType::Options, BrokerType::Stocks, BrokerType::Futures],
            ],
            [
                'name' => 'Robinhood',
                'logo' => 'images/brokers/robinhood.png',
                'description' => 'Commission-free trading app popular with retail investors.',
                'is_file_upload' => true,
                'is_auto_sync' => true,
                'types' => [BrokerType::Options, BrokerType::Stocks],
            ],
            [
                'name' => 'Topstep',
                'logo' => 'images/brokers/topstep.jpeg',
                'description' => 'Funded futures trading platform for aspiring professional traders.',
                'is_file_upload' => true,
                'is_auto_sync' => false,
                'types' => [BrokerType::Futures],
            ],
            [
                'name' => 'Apex',
                'logo' => 'images/brokers/apex.jpeg',
                'description' => 'Prop firm integration supporting futures trading evaluation and funding.',
                'is_file_upload' => true,
                'is_auto_sync' => false,
                'types' => [BrokerType::Futures],
            ],
            [
                'name' => 'Tradeify',
                'logo' => 'images/brokers/tradeify.jpeg',
                'description' => 'Modern trading platform with streamlined execution and analytics.',
                'is_file_upload' => true,
                'is_auto_sync' => false,
                'types' => [BrokerType::Options, BrokerType::Stocks],
            ],
        ];

        foreach ($brokers as $brokerData) {
            $broker = Broker::query()->updateOrCreate(
                ['name' => $brokerData['name']],
                [
                    'logo' => $brokerData['logo'],
                    'description' => $brokerData['description'],
                    'is_file_upload' => $brokerData['is_file_upload'],
                    'is_auto_sync' => $brokerData['is_auto_sync'],
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
