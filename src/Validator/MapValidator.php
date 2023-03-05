<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Validator;

use LogicException;
use Pustel007\FeeCalculator\Model\Map;

class MapValidator
{
    public const BREAKPOINTS_NUMBER_MINIMUM = 2;

    public function validate(Map $map): void
    {
        if (count($map->getBreakpoints()) < self::BREAKPOINTS_NUMBER_MINIMUM) {
            throw new LogicException('Invalid map');
        }
    }
}
