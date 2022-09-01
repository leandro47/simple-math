<?php

namespace Leandro47\SimpleMath\Interfaces\TypeValue;

interface NumberInterface extends ValueInterface
{
    public function multiplication(NumberInterface $value): self;

    public function divider(NumberInterface $value): self;

    public function subtraction(NumberInterface $value): self;

    public function sum(NumberInterface $value): self;
    
}
