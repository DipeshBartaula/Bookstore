<?php

namespace BookStore\Domain\Customer;

use BookStore\Domain\Customer;
use BookStore\Domain\Person;

// classes can only extend from other classes. The only way to mix them is when a class implements an interface
class Basic extends Person implements Customer
{
    public function getMonthlyFee(): float
    {
        return 5.0;
    }

    public function getAmountToBorrow(): int
    {
        return 3;
    }

    public function getType(): string
    {
        return "Basic";
    }
    public function pay(float $amount)
    {
        echo "Paying $amount.";
    }
    public function isExtentOfTaxes(): bool
    {
        return false;
    }
}
