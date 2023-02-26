<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Mapper\MapProvider;

use Pustel007\FeeCalculator\Model\BreakpointsMap;

final class Months24MapProvider extends MapProvider implements MapProviderInterface
{
    protected function retrieve(): void
    {
        $breakpointsMap = new BreakpointsMap();

        $breakpointsMap->addBreakpoint(1000, 70);
        $breakpointsMap->addBreakpoint(2000, 100);
        $breakpointsMap->addBreakpoint(3000, 120);
        $breakpointsMap->addBreakpoint(4000, 160);
        $breakpointsMap->addBreakpoint(5000, 200);
        $breakpointsMap->addBreakpoint(6000, 240);
        $breakpointsMap->addBreakpoint(7000, 280);
        $breakpointsMap->addBreakpoint(8000, 320);
        $breakpointsMap->addBreakpoint(9000, 360);
        $breakpointsMap->addBreakpoint(10000, 400);
        $breakpointsMap->addBreakpoint(11000, 440);
        $breakpointsMap->addBreakpoint(12000, 480);
        $breakpointsMap->addBreakpoint(13000, 520);
        $breakpointsMap->addBreakpoint(14000, 560);
        $breakpointsMap->addBreakpoint(15000, 600);
        $breakpointsMap->addBreakpoint(16000, 640);
        $breakpointsMap->addBreakpoint(17000, 680);
        $breakpointsMap->addBreakpoint(18000, 720);
        $breakpointsMap->addBreakpoint(19000, 760);
        $breakpointsMap->addBreakpoint(20000, 800);

        $this->breakpointsMap = $breakpointsMap;
    }
}
