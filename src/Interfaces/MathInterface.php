<?php

namespace Leandro47\SimpleMath\Interfaces;

use Leandro47\SimpleMath\Interfaces\ValueInterface;

interface MathInterface
{
    public function add(ValueInterface $value): self;

    public function subtraction(ValueInterface $value): self;

    public function multiplication(ValueInterface $value): self;

    public function divider(ValueInterface $value): self;
    
    public function result(): ValueInterface;
}
