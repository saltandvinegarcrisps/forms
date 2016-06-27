<?php

namespace Forms\Traits;

trait Label
{
    protected $label;

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $value)
    {
        $this->label = $value;
    }

    public function withLabel(string $value)
    {
        $this->setLabel($value);

        return $this;
    }

    public function hasLabel(): bool
    {
        return null !== $this->label;
    }
}
