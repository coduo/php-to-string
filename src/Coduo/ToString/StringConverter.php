<?php declare(strict_types=1);

namespace Coduo\ToString;

class StringConverter
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        $type = \gettype($this->value);

        switch ($type) {
            case 'boolean':
                return $this->castBooleanToString();
            case 'object':
                return $this->castObjectToString();
            case 'array':
                return \sprintf('Array(%d)', \count($this->value));
            case 'resource':
                return \sprintf('Resource(%s)', \get_resource_type($this->value));
            case 'float':
            case 'double':
            default:
                return (string) $this->value;
        }
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
    private function castObjectToString()
    {
        return (\method_exists($this->value, '__toString'))
            ? (string) $this->value
            : '\\' . \get_class($this->value);
    }
}
