<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Mapper;

use Pustel007\FeeCalculator\Mapper\MapProvider\MapProviderInterface;

final class Mapper implements MapperInterface
{
    protected $map;

    public function __construct(MapProviderInterface $mapProvider)
    {
        $this->map = $mapProvider->provide();
    }

    public function interpolate(float $inputAmount): float
    {
        $fee = null;
        $amount = null;

        foreach ($this->map->getBreakpoints() as $searchAmount => $searchFee) {
            if ($searchAmount >= $inputAmount) {
                $factor = ($inputAmount - $amount) / ($searchAmount - $amount);
                return (float) $fee + $factor * ($searchFee - $fee);
            }

            $fee = $searchFee;
            $amount = $searchAmount;
        }

        return (float) $fee;
    }
}
