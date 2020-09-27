<?php

namespace spec\Coduo\ToString;

use PhpSpec\ObjectBehavior;

class StringConverterSpec extends ObjectBehavior
{
    function it_convert_float_to_string()
    {
        $this->beConstructedWith(1.1);
        $this->__toString()->shouldReturn('1.1');
    }

    function it_convert_integer_to_string()
    {
        $this->beConstructedWith(20);
        $this->__toString()->shouldReturn('20');
    }

    function it_convert_boolean_to_string()
    {
        $this->beConstructedWith(true);
        $this->__toString()->shouldReturn('true');
    }

    function it_convert_object_std_class_to_string()
    {
        $this->beConstructedWith(new \stdClass);
        $this->__toString()->shouldReturn('\stdClass');
    }

    function it_convert_object_with_too_string_to_string()
    {
        $this->beConstructedWith(new Foo());
        $this->__toString()->shouldReturn('This is Foo');
    }

    function it_convert_array_to_string()
    {
        $this->beConstructedWith(['foo', 'bar']);
        $this->__toString()->shouldReturn('Array(2)');
    }

    function it_convert_closure_to_string()
    {
        $this->beConstructedWith(function() {return 'test';});
        $this->__toString()->shouldReturn('\Closure');
    }

    function it_convert_double_to_string_for_specific_locale()
    {
        $this->beConstructedWith(1.1, 'en');
        $this->__toString()->shouldReturn('1.1');
    }

    function it_convert_resource_to_string()
    {
        $resource = fopen(sys_get_temp_dir() . "/foo", "w");
        $this->beConstructedWith($resource);
        $this->__toString()->shouldReturn('Resource(stream)');
        fclose($resource);
        unlink(sys_get_temp_dir() . "/foo");
    }
}

class Foo
{
    public function __toString()
    {
        return 'This is Foo';
    }
}
