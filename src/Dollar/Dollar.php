<?php
namespace App\Dollar;


// TODO
// $5 + 10 CHF = $10(レート2:1の場合)
// $5 * 2 = $10 (済)
// amountをprivateにする(済)
// Dollarの副作用どうする？ (済)
// Moneyの丸め処理どうする？
// equals() (済)
// hashCode()
// nullとの等価性比較
// 他のオブジェクトとの等価性比較

class Dollar
{

    private $amount;
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multipler):Object
    {
        return new Dollar($this->amount * $multipler);

    }

    public function equals(Object $object):Bool
    {
        $dollar = $object;
        return $this->amount === $dollar->amount;
    }
}