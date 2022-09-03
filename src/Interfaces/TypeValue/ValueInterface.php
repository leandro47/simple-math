<?php

namespace Leandro47\SimpleMath\Interfaces\TypeValue;

use Leandro47\SimpleMath\Interfaces\Format\FormatInterface;

interface ValueInterface
{
    public static function create(mixed $value): self;

    public function set(mixed $value): void;

    public function value(): mixed;

    public function format(?FormatInterface $format = null): string;
}
