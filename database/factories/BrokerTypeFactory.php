<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\BrokerType as BrokerTypeEnum;
use App\Models\Broker;
use App\Models\BrokerType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BrokerType>
 */
final class BrokerTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'broker_id' => Broker::factory(),
            'type' => fake()->randomElement(BrokerTypeEnum::cases())->value,
        ];
    }
}
