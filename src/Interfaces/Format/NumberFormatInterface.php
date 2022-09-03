<?php

namespace Leandro47\SimpleMath\Interfaces\Format;

interface NumberFormatInterface extends FormatInterface
{
    public static function create(string $symbol, string $thousandSeparator, int $precision, string $decimalSeparator): self;
}
