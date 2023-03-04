<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator;

use Pustel007\FeeCalculator\Mapper\MapperInterface;

final class FeeResolver
{
    public function resolve(float $amount, MapperInterface $mapper): float
    {
        $fee = $mapper->interpolate($amount);

        return $this->ceil($fee, $amount);
    }

    private function ceil(float $fee, float $amount): float
    {
        return (ceil(($fee + $amount) / 5) * 5) - (round($amount * 100) / 100);
    }
}
