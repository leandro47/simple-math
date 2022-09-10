
# simple-math ![Tests Passing](https://github.com/leandro47/simple-math/actions/workflows/php.yml/badge.svg)

Makes simple math calculations and format the results.


## Type of values

* Number
## Installation

Install with **composer**

```bash
composer require leandro47/simple-math
```
    
## Number

### Expressions supported
* sum `+`
* subtraction `-`
* divider `/`
* multiplication `*`

## Functions
* [Sum values](https://github.com/leandro47/simple-math/#sum-values)
* [Subtraction values](https://github.com/leandro47/simple-math/#subtraction-values)
* [Divider values](https://github.com/leandro47/simple-math/#divider-values)
* [Multiplication values](https://github.com/leandro47/simple-math/#multiplication-values)
* [Format values](https://github.com/leandro47/simple-math/#format-values)

## Use/Examples

### Creating a number:
```php
use Leandro47\SimpleMath\TypeValue\Number;

$value = Number::create(10);
echo $value->value(); // output 10
```

### Sum values
```php
use Leandro47\SimpleMath\TypeValue\Number;

$value1 = Number::create(10.5);
$value2 = Number::create(10.5);

$result = $value1->sum($value2);

echo $result->value(); // 21
```

### Subtraction values
```php
$value1 = Number::create(10);
$value2 = Number::create(11);

$result = $value1->subtraction($value2);

echo $result->value(); // -1
```

### Divider values
```php
$value1 = Number::create(10);
$value2 = Number::create(10);

echo $value1->divider($value2)->value(); // 1;
```

You may get an error when you try to divide with zero, that's why that is necessary
use an try catch block with `DivisionByZeroError`.
```php
$value1 = Number::create(10);
$value2 = Number::create(0);

try {
    $result =  $value1->divider($value2)->value();
} catch (DivisionByZeroError $e) {
    $result = $e->getMessage();
}

echo $result; // Value not to be zero

```
### Multiplication values
```php
use Leandro47\SimpleMath\TypeValue\Number;

$value1 = Number::create(2);
$value2 = Number::create(5);

echo $value1->multiplication($value2)->value(); // 10
```

### Format values
```php
use Leandro47\SimpleMath\Format\NumberFormat;

$decimalSeparator = ',';
$thousandSeparator = '.';

$format = NumberFormat::create($decimalSeparator, $thousandSeparator);
$format->setValue(1000);
echo $format->show(); // "1.000,00"
```
#### Precision
If you want to add decimal places just add an extra parameter `$precision`.

```php
use Leandro47\SimpleMath\Format\NumberFormat;

$decimalSeparator = ',';
$thousandSeparator = '.';
$precision = 4;

$format = NumberFormat::create($decimalSeparator, $thousandSeparator, $precision);

echo $format->setValue(1000)->show(); // "1.000,0000"
echo $format->setValue(1000.45895)->show(); // "1.000,4590"
```
#### Symbol
You can also add a prefix before the number just add an extra parameter `$symbol`.

```php
use Leandro47\SimpleMath\Format\NumberFormat;

$decimalSeparator = ',';
$thousandSeparator = '.';
$precision = 2;
$symbol = 'R$';

$format = NumberFormat::create($decimalSeparator, $thousandSeparator, $precision, $symbol);

echo $format->setValue(1000.5)->show(); // "R$ 1.000,50"
```
You can add the format when you show the result of some calculation.

```php
use Leandro47\SimpleMath\Format\NumberFormat;
use Leandro47\SimpleMath\TypeValue\Number;

$decimalSeparator = ',';
$thousandSeparator = '.';
$precision = 2;
$symbol = 'R$';

$format = NumberFormat::create($decimalSeparator, $thousandSeparator, $precision, $symbol);
$value1 = Number::create(10.5, $format);

echo $value1->format(); // "R$ 10.50"
echo $format->setValue(1000.5)->show(); // "R$ 1.000,50"
```
or

```php
$decimalSeparator = ',';
$thousandSeparator = '.';
$precision = 2;
$symbol = 'R$';

$format = NumberFormat::create($decimalSeparator, $thousandSeparator, $precision, $symbol);

$value1 = Number::create(10.5);
$value2 = Number::create(1000.5);

echo $value1->multiplication($value2)->format($format); // "R$ 10.505,25"
```


## Licence

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://github.com/leandro47/simple-math/blob/master/licence.md)


