<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Mapper\MapProvider;

use Pustel007\FeeCalculator\Model\Map;

final class Months12MapProvider extends AbstractMapProvider implements MapProviderInterface
{
    protected function retrieve(): void
    {
        $map = new Map();

        $map->addBreakpoint(1000, 50);
        $map->addBreakpoint(2000, 90);
        $map->addBreakpoint(3000, 90);
        $map->addBreakpoint(4000, 115);
        $map->addBreakpoint(5000, 100);
        $map->addBreakpoint(6000, 120);
        $map->addBreakpoint(7000, 140);
        $map->addBreakpoint(8000, 160);
        $map->addBreakpoint(9000, 180);
        $map->addBreakpoint(10000, 200);
        $map->addBreakpoint(11000, 220);
        $map->addBreakpoint(12000, 240);
        $map->addBreakpoint(13000, 260);
        $map->addBreakpoint(14000, 280);
        $map->addBreakpoint(15000, 300);
        $map->addBreakpoint(16000, 320);
        $map->addBreakpoint(17000, 340);
        $map->addBreakpoint(18000, 360);
        $map->addBreakpoint(19000, 380);
        $map->addBreakpoint(20000, 400);

        $this->map = $map;
    }
}
