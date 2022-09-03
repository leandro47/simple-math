<?php

namespace Leandro47\SimpleMath\Interfaces\TypeValue;

interface ValueInterface
{
    public static function create(mixed $value): self;

    public function set(mixed $value): void;

    public function get(): ValueInterface;

    public function value(): mixed;
}
