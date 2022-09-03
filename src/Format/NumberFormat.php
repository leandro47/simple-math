<?php

namespace Leandro47\SimpleMath\Format;

use Leandro47\SimpleMath\Interfaces\Format\NumberFormatInterface;

class NumberFormat implements NumberFormatInterface
{
    private string $symbol;
    private string $thousandSeparator;
    private string $decimalSeparator;

    public function __construct(string $decimalSeparator, string $thousandSeparator, string $symbol = '')
    {
        $this->$symbol = $symbol;
        $this->$thousandSeparator = $thousandSeparator;
        $this->$decimalSeparator = $decimalSeparator;
    }

    public static function create(string $decimalSeparator, string $thousandSeparator, string $symbol = ''): self
    {
        return new self($symbol, $thousandSeparator, $decimalSeparator);
    }
}
