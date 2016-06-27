<?php

namespace Forms\Traits;

trait Name
{
    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    public function setName(string $value)
    {
        $this->setAttribute('name', $value);
    }

    public function withName(string $value)
    {
        $this->setName($value);

        return $this;
    }
}
