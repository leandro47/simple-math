<?php

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
    
    public function testGetValue()
    {
        $value = new Number(12);
        $value2 = $value->get();
        static::assertInstanceOf(Number::class, $value2);
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
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage("Value not to be zero");

        $value1 = Number::create(0);
        $value2 = Number::create(0);
        $value1->divider($value2);
    }
}
