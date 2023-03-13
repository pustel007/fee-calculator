<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Mapper;

use OutOfRangeException;
use Pustel007\FeeCalculator\Mapper\MapProvider\Months12MapProvider;
use Pustel007\FeeCalculator\Mapper\MapProvider\Months24MapProvider;

final class MapperBuilder
{
    public function build(int $term): MapperInterface
    {
        switch ($term) {
            case 12:
                $months12MapProvider = new Months12MapProvider();
                return new Mapper($months12MapProvider);
                break;
            case 24:
                $months24MapProvider = new Months24MapProvider();
                return new Mapper($months24MapProvider);
                break;
        }

        throw new OutOfRangeException(sprintf('Unsupported term value (%s)', $term));
    }
}
