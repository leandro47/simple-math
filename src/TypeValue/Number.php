<?php

namespace Leandro47\SimpleMath\TypeValue;

use Leandro47\SimpleMath\Interfaces\TypeValue\NumberInterface;

class Number implements NumberInterface
{
    private float $value;

    public function __construct($value)
    {
        $this->set($value);
    }

    public static function with(mixed $value): NumberInterface
    {
        return new self($value);
    }

    public function set(mixed $value): void
    {
        if (!is_null($value)) {
            $value = trim($value);
            $value = str_replace(',', '.', $value);
        }

        if ($value != 0 && empty($value)) {
            throw new \InvalidArgumentException("Value not to be empty");
        }

        if (filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT) === '') {
            throw new \InvalidArgumentException("Value need to be a number type");
        }

        $this->value = (float) $value;
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
        return new self($this->value() * $value->value());
    }

    public function subtraction(NumberInterface $value): NumberInterface
    {
        return new self($this->value() - $value->value());
    }

    public function sum(NumberInterface $value): NumberInterface
    {
        return new self($this->value() + $value->value()) ;
    }

    public function divider(NumberInterface $value): NumberInterface
    {
        if ($this->value() == 0 || $value->value() == 0) {
            throw new \InvalidArgumentException("Value not to be zero");
        }

        return new self($this->value() / $value->value());
    }
}
