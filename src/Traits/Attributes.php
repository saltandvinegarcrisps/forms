<?php

namespace Forms\Traits;

trait Attributes
{
    protected $attributes = [];

    public function getAttributesAsString(): string
    {
        $attrs = [];

        foreach ($this->attributes as $key => $value) {
            if (null === $value) {
                $attrs[] = $key;
            } else {
                $attrs[] = $key . '="' . htmlentities($value, ENT_COMPAT, 'UTF-8', false) . '"';
            }
        }

        return implode(' ', $attrs);
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getAttribute(string $key): string
    {
        return $this->hasAttribute($key) ? $this->attributes[$key] : '';
    }

    public function hasAttribute(string $key): bool
    {
        return array_key_exists($key, $this->attributes);
    }

    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function withAttributes(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);

        return $this;
    }

    public function setAttribute(string $key, string $value)
    {
        $this->attributes[$key] = $value;
    }

    public function withAttribute(string $key, string $value)
    {
        $this->setAttribute($key, $value);

        return $this;
    }

    public function removeAttribute(string $key)
    {
        unset($this->attributes[$key]);
    }

    public function withoutAttribute(string $key)
    {
        $this->removeAttribute($key);

        return $this;
    }
}
