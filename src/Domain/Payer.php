<?php

namespace BookStore\Domain;

interface Payer
{
    public function pay(float $amount);
    public function isExtentOfTaxes(): bool;
}
