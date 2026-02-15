<?php

declare(strict_types=1);

namespace App\Enums;

enum BrokerType: string
{
    case Options = 'options';
    case Stocks = 'stocks';
    case Futures = 'futures';

    public function getLabel(): string
    {
        return match ($this) {
            self::Options => __('Options'),
            self::Stocks => __('Stocks'),
            self::Futures => __('Futures'),
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Options => 'violet',
            self::Stocks => 'blue',
            self::Futures => 'emerald',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Options => 'adjustments-horizontal',
            self::Stocks => 'chart-bar',
            self::Futures => 'arrow-trending-up',
        };
    }
}
