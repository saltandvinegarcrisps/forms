<?php

namespace Forms\Traits;

trait AttributeValue
{
    public function getValue()
    {
        return $this->getAttribute('value');
    }

    public function setValue($value)
    {
        $this->setAttribute('value', $value);
    }

    public function withValue($value)
    {
        $this->setValue($value);

        return $this;
    }
}
