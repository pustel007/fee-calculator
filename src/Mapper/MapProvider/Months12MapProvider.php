<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Mapper\MapProvider;

use Pustel007\FeeCalculator\Model\BreakpointsMap;

final class Months12MapProvider extends AbstractMapProvider implements MapProviderInterface
{
    protected function retrieve(): void
    {
        $breakpointsMap = new BreakpointsMap();

        $breakpointsMap->addBreakpoint(1000, 50);
        $breakpointsMap->addBreakpoint(2000, 90);
        $breakpointsMap->addBreakpoint(3000, 90);
        $breakpointsMap->addBreakpoint(4000, 115);
        $breakpointsMap->addBreakpoint(5000, 100);
        $breakpointsMap->addBreakpoint(6000, 120);
        $breakpointsMap->addBreakpoint(7000, 140);
        $breakpointsMap->addBreakpoint(8000, 160);
        $breakpointsMap->addBreakpoint(9000, 180);
        $breakpointsMap->addBreakpoint(10000, 200);
        $breakpointsMap->addBreakpoint(11000, 220);
        $breakpointsMap->addBreakpoint(12000, 240);
        $breakpointsMap->addBreakpoint(13000, 260);
        $breakpointsMap->addBreakpoint(14000, 280);
        $breakpointsMap->addBreakpoint(15000, 300);
        $breakpointsMap->addBreakpoint(16000, 320);
        $breakpointsMap->addBreakpoint(17000, 340);
        $breakpointsMap->addBreakpoint(18000, 360);
        $breakpointsMap->addBreakpoint(19000, 380);
        $breakpointsMap->addBreakpoint(20000, 400);

        $this->breakpointsMap = $breakpointsMap;
    }
}
