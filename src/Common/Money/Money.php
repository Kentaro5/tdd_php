<?php
namespace App\Common\Money;

class Money
{
    protected int $amount;

    public function equals(Money $money):Bool
    {
        return $this->amount === $money->amount;
    }
}