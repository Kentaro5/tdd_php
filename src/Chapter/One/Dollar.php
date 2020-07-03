<?php
namespace App\Chapter\One;


// TODO
// $5 + 10 CHF = $10(レート2:1の場合)
// $5 * 2 = $10 (済)
// amountをprivateにする
// Dollarの副作用どうする？
// Moneyの丸め処理どうする？

class Dollar
{

    public $amount;
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multipler):void
    {
        $this->amount = $this->amount * $multipler;
    }
}