<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator;

use Pustel007\FeeCalculator\FeeCalculatorInterface;
use Pustel007\FeeCalculator\Model\LoanProposal;

class FeeCalculator implements FeeCalculatorInterface
{
    private $mapperBuilder;
    private $feeResolver;

    public function __construct()
    {
        $this->mapperBuilder = new MapperBuilder();
        $this->feeResolver = new FeeResolver();
    }

    public function calculate(LoanProposal $application): float
    {
        $mapper = $this->mapperBuilder->build($application->term());
        $fee = $this->feeResolver->resolve($application->amount(), $mapper);

        return $fee;
    }
}
