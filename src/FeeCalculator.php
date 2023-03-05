<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator;

use Pustel007\FeeCalculator\FeeCalculatorInterface;
use Pustel007\FeeCalculator\Model\LoanProposal;
use Pustel007\FeeCalculator\Validator\LoanProposalValidator;

class FeeCalculator implements FeeCalculatorInterface
{
    private $applicationValidator;
    private $mapperBuilder;

    public function __construct()
    {
        $this->applicationValidator = new LoanProposalValidator();
        $this->mapperBuilder = new MapperBuilder();
    }

    public function calculate(LoanProposal $application): float
    {
        $this->applicationValidator->validate($application);

        $mapper = $this->mapperBuilder->build($application->getTerm());
        $fee = $mapper->interpolate($application->getAmount());

        return FeeFormatter::ceil(
            $fee,
            $application->getAmount()
        );
    }
}
