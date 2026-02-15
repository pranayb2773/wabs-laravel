<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\BrokerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Broker extends Model
{
    /** @use HasFactory<BrokerFactory> */
    use HasFactory;

    public function brokerTypes(): HasMany
    {
        return $this->hasMany(BrokerType::class);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_file_upload' => 'boolean',
            'is_auto_sync' => 'boolean',
        ];
    }
}
