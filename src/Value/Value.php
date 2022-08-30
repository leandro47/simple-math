<?php

use Leandro\SimplesMath\Interfaces\ValueInterface;

class Value implements ValueInterface
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function with($value): self
    {
        return new self($value);
    }

    public function set($value): void
    {
        $this->value = $value;
    }

    public function get()
    {
        return $this->value;
    }

    public function toFloat(): float
    {
        return (float) $this->value;
    }
}
