<?php

declare(strict_types=1);

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Trader = 'trader';

    public function getLabel(): string
    {
        return match ($this) {
            self::Admin => __('Admin'),
            self::Trader => __('Trader'),
        };
    }
}
