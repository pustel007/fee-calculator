<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Mapper\MapProvider;

use LogicException;
use Pustel007\FeeCalculator\Model\BreakpointsMap;

abstract class MapProvider implements MapProviderInterface
{
    protected $breakpointsMap;

    abstract protected function retrieve(): void;

    public function provide(): BreakpointsMap
    {
        $this->retrieve();

        if (
            !($this->breakpointsMap instanceof BreakpointsMap)
            || count($this->breakpointsMap->breakpoints()) < 2
        ) {
            throw new LogicException('Invalid breakpointsMap data');
        }

        return $this->breakpointsMap;
    }
}
