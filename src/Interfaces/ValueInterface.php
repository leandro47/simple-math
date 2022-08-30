<?php

namespace Leandro47\SimpleMath\Interfaces;

interface ValueInterface
{
    public static function with($value): ValueInterface;

    public static function type(): ValueInterface;

    public function set($value): void;

    public function get();
}
