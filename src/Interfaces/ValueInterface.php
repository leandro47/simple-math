<?php

namespace Leandro\SimplesMath\Interfaces;

interface ValueInterface
{
    public function with($value): self;

    public function set($value): void;

    public function get();

    public function toFloat(): float;
}
