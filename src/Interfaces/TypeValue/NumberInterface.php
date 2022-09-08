<?php

namespace Leandro47\SimpleMath\Interfaces\TypeValue;

use Leandro47\SimpleMath\Interfaces\Format\NumberFormatInterface;

interface NumberInterface extends ValueInterface
{
    /**
     * Multiplicate an number
     *
     * @param NumberInterface $value
     * @return self
     */
    public function multiplication(NumberInterface $value): self;

    /**
     * Divider an number
     *
     * @param NumberInterface $value
     * @return self
     */
    public function divider(NumberInterface $value): self;

    /**
     * Subtraction an number
     *
     * @param NumberInterface $value
     * @return self
     */
    public function subtraction(NumberInterface $value): self;

    /**
     * Sum an number
     *
     * @param NumberInterface $value
     * @return self
     */
    public function sum(NumberInterface $value): self;

    /**
     * Create an Number
     *
     * @param mixed $value
     * @param NumberFormatInterface|null $numberFormat
     * @return self
     */
    public static function create(mixed $value, ?NumberFormatInterface $numberFormat = null): self;
}
