<?php

namespace Leandro47\SimpleMath\Value;

use Leandro47\SimpleMath\Interfaces\ValueInterface;

class Value implements ValueInterface
{
    private $value;
    private $type;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function with($value): ValueInterface
    {
        return new self($value);
    }

    public function type(): ValueInterface
    {
        
    }

    public function set($value): void
    {
        $this->value = $value;
    }

    public function get()
    {
        return $this->value;
    }
}