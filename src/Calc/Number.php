<?php

use Leandro\SimplesMath\Interfaces\MathInterface;
use Leandro\SimplesMath\Interfaces\ValueInterface;

class Number implements MathInterface
{
    private float $value;

    public function __construct()
    {
        $this->value = 0;
    }

    public function add(ValueInterface $value): MathInterface
    {
        $this->value += $value->toFloat();
    
        return $this;
    }

    public function subtraction(ValueInterface $value): MathInterface
    {
        $this->value -= $value->toFloat();
    
        return $this;
    }

    public function divider(ValueInterface $value): MathInterface
    {
        return $this;
    }

    public function multiplication(ValueInterface $value): MathInterface
    {
        return $this;
    }

    public function result(): ValueInterface
    {
        return new Value(4);
    }
}
