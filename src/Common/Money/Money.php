<?php
namespace App\Common\Money;

class Money
{
    protected int $amount;

    public function equals(Money $money):Bool
    {
        $money_class = get_class($money);
        $this_class = get_class($this);

        //ここ他の人どうやって実装したか聞いてみよう。(P44)
        return $this->amount === $money->amount && $money_class === $this_class;
    }

    static public function Dollar(Int $amount){
        return new Dollar($amount);
    }

    static public function Franc(Int $amount){
        return new Franc($amount);
    }

}