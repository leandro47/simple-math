<?php

namespace Leandro47\SimpleMath\TypeValue;

use Leandro47\SimpleMath\Interfaces\Format\FormatInterface;
use Leandro47\SimpleMath\Interfaces\Format\NumberFormatInterface;
use Leandro47\SimpleMath\Interfaces\TypeValue\NumberInterface;

class Number implements NumberInterface
{
    private float $value;
    private ?NumberFormatInterface $numberFormat;

    public function __construct(mixed $value, ?NumberFormatInterface $numberFormat = null)
    {
        $this->numberFormat = $numberFormat;
        $this->set($value);
    }

    public static function create(mixed $value, ?NumberFormatInterface $numberFormat = null): NumberInterface
    {
        return new self($value, $numberFormat);
    }

    public function set(mixed $value): void
    {
        if (!is_null($value)) {
            $value = trim($value);
        }

        if ($value != 0 && empty($value)) {
            throw new \InvalidArgumentException("Value not to be empty");
        }

        if (filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT) === '') {
            throw new \InvalidArgumentException("Value need to be a number type");
        }

        $this->value = (float) $value;
    }

    public function value(): float
    {
        return (float) $this->value;
    }

    public function format(?FormatInterface $numberFormat = null): string
    {
        if (!is_null($numberFormat)) {
            return $numberFormat->setValue($this->value())->show();
        }

        if (is_null($this->numberFormat)) {
            throw new \InvalidArgumentException('NumberFormatInterface is not defined');
        }

        return $this->numberFormat->setValue($this->value())->show();
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
            throw new \DivisionByZeroError("Value not to be zero");
        }

        return new self($this->value() / $value->value());
    }
}
