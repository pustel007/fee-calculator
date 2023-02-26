<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator;

use Pustel007\FeeCalculator\Model\LoanProposal;

interface FeeCalculatorInterface
{
     /**
      * Produces an appropriate fee for a loan, based on a fee structure.
      *
      * @param LoanProposal $application
      * @return float The calculated total fee.
      */
    public function calculate(LoanProposal $application): float;
}
