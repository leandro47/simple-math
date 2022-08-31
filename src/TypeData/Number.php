<?php

namespace Leandro47\SimpleMath\TypeData;

use Leandro47\SimpleMath\Interfaces\TypeValue\NumberInterface;

class Number implements NumberInterface
{
    private float $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function with(mixed $value): NumberInterface
    {
        return new self($value);
    }

    public function set(mixed $value): void
    {
        $this->value = $value;
    }

    public function get(): NumberInterface
    {
        return $this;
    }

    public function value(): float
    {
        return (float) $this->value;
    }

    public function multiplication(NumberInterface $value): NumberInterface
    {
        $this->set($this->value() * $value->value());

        return $this;
    }

    public function subtraction(NumberInterface $value): NumberInterface
    {
        $this->set($this->value() - $value->value());

        return $this;
    }

    public function sum(NumberInterface $value): NumberInterface
    {
        $this->set($this->value() + $value->value());

        return $this;
    }

    public function divider(NumberInterface $value): NumberInterface
    {
        $this->set($this->value() / $value->value());

        return $this;
    }
}
