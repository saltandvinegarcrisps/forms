<?php

namespace Forms\Elements;

use Forms\Traits\Attributes;
use Forms\Traits\Metadata;
use Forms\Traits\AttributeValue;
use Forms\Traits\Label;
use Forms\Traits\Name;

abstract class AbstractElement implements ElementInterface
{
    use Attributes, Metadata, AttributeValue, Label, Name;

    protected $type;

    protected $format = '<input %s>';

    protected $parser = [];

    public function __construct($name, array $options = [])
    {
        $this->setParseOption('attributes', [$this, 'setAttributes']);

        $this->setParseOption('label', [$this, 'setLabel']);

        $this->setParseOption('value', [$this, 'setValue']);

        $this->setParseOption('options', [$this, 'setOptions']);

        $this->parseOptions($options);

        $this->setName($name);

        if ($this->type) {
            $this->setAttribute('type', $this->type);
        }
    }

    protected function setParseOption($key, $callback)
    {
        $this->parser[$key] = $callback;
    }

    protected function parseOptions(array $options)
    {
        foreach ($this->parser as $key => $callback) {
            if (false === array_key_exists($key, $options)) {
                continue;
            }

            $callback($options[$key]);
        }
    }

    public function getType()
    {
        return $this->type;
    }
}
