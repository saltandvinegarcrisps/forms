<?php

namespace Forms\Traits;

trait Value
{

    protected $value = '';

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
    }

    public function withValue(string $value)
    {
        $this->setValue($value);

        return $this;
    }
}
