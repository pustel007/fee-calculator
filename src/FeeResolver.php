<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator;

final class FeeResolver
{
    public function resolve(float $amount, Mapper\MapperInterface $mapper): float
    {
        $fee = $mapper->interpolate($amount);

        return $this->ceil($fee, $amount);
    }

    private function ceil(float $fee, float $amount): float
    {
        return (ceil(($fee + $amount) / 5) * 5) - (round($amount * 100) / 100);
    }
}
