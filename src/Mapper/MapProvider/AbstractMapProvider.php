<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Mapper\MapProvider;

use Pustel007\FeeCalculator\Model\Map;
use Pustel007\FeeCalculator\Validator\MapValidator;

abstract class AbstractMapProvider implements MapProviderInterface
{
    protected $map;
    protected $mapValidator;

    public function __construct()
    {
        $this->mapValidator = new MapValidator();
    }

    abstract protected function retrieve(): void;

    public function provide(): Map
    {
        $this->retrieve();
        $this->mapValidator->validate($this->map);

        return $this->map;
    }
}
