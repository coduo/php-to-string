<?php

namespace Coduo\ToString;

class StringConverter
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @var string
     */
    private $locale;

    /**
     * @param mixed $value
     * @param string $locale
     */
    public function __construct($value, $locale = 'en')
    {
        $this->value = $value;
        $this->locale = $locale;
    }

    public function __toString()
    {
        $type = gettype($this->value);
        switch ($type) {
            case 'float':
            case 'double':
                return $this->castDoubleToString();
            case 'boolean':
                return $this->castBooleanToString();
            case 'object':
                return $this->castObjectToString();
            case 'array':
                return sprintf('Array(%d)', count($this->value));
            case 'resource':
                return sprintf("Resource(%s)", get_resource_type($this->value));
            default:
                return (string) $this->value;
        }
    }

    /**
     * @return string
     */
    private function castObjectToString()
    {
        return (method_exists($this->value, '__toString'))
            ? (string)$this->value
            : '\\' . get_class($this->value);
    }

    /**
     * @return string
     */
    private function castBooleanToString()
    {
        return ($this->value) ? 'true' : 'false';
    }

    /**
     * @return string
     */
    private function castDoubleToString()
    {
        $formatter = new \NumberFormatter($this->locale, \NumberFormatter::DEFAULT_STYLE);
        return $formatter->format($this->value);
    }
}
