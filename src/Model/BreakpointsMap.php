<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Model;

final class BreakpointsMap
{
    private array $breakpoints;

    public function __construct()
    {
        $this->breakpoints = [];
    }

    public function addBreakpoint(int $amount, float $fee): self
    {
        $this->breakpoints[$amount] = $fee;
        asort($this->breakpoints);
        return $this;
    }

    /**
     * Set of breakpoints containing loan-to-fee links.
     */
    public function breakpoints(): array
    {
        return $this->breakpoints;
    }

    /**
     * The lowest amount in the set.
     */
    public function getAmountMin(): int
    {
        return array_keys($this->breakpoints)[0];
    }

    /**
     * The highest amount in the set.
     */
    public function getAmountMax(): int
    {
        return array_keys($this->breakpoints)[count($this->breakpoints) - 1];
    }
}
