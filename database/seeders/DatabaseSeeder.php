<?php

declare(strict_types=1);

namespace Database\Seeders;

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
    }
}
