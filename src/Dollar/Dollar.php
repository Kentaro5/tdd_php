<?php
namespace App\Dollar;

use App\Common\Money\Money;



class Dollar extends Money
{

    public function __construct(int $amount, string $currency)
    {
        parent::__construct($amount, $currency);
    }

    //P50では、ここMoneyだったけど、PHPだとどうやるのだろう。
    public function times(int $multipler):Object
    {
        return new Dollar($this->amount * $multipler);

    }

}