<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Mapper;

use OutOfRangeException;

final class Mapper implements MapperInterface
{
    protected $breakpointsMap;

    public function __construct(MapProvider\MapProviderInterface $breakpointsMapProvider)
    {
        $this->breakpointsMap = $breakpointsMapProvider->provide();
    }

    public function interpolate(float $inputAmount): float
    {
        $fee = null;
        $amount = null;

        if (!$this->validateAmount($inputAmount)) {
            throw new OutOfRangeException(sprintf('Invalid input amount (%s)', $inputAmount));
        }

        foreach ($this->breakpointsMap->breakpoints() as $searchAmount => $searchFee) {
            if ($searchAmount >= $inputAmount) {
                $factor = ($inputAmount - $amount) / ($searchAmount - $amount);
                return (float) $fee + $factor * ($searchFee - $fee);
            }

            $fee = $searchFee;
            $amount = $searchAmount;
        }

        return (float) $fee;
    }

    private function validateAmount(float $inputAmount): bool
    {
        if (
            $inputAmount < $this->breakpointsMap->getAmountMin()
            || $inputAmount > $this->breakpointsMap->getAmountMax()
        ) {
            return false;
        }

        return true;
    }
}
