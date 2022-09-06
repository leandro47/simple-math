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
        $this->setThousandSeparator();

        return $this->value;
    }

    private function setThousandSeparator(): void
    {
        $value = explode($this->decimalSeparator, $this->value);
        $chars = str_split($value[0]);
        $chars = array_reverse($chars);

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

        $value[0] = implode('', array_reverse($newChars));

        $this->value = $this->symbol . ' ' . implode($this->decimalSeparator, $value);
    }

    private function setPrecision(): void
    {
        $this->value = (string) round((float) $this->value, $this->precision);
        $value = explode('.', $this->value);

        $decimal = $value[1] ?? '';
        $value[1] = $this->setdecimal($decimal);

        $this->value = implode($this->decimalSeparator, $value);
    }

    private function setdecimal(string $value): string
    {
        $i = strlen($value);
        while ($i < $this->precision) {
            $value .= '0';
            $i++;
        }

        return $value;
    }
}
