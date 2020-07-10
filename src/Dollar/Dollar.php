<?php
namespace App\Dollar;

use App\Common\Money\Money;



class Dollar extends Money
{

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    //P50では、ここMoneyだったけど、PHPだとどうやるのだろう。
    public function times(int $multipler):Object
    {
        return new Dollar($this->amount * $multipler);

    }


}