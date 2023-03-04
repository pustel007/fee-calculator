<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator;

use OutOfRangeException;
use Pustel007\FeeCalculator\Mapper\MapperInterface;
use Pustel007\FeeCalculator\Mapper\MapProvider\Months12MapProvider;
use Pustel007\FeeCalculator\Mapper\MapProvider\Months24MapProvider;

final class MapperBuilder
{
    public function build(int $term): MapperInterface
    {
        switch ($term) {
            case 12:
                $mapProvider = new Months12MapProvider();
                return new Mapper\Mapper($mapProvider);
                break;
            case 24:
                $mapProvider = new Months24MapProvider();
                return new Mapper\Mapper($mapProvider);
                break;
        }

        throw new OutOfRangeException(sprintf('Unsupported term value (%s)', $term));
    }
}
