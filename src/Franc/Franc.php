<?php
namespace App\Franc;


use App\Common\Money\Money;

class Franc extends Money
{

    public function __construct(int $amount, string $currency)
    {
        parent::__construct($amount, $currency);
    }

}