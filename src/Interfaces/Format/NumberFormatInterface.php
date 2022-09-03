<?php

namespace Leandro47\SimpleMath\Interfaces\Format;

interface NumberFormatInterface
{
    public static function create(string $symbol, string $thousandSeparator, string $decimalSeparator): self;
}
