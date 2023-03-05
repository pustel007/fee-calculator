<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Model;

final class Map
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
    public function getBreakpoints(): array
    {
        return $this->breakpoints;
    }
}
