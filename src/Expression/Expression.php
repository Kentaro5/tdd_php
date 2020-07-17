<?php

namespace App\Expression;

use App\Common\Money\Money;

interface Expression{

    public function reduce(String $to):Money;
}