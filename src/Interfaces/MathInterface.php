<?php

namespace Leandro\SimplesMath\Interfaces;

interface MathInterface
{
    public function add(ValueInterface $value): self;

    public function subtraction(ValueInterface $value): self;

    public function multiplication(ValueInterface $value): self;

    public function divider(ValueInterface $value): self;
    
    public function result(): ValueInterface;
}
