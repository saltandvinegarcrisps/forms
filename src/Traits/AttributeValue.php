<?php

namespace Forms\Traits;

trait AttributeValue
{
    public function getValue(): string
    {
        return $this->getAttribute('value');
    }

    public function setValue(string $value)
    {
        $this->setAttribute('value', $value);
    }

    public function withValue(string $value)
    {
        $this->setValue($value);

        return $this;
    }
}
