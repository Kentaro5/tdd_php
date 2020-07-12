<?php
namespace App\Common\Money;

use App\Dollar\Dollar;
use App\Franc\Franc;

class Money
{
    protected int $amount;
    protected string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function times(Int $multiplier){
        return null;
    }

    public function equals(Object $object):Bool
    {

        return $this->amount === $object->amount && $this->currency === $object->currency;
    }

    public function currency():String
    {
        return $this->currency;
    }

    static public function Dollar(Int $amount){
        return new Dollar($amount, 'USD');
    }

    static public function Franc(Int $amount){
        return new Franc($amount, 'CHF');
    }

}