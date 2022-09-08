<?php

use Leandro47\SimpleMath\Format\NumberFormat;
use PHPUnit\Framework\TestCase;

class FormatNumberTest extends TestCase
{
    public function testCreateWithInteger()
    {
        $format1 = NumberFormat::create(',', '.')->setValue(4854);
        $format2 = NumberFormat::create(',', '.')->setValue(48544854);
        $format3 = NumberFormat::create(',', '.')->setValue(85);

        static::assertInstanceOf(NumberFormat::class, $format1);

        static::assertEquals('4.854,00', $format1->show());
        static::assertEquals('48.544.854,00', $format2->show());
        static::assertEquals('85,00', $format3->show());
    }

    public function testCreateWithStringAndSymbol()
    {
        $format1 = NumberFormat::create('.', ',', 4, '$')->setValue('4854.1');
        $format2 = NumberFormat::create('.', ',', 4, '$')->setValue('48544854.589');
        $format3 = NumberFormat::create('.', ',', 4, '$')->setValue('85.0006');

        static::assertInstanceOf(NumberFormat::class, $format1);

        static::assertEquals('$ 4,854.1000', $format1->show());
        static::assertEquals('$ 48,544,854.5890', $format2->show());
        static::assertEquals('$ 85.0006', $format3->show());
    }
}
