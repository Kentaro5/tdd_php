<?php

namespace App\Sum;

use App\Common\Money\Money;
use App\Expression\Expression;

class Sum implements Expression{

    public $augend;
    public $addend;

    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend->amount();
        $this->addend = $addend->amount();
    }

    public function reduce(String $to):Money
    {
        $amount = $this->augend + $this->addend;

        return new Money($amount, $to);
    }
}