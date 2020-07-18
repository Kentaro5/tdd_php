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
        $amount = $this->augend->reduce($bank, $to)->amount() + $this->addend->reduce($bank, $to)->amount();
        return new Money($amount, $to);
    }

    public function plus(Expression $addend):Expression
    {
        return new Sum($this, $addend);
    }

    public function times(Int $multiplier):Expression
    {
        return new Sum( $this->augend->times($multiplier), $this->addend->times($multiplier) );
    }
}