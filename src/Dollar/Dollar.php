<?php
namespace App\Dollar;

use App\Common\Money\Money;



class Dollar extends Money
{

    public function __construct(int $amount, string $currency)
    {
        parent::__construct($amount, $currency);
    }

}