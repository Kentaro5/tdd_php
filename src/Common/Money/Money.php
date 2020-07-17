<?php
namespace App\Common\Money;

use App\Expression\Expression;
use App\Sum\Sum;

class Money implements Expression
{
    protected int $amount;
    protected string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function times(Int $multiplier){
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function equals(Object $object):Bool
    {

        return $this->amount === $object->amount && $this->currency === $object->currency;
    }


    public function reduce(String $to):Money
    {

        return $this;
    }


    public function currency():String
    {
        return $this->currency;
    }

    public function plus(Money $addend):Expression
    {
        return new Money( $this->amount + $addend->amount, $this->currency );
    }

    static public function Dollar(Int $amount):Money
    {
        return new Money($amount, 'USD');
    }

    static public function Franc(Int $amount):Money
    {
        return new Money($amount, 'CHF');
    }


}