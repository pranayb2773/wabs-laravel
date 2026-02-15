<?php

declare(strict_types=1);

use App\Enums\BrokerType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('broker_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('broker_id')->constrained()->cascadeOnDelete();
            $table->string('type')->default(BrokerType::Options->value);
            $table->timestamps();

            $table->unique(['broker_id', 'type']);
            $table->index('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('broker_types');
    }
};
