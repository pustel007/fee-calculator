<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator;

final class FeeFormatter
{
    public static function ceil(float $fee, float $amount): float
    {
        return ceil(($fee + $amount) / 5) * 5 - round($amount * 100) / 100;
    }
}
