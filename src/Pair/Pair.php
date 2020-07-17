<?php

namespace App\Pair;


class Pair {

    private String $from;
    private String $to;

    public function __construct( String $from, String $to )
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function equals(Object $object):Bool
    {
        return $this->from === $object->from && $this->to === $object->to;
    }

    public function hashCode()
    {
        return 0;
    }

}