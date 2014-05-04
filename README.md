# PHP To String

Simple library that allows you to cast any php value into string

##Installation

Add to your composer.json

```
require: {
   "coduo/php-to-string": "dev-master"
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
use Coduo\ToString\String;

$double = new String(1.12312);
echo $double; // "1.12312"

$datetime = new String(new \DateTime());
echo $datetime; // "\DateTime"

$array = new String(array('foo', 'bar', 'baz'));
echo $array; // "Array(3)"

$res = fopen(sys_get_temp_dir() . "/foo", "w");
$resource = new String($res);
echo $resource; // "Resource(stream)"

```
