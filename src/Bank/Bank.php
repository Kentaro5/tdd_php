<?php

namespace App\Bank;

use App\Expression\Expression;
use App\Common\Money\Money;
use App\Pair\Pair;

class Bank {

    private $rates;

    public function reduce(Expression $source, String $to)
    {
        return $source->reduce( $this, $to);
    }

    public function rate( String $from, String $to ):Int
    {

        if( $from === $to ){
            return 1;
        }

        $pair = new Pair($from, $to);

        return $this->rates[$pair->hashCode()];
    }

    public function addRate(String $from, String $to, Int $rate)
    {
        $pair = new Pair($from, $to);
        $this->rates[$pair->hashCode()] = $rate;
    }




}