<?php
namespace App\Dollar;


// TODO
// $5 + 10 CHF = $10(レート2:1の場合)
// $5 * 2 = $10 (済)
// amountをprivateにする
// Dollarの副作用どうする？ (済)
// Moneyの丸め処理どうする？

class Dollar
{

    public $amount;
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multipler):Object
    {
        return new Dollar($this->amount * $multipler);

    }
}