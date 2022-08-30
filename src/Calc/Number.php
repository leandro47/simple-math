<?php

use Leandro47\SimpleMath\Interfaces\MathInterface;
use Leandro47\SimpleMath\Interfaces\ValueInterface;
use Leandro47\SimpleMath\Value\Value;

class Number implements MathInterface
{
    private float $value;

    public function __construct()
    {
        $this->value = 0;
    }

    public function add(ValueInterface $value): MathInterface
    {
        $this->value += $value->get();
    
        return $this;
    }

    public function subtraction(ValueInterface $value): MathInterface
    {
        $this->value -= $value->get();
    
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

    public function result(): Value
    {
        return new Value(4);
    }
}
