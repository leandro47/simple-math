<?php

use Leandro47\SimpleMath\TypeValue\Number;

require_once './vendor/autoload.php';

$value1 = Number::create(10);
$value2 = Number::create(20);

$result = $value1->sum($value2);

echo $result->value(); // 30