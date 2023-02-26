<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Mapper;

interface MapperInterface
{
    /**
     * Interpolates fee between the breakpoints of the fee structure.
     *
     * @param float $inputAmount
     * @return float The interpolated fee related to loan amount.
     */
    public function interpolate(float $inputAmount): float;
}
