<?php

namespace Forms\Traits;

trait Metadata
{
    protected $meta = [];

    public function getMeta(string $key, $default = null): string
    {
        return array_key_exists($key, $this->meta) ? $this->meta[$key] : $default;
    }

    public function setMeta(string $key, string $value)
    {
        $this->meta[$key] = $value;
    }

    public function withMeta(string $key, string $value)
    {
        $this->setMeta($key, $value);

        return $this;
    }
}
