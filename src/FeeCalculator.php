<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator;

use Pustel007\FeeCalculator\FeeCalculatorInterface;
use Pustel007\FeeCalculator\Helper\FeeFormatterHelper;
use Pustel007\FeeCalculator\Mapper\MapperBuilder;
use Pustel007\FeeCalculator\Mapper\MapperInterface;
use Pustel007\FeeCalculator\Model\LoanProposal;
use Pustel007\FeeCalculator\Validator\LoanProposalValidator;

class FeeCalculator implements FeeCalculatorInterface
{
    private LoanProposalValidator $applicationValidator;
    private MapperBuilder $mapperBuilder;

    public function __construct()
    {
        $this->applicationValidator = new LoanProposalValidator();
        $this->mapperBuilder = new MapperBuilder();
    }

    public function calculate(LoanProposal $application): float
    {
        $this->applicationValidator->validate($application);

        /** @var MapperInterface $mapper */
        $mapper = $this->mapperBuilder->build($application->getTerm());
        $fee = $mapper->interpolate($application->getAmount());

        return FeeFormatterHelper::ceil(
            $fee,
            $application->getAmount()
        );
    }
}
