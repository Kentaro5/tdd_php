<?php

namespace App\Sum;

use App\Common\Money\Money;
use App\Expression\Expression;
use App\Bank\Bank;

class Sum implements Expression{

    public $augend;
    public $addend;

    public function __construct(Expression $augend, Expression $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(Bank $bank, String $to):Money
    {
        $amount = $this->augend + $this->addend;

        return new Money($amount, $to);
    }

    public function plus(Expression $addend):Expression
    {
        return null;
    }
}