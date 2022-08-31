<?php

use Leandro47\SimpleMath\TypeData\Number;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateWithValue()
    {
        $value = Number::with(10);
        static::assertInstanceOf(Number::class, $value);
    }
}