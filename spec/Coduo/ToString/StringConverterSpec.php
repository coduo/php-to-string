<?php

namespace spec\Coduo\ToString;

use PhpSpec\ObjectBehavior;

class StringConverterSpec extends ObjectBehavior
{
    /**
     * @dataProvider positiveConversionExamples
     */
    function it_convert_values_to_string($value, $expectedValue)
    {
        $this->beConstructedWith($value);
        $this->__toString()->shouldReturn($expectedValue);
    }

    function positiveConversionExamples()
    {
        return [
            [1.1, '1.1'],
            [20, '20'],
            [true, 'true'],
            [new \stdClass(), '\stdClass'],
            [new Foo(), 'This is Foo'],
            [['foo', 'bar'], 'Array(2)'],
            [function() {return 'test';}, '\Closure']
        ];
    }

    function it_convert_double_to_string_for_specific_locale()
    {
        $this->beConstructedWith(1.1, 'en');
        $this->__toString()->shouldReturn('1,1');
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
