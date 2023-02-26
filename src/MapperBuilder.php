<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator;

use OutOfRangeException;

final class MapperBuilder
{
    public function build(int $term): Mapper\MapperInterface
    {
        switch ($term) {
            case 12:
                $mapProvider = new Mapper\MapProvider\Months12MapProvider();
                return new Mapper\Mapper($mapProvider);
                break;
            case 24:
                $mapProvider = new Mapper\MapProvider\Months24MapProvider();
                return new Mapper\Mapper($mapProvider);
                break;
        }

        throw new OutOfRangeException(sprintf('Unsupported term value (%s)', $term));
    }
}
