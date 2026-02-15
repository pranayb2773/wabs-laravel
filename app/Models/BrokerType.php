<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\BrokerType as BrokerTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class BrokerType extends Model
{
    use HasFactory;

    public function broker(): BelongsTo
    {
        return $this->belongsTo(Broker::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => BrokerTypeEnum::class,
        ];
    }
}
