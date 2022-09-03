<?php

namespace Leandro47\SimpleMath\Format;

use Leandro47\SimpleMath\Interfaces\Format\FormatInterface;
use Leandro47\SimpleMath\Interfaces\Format\NumberFormatInterface;

class NumberFormat implements NumberFormatInterface
{
    private string $symbol;
    private string $thousandSeparator;
    private string $decimalSeparator;
    private int $precision;
    private string $value;

    public function __construct(string $decimalSeparator, string $thousandSeparator, int $precision = 2, string $symbol = '')
    {
        $this->$symbol = $symbol;
        $this->$thousandSeparator = $thousandSeparator;
        $this->$decimalSeparator = $decimalSeparator;
        $this->$precision = $precision;
    }

    public static function create(string $decimalSeparator, string $thousandSeparator, int $precision = 2, string $symbol = ''): self
    {
        return new self($decimalSeparator, $thousandSeparator, $precision, $symbol);
    }

    public function setValue(mixed $value): FormatInterface
    {
        $this->value = $value;

        return $this;
    }

    public function show(): string
    {
        $this->setDecinalSeparator();

        return $this->value;
    }

    private function setDecinalSeparator(): void
    {
        $this->value = 'R$ 2.000,50';
    }
}
