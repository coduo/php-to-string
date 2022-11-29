# PHP To String

Simple library that converts PHP values into strings.

Status: 

![Build Status](https://github.com/coduo/php-to-string/workflows/Tests/badge.svg?branch=3.x)
[![Latest Stable Version](https://poser.pugx.org/coduo/php-to-string/v/stable)](https://packagist.org/packages/coduo/php-to-string)
[![Total Downloads](https://poser.pugx.org/coduo/php-to-string/downloads)](https://packagist.org/packages/coduo/php-to-string)
[![Latest Unstable Version](https://poser.pugx.org/coduo/php-to-string/v/unstable)](https://packagist.org/packages/coduo/php-to-string)
[![License](https://poser.pugx.org/coduo/php-to-string/license)](https://packagist.org/packages/coduo/php-to-string)

Simple library that allows you to cast any php value into string

## Installation

```
composer require coduo/php-to-string
```

## Usage

Supported types:

* string
* integer
* float/double
* object
* callable
* array
* resource

```php
use Coduo\ToString\StringConverter;

$string = new StringConverter('foo');
echo $string; // "foo"

$double = new StringConverter(1.12312);
echo $double; // "1.12312"

$integer = new StringConverter(1);
echo $integer; // "1"

$datetime = new StringConverter(new \DateTime());
echo $datetime; // "\DateTime"

$array = new StringConverter(['foo', 'bar', 'baz']);
echo $array; // "Array(3)"

$res = fopen(sys_get_temp_dir() . "/foo", "w");
$resource = new StringConverter($res);
echo $resource; // "Resource(stream)"

```
