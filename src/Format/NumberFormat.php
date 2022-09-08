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

    private string $decimalValue;
    private string $integerValue;

    public function __construct(
        string $decimalSeparator,
        string $thousandSeparator,
        int $precision = 2,
        string $symbol = ''
    ) {
        $this->symbol = $symbol;
        $this->thousandSeparator = $thousandSeparator;
        $this->decimalSeparator = $decimalSeparator;
        $this->precision = $precision;
    }

    public static function create(
        string $decimalSeparator,
        string $thousandSeparator,
        int $precision = 2,
        string $symbol = ''
    ): self {
        return new self($decimalSeparator, $thousandSeparator, $precision, $symbol);
    }

    public function setValue(mixed $value): FormatInterface
    {
        $this->value = $value;

        return $this;
    }

    public function show(): string
    {
        $this->setPrecision();
        $this->explodeValue();
        $this->setdecimal();
        $this->setThousandSeparator();
        $this->concatValue();

        return $this->value;
    }

    private function concatValue(): void
    {
        $value = [$this->integerValue, $this->decimalValue];

        $this->value = $this->symbol ? "{$this->symbol} " : '';
        $this->value .= implode($this->decimalSeparator, $value);
    }

    private function explodeValue(): void
    {
        $value = explode('.', $this->value);

        $this->integerValue = $value[0];
        $this->decimalValue = $value[1] ?? '';
    }

    private function setThousandSeparator(): void
    {
        $chars = array_reverse(str_split($this->integerValue));

        $qtdSeparator = 0;
        $newChars = [];
        foreach ($chars as $char) {
            if ($qtdSeparator === 3) {
                $newChars[] = $this->thousandSeparator;
                $newChars[] = $char;
                $qtdSeparator = 1;

                continue;
            }

            $newChars[] = $char;
            $qtdSeparator++;
        }

        $this->integerValue = implode('', array_reverse($newChars));
    }

    private function setPrecision(): void
    {
        $this->value = (string) round((float) $this->value, $this->precision);
    }

    private function setdecimal(): void
    {
        $i = strlen($this->decimalValue);

        while ($i < $this->precision) {
            $this->decimalValue .= '0';
            $i++;
        }
    }
}
