<?php
namespace App\Franc;


class Franc
{

    private $amount;
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multipler):Object
    {
        return new Franc($this->amount * $multipler);

    }

    public function equals(Object $object):Bool
    {
        $dollar = $object;
        return $this->amount === $dollar->amount;
    }
}