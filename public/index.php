<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Pustel007\FeeCalculator\Model\LoanProposal;
use Pustel007\FeeCalculator\FeeCalculator;

$calculator = new FeeCalculator();

foreach ([12, 24] as $term) {
    printf("term: %s\n", $term);

    foreach ([1000, 2749.45, 2750, 2750.67, 20000] as $amount) {
        $application = new LoanProposal($term, $amount);
        $fee = $calculator->calculate($application);
        
        printf("%.2f + %.2f = %d\n", $fee, $amount, $fee + $amount);
    }
}
