<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Validator;

use OutOfRangeException;
use Pustel007\FeeCalculator\Model\LoanProposal;

class LoanProposalValidator
{
    public const TERM_12 = 12;
    public const TERM_24 = 24;

    public const TERMS = [
        self::TERM_12,
        self::TERM_24,
    ];

    public const AMOUNT_MINIMUM = 1000;
    public const AMOUNT_MAXIMUM = 20000;

    public function validate(LoanProposal $loanProposal): void
    {
        if (!in_array($loanProposal->getTerm(), self::TERMS)) {
            throw new OutOfRangeException(sprintf('Invalid term (%s)', $loanProposal->getTerm()));
        }

        if (
            $loanProposal->getAmount() < self::AMOUNT_MINIMUM
            || $loanProposal->getAmount() > self::AMOUNT_MAXIMUM
        ) {
            throw new OutOfRangeException(sprintf('Invalid amount (%s)', $loanProposal->getAmount()));
        }
    }
}
