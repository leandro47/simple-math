<?php

namespace Leandro47\SimpleMath\Interfaces\Format;

interface FormatInterface
{
    public function setValue(mixed $value): self;

    public function show(): string;
}
