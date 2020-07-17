<?php

namespace App\Expression;

use App\Common\Money\Money;
use App\Bank\Bank;

interface Expression{

    public function reduce(Bank $bank, String $to):Money;
}