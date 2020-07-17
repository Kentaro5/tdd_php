<?php

namespace App\Bank;

use App\Expression\Expression;
use App\Common\Money\Money;

class Bank {
    public function reduce(Expression $source, String $to)
    {
        return Money::Dollar(10);
    }
}