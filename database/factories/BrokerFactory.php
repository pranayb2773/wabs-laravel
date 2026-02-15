<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Broker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Broker>
 */
final class BrokerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'logo' => fake()->imageUrl(256, 256, 'business', true, 'broker'),
            'description' => fake()->paragraph(),
        ];
    }
}
