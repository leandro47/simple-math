<?php

use Leandro47\SimpleMath\Format\NumberFormat;
use Leandro47\SimpleMath\TypeValue\Number;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    public function testCreateWithString()
    {
        $value = Number::create('10');
        static::assertInstanceOf(Number::class, $value);
        static::assertEquals(10, $value->value());
    }

    public function testCreateWithInt()
    {
        $value = Number::create(10);
        static::assertInstanceOf(Number::class, $value);
        static::assertEquals(10, $value->value());
    }

    public function testCreateWithFloat()
    {
        $value = Number::create(10.0);
        static::assertInstanceOf(Number::class, $value);
        static::assertEquals(10, $value->value());
    }

    public function testSetValue()
    {
        $value = new Number(12);
        $value->set(7);
        static::assertInstanceOf(Number::class, $value);
        static::assertEquals(7, $value->value());
    }

    public function testMultiplication()
    {
        $value1 = Number::create(2000.50);
        $value2 = Number::create(2);
        $result = $value1->multiplication($value2)->sum($value2);

        static::assertInstanceOf(Number::class, $value1);
        static::assertInstanceOf(Number::class, $value2);
        static::assertInstanceOf(Number::class, $result);
        static::assertEquals(2000.50, $value1->value());
        static::assertEquals(2, $value2->value());
        static::assertEquals(4003, $result->value());
    }

    public function testSubtraction()
    {
        $value1 = Number::create(10);
        $value2 = Number::create(2);
        $result = $value1->subtraction($value2);

        static::assertInstanceOf(Number::class, $value1);
        static::assertInstanceOf(Number::class, $value2);
        static::assertInstanceOf(Number::class, $result);
        static::assertEquals(10, $value1->value());
        static::assertEquals(2, $value2->value());
        static::assertEquals(8, $result->value());
    }

    public function testSum()
    {
        $value1 = Number::create(10.5);
        $value2 = Number::create(2.5);
        $value3 = Number::create('7.5');
        $value4 = Number::create('0,5');
        $result = $value1->sum($value2)->sum($value3)->subtraction($value4);

        static::assertInstanceOf(Number::class, $value1);
        static::assertInstanceOf(Number::class, $result);
        static::assertEquals(20, $result->value());
        static::assertEquals(10.5, $value1->value());
    }

    public function testSumZero()
    {
        $value1 = Number::create('0,00');
        $value2 = Number::create(28.001);
        $result = $value1->sum($value2)->sum(Number::create('0.00'));

        static::assertInstanceOf(Number::class, $value1);
        static::assertEquals(0, $value1->value());
        static::assertEquals(28.001, $result->value());
    }

    public function testDivider()
    {
        $value1 = Number::create(10);
        $value2 = Number::create(2);
        $result = $value1->divider($value2);

        static::assertInstanceOf(Number::class, $value1);
        static::assertEquals(10, $value1->value());
        static::assertEquals(2, $value2->value());
        static::assertEquals(5, $result->value());
    }

    public function testFailCreateWithTextEmpty()
    {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage("Value not to be empty");

        Number::create('');
    }

    public function testFailCreateWithNull()
    {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage("Value need to be a number type");

        Number::create(null);
    }

    public function testFailCreateWithWord()
    {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage("Value need to be a number type");

        Number::create('word');
    }

    public function testFailDividerByZero()
    {
        static::expectException(DivisionByZeroError::class);
        static::expectExceptionMessage("Value not to be zero");

        $value1 = Number::create(0);
        $value2 = Number::create(0);
        $value1->divider($value2);
    }

    public function testFormatSettingClass()
    {
        $value1 = Number::create(2000.5);
        $value2 = Number::create(20500.5);
        $value3 = Number::create(10.558);
        $value4 = Number::create(8592759);

        $format = NumberFormat::create(',', '.', 2, 'R$');

        static::assertEquals('R$ 2.000,50', $value1->format($format));
        static::assertEquals('R$ 20.500,50', $value2->format($format));
        static::assertEquals('R$ 10,56', $value3->format($format));
        static::assertEquals('R$ 8.592.759,00', $value4->format($format));
    }

    function testCreatingNumberWithFormatValueClass()
    {
        $format = NumberFormat::create(',', '.', 2, 'R$');

        $value1 = Number::create(0.5, $format);
        $value2 = Number::create(4.5848, $format);
        $value3 = Number::create(31234567894.01, $format);

        static::assertEquals('R$ 0,50', $value1->format());
        static::assertEquals('R$ 4,58', $value2->format());
        static::assertEquals('R$ 31.234.567.894,01', $value3->format());
    }

    public function testFormatWithoutSettigns()
    {
        $value1 = Number::create(2000.5);

        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage('NumberFormatInterface is not defined');

        $value1->format();
    }
}
