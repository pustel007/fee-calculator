<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Mapper\MapProvider;

use Pustel007\FeeCalculator\Model\Map;

interface MapProviderInterface
{
    /**
     * Provides fee structure containing loan-to-fee links.
     *
     * @return BreakpointsMap Set of breakpoints.
     */
    public function provide(): Map;
}
