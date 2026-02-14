<?php

declare(strict_types=1);

namespace App\Enums;

enum UserStatus: string
{
    case Active = 'active';
    case Pending = 'pending';
    case Blocked = 'blocked';

    public function getLabel(): string
    {
        return match ($this) {
            self::Active => __('Active'),
            self::Pending => __('Pending'),
            self::Blocked => __('Blocked'),
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Active => 'green',
            self::Pending => 'amber',
            self::Blocked => 'red',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Active => 'check-circle',
            self::Pending => 'clock',
            self::Blocked => 'x-circle',
        };
    }
}
