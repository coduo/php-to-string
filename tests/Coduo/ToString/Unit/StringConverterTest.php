<?php

declare(strict_types=1);

namespace Coduo\ToString\Unit;

use Coduo\ToString\StringConverter;
use PHPUnit\Framework\TestCase;

final class StringConverterTest extends TestCase
{
    public function test_convert_array_to_string() : void
    {
        $converter = new StringConverter(['foo', 'bar']);
        $this->assertSame('Array(2)', $converter->__toString());
    }

    public function test_convert_boolean_to_string() : void
    {
        $converter = new StringConverter(true);
        $this->assertSame('true', $converter->__toString());
    }

    public function test_convert_closure_to_string() : void
    {
        $converter = new StringConverter(function () {
            return 'test';
        });
        $this->assertSame('\Closure', $converter->__toString());
    }

    public function test_convert_double_to_string_for_specific_locale() : void
    {
        $converter = new StringConverter(1000.10002);
        $this->assertSame('1000.10002', $converter->__toString());
    }

    public function test_convert_float_to_string() : void
    {
        $converter = new StringConverter(1.1);
        $this->assertSame('1.1', $converter->__toString());
    }

    public function test_convert_integer_to_string() : void
    {
        $converter = new StringConverter(20);
        $this->assertSame('20', $converter->__toString());
    }

    public function test_convert_object_std_class_to_string() : void
    {
        $converter = new StringConverter(new \stdClass);
        $this->assertSame('\stdClass', $converter->__toString());
    }

    public function test_convert_object_with_too_string_to_string() : void
    {
        $converter = new StringConverter(new class() {
            public function __toString() : string
            {
                return 'This is Foo';
            }
        });
        $this->assertSame('This is Foo', $converter->__toString());
    }

    public function test_convert_resource_to_string() : void
    {
        $resource = \fopen(\sys_get_temp_dir() . '/foo', 'w');
        $converter = new StringConverter($resource);
        $this->assertSame('Resource(stream)', $converter->__toString());
        \fclose($resource);
        \unlink(\sys_get_temp_dir() . '/foo');
    }
}
