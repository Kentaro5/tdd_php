<?php
namespace App\Common\Money;

use App\Dollar\Dollar;
use App\Franc\Franc;

abstract class Money
{
    protected int $amount;
    protected string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    abstract public function times(Int $multiplier):Object;


    public function equals(Money $money):Bool
    {
        $money_class = get_class($money);
        $this_class = get_class($this);

        //ここ他の人どうやって実装したか聞いてみよう。(P44)
        return $this->amount === $money->amount && $money_class === $this_class;
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