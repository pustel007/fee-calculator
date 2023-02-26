<?php

declare(strict_types=1);

namespace Pustel007\FeeCalculator\Tests;

use OutOfRangeException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Pustel007\FeeCalculator\FeeCalculator;
use Pustel007\FeeCalculator\Model\LoanProposal;

final class FeeCalculatorTest extends TestCase
{
    #[DataProvider('feeCalculatorInputOutputProvider')]
    public function testFeeCalculatorInputOutput(LoanProposal $application, string $fee): void
    {
        $calculator = new FeeCalculator();

        $this->assertEquals(sprintf('%0.2f', $calculator->calculate($application)), $fee);
    }

    public static function feeCalculatorInputOutputProvider(): array
    {
        return [
            [new LoanProposal(12, 1000), '50.00'],
            [new LoanProposal(12, 2749.45), '90.55'],
            [new LoanProposal(12, 2750.00), '90.00'],
            [new LoanProposal(12, 2750.67), '94.33'],
            [new LoanProposal(12, 20000.00), '400.00'],
            [new LoanProposal(24, 1000), '70.00'],
            [new LoanProposal(24, 2749.45), '115.55'],
            [new LoanProposal(24, 2750.00), '115.00'],
            [new LoanProposal(24, 2750.67), '119.33'],
            [new LoanProposal(24, 20000.00), '800.00'],
        ];
    }

    #[DataProvider('termOutOfRangeProvider')]
    public function testTermOutOfRange(LoanProposal $application): void
    {
        $calculator = new FeeCalculator();

        $this->expectException(OutOfRangeException::class);
        $calculator->calculate($application);
    }

    public static function termOutOfRangeProvider(): array
    {
        return [
            [new LoanProposal(13, 2000)],
            [new LoanProposal(-24, 2000)],
        ];
    }

    #[DataProvider('amountOutOfRangeProvider')]
    public function testAmountOutOfRange(LoanProposal $application): void
    {
        $calculator = new FeeCalculator();

        $this->expectException(OutOfRangeException::class);
        $calculator->calculate($application);
    }

    public static function amountOutOfRangeProvider(): array
    {
        return [
            [new LoanProposal(12, 999.99999999)],
            [new LoanProposal(12, 20000.00000001)],
        ];
    }
}
