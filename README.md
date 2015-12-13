# PHP To String

[![Build Status](https://travis-ci.org/coduo/php-to-string.svg?branch=master)](https://travis-ci.org/coduo/php-to-string)

Simple library that allows you to cast any php value into string

##Installation

Add to your composer.json

```
require: {
   "coduo/php-to-string": "2.0.*"
}
```

##Usage

Supported types:

* string
* integer
* float/double
* object
* callback
* array
* resource

```php
use Coduo\ToString\StringConverter;

$double = new StringConverter(1.12312);
echo $double; // "1.12312"

$datetime = new StringConverter(new \DateTime());
echo $datetime; // "\DateTime"

$array = new StringConverter(array('foo', 'bar', 'baz'));
echo $array; // "Array(3)"

$res = fopen(sys_get_temp_dir() . "/foo", "w");
$resource = new StringConverter($res);
echo $resource; // "Resource(stream)"

```
