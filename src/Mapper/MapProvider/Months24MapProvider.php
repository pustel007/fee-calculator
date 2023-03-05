<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Mapper\MapProvider;

use Pustel007\FeeCalculator\Model\Map;

final class Months24MapProvider extends AbstractMapProvider implements MapProviderInterface
{
    protected function retrieve(): void
    {
        $map = new Map();

        $map->addBreakpoint(1000, 70);
        $map->addBreakpoint(2000, 100);
        $map->addBreakpoint(3000, 120);
        $map->addBreakpoint(4000, 160);
        $map->addBreakpoint(5000, 200);
        $map->addBreakpoint(6000, 240);
        $map->addBreakpoint(7000, 280);
        $map->addBreakpoint(8000, 320);
        $map->addBreakpoint(9000, 360);
        $map->addBreakpoint(10000, 400);
        $map->addBreakpoint(11000, 440);
        $map->addBreakpoint(12000, 480);
        $map->addBreakpoint(13000, 520);
        $map->addBreakpoint(14000, 560);
        $map->addBreakpoint(15000, 600);
        $map->addBreakpoint(16000, 640);
        $map->addBreakpoint(17000, 680);
        $map->addBreakpoint(18000, 720);
        $map->addBreakpoint(19000, 760);
        $map->addBreakpoint(20000, 800);

        $this->map = $map;
    }
}
