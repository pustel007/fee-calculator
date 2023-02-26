Fee Calculator
=====

A fee calculator that - given a monetary **amount** and a **term** (the contractual duration of the loan, expressed as a number of months) - produce an appropriate fee for a loan, based on a fee structure and a set of rules described below. 
- The fee structure does not follow a formula.
- Values in between the breakpoints are interpolated linearly between the lower bound and upper bound that they fall between.
- The number of breakpoints, their values, or storage might change.
- The term can be either 12 or 24 (number of months), values are always be within this set.
- The fee is rounded up such that fee + loan amount is an exact multiple of 5.

Example inputs/outputs:
|Loan amount  |Term       |Fee     |
|-------------|-----------|--------|
|11,500 PLN   |24 months  |460 PLN |
|19,250 PLN   |12 months  |385 PLN |

## Installation
`composer install`

## Example
```php
$calculator = new FeeCalculator();

$application = new LoanProposal(24, 2750);
$fee = $calculator->calculate($application);
// $fee = (float) 115.0
```

### Run example
`php -f ./public/index.php`

### Run tests example
`./vendor/bin/phpunit tests`