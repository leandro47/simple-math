<?php

use Leandro47\SimpleMath\TypeData\Number;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    public function testCreateWithString()
    {
        $value = Number::with('10');
        static::assertInstanceOf(Number::class, $value);
        static::assertEquals(10, $value->value());
    }
    
    public function testCreateWithInt()
    {
        $value = Number::with(10);
        static::assertInstanceOf(Number::class, $value);
        static::assertEquals(10, $value->value());
    }
    
    public function testCreateWithFloat()
    {
        $value = Number::with(10.0);
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
    
    public function testGetValue()
    {
        $value = new Number(12);
        $value2 = $value->get();
        static::assertInstanceOf(Number::class, $value2);
    }

    public function testMultiplication()
    {
        $value1 = Number::with(2000.50);
        $value2 = Number::with(2);
        $value1->multiplication($value2);

        static::assertInstanceOf(Number::class, $value1);
        static::assertEquals(4001, $value1->value());
    }

    public function testSubtraction()
    {
        $value1 = Number::with(10);
        $value2 = Number::with(2);
        $value1->subtraction($value2);

        static::assertInstanceOf(Number::class, $value1);
        static::assertEquals(8, $value1->value());
    }
    
    public function testSum()
    {
        $value1 = Number::with(10.5);
        $value2 = Number::with(2.5);
        $value3 = Number::with('7.5');
        $value4 = Number::with('0,5');
        $value1->sum($value2)->sum($value3)->subtraction($value4);

        static::assertInstanceOf(Number::class, $value1);
        static::assertEquals(20, $value1->value());
    }

    public function testSumZero()
    {
        $value1 = Number::with('0,00');
        $value2 = Number::with(28.001);
        $value1->sum($value2)->sum(Number::with('0.00'));

        static::assertInstanceOf(Number::class, $value1);
        static::assertEquals(28.001, $value1->value());
    }

    public function testDivider()
    {
        $value1 = Number::with(10);
        $value2 = Number::with(2);
        $value1->divider($value2);

        static::assertInstanceOf(Number::class, $value1);
        static::assertEquals(5, $value1->value());
    }

    public function testCreateWithTextEmpty()
    {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage("Value not to be empty");

        Number::with('');
    }

    public function testCreateWithNull()
    {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage("Value not to be empty");

        Number::with(null);
    }

    public function testCreateWithWord()
    {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage("Value need to be a number type");

        Number::with('word');
    }

    public function testDividerByZero()
    {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage("Value not to be zero");

        $value1 = Number::with(0);
        $value2 = Number::with(0);
        $value1->divider($value2);
    }
}
