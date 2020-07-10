<?php
namespace App\Franc;


use App\Common\Money\Money;

class Franc extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multipler):Object
    {
        return new Franc($this->amount * $multipler);

    }
}