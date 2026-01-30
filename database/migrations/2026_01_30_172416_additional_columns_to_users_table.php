<?php

declare(strict_types=1);

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default(UserRole::User)->after('password');
            $table->string('status')->default(UserStatus::Pending)->after('role');
            $table->string('avatar')->nullable()->after('status');
            $table->boolean('is_18_plus')->default(true)->after('avatar');
            $table->boolean('is_professional_trader')->default(false)->after('is_18_plus');
            $table->boolean('tos_accepted')->default(false)->after('is_professional_trader');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'status', 'avatar', 'is_18_plus', 'is_professional_trader', 'tos_accepted']);
        });
    }
};
