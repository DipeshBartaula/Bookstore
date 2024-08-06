<?php

namespace BookStore\Domain;

// Interfaces can only extend from other interfaces
interface Customer extends Payer
{
    public function getMonthlyFee(): float;
    public function getAmountToBorrow(): int;
    public function getType(): string;
}
