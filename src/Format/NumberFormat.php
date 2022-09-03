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
        $this->symbol = $symbol;
        $this->thousandSeparator = $thousandSeparator;
        $this->decimalSeparator = $decimalSeparator;
        $this->precision = $precision;
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
        $this->setDecimalSeparator();
        $this->setThousandSeparator();

        return $this->value;
    }

    private function setThousandSeparator(): void
    {
        $index = strripos($this->value, $this->decimalSeparator);
        $index = $index ?? 0;
        $value = explode($this->decimalSeparator, $this->value);
        $chars = str_split($value[0]);
        $chars = array_reverse($chars);

        $qtdSeparator = 0;
        $newChars = [];

        foreach ($chars as $char) {
            if ($qtdSeparator === 3) {
                $newChars[] = $this->thousandSeparator;
                $newChars[] = $char;
                $qtdSeparator = 0;

                continue;
            }

            $newChars[] = $char;
            $qtdSeparator++;
        }

        $value[0] = implode('', array_reverse($newChars));

        if (isset($value[1])) {
            $value[1] = $this->setPrecision($value[1]);
        }

        $newValue = implode($this->decimalSeparator, $value);
    }

    private function setPrecision(string $decimal): void
    {
        
    }

    private function setDecimalSeparator(): void
    {
        $this->value = str_replace('.', $this->decimalSeparator, $this->value);
    }
}
