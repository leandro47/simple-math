<?php

use Leandro47\SimpleMath\TypeData\Number;

require_once './vendor/autoload.php';

$value1 = Number::with(10);
$value2 = Number::with(20);

$result = $value1->sum($value2);

echo $result->value();