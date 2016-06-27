<?php

namespace Forms;

use SplObjectStorage;
use Forms\Elements\ElementInterface;
use Forms\Traits\Attributes;
use Forms\Traits\Elements;

class Form implements \IteratorAggregate, \Countable
{
    use Attributes, Elements;

    protected $elements;

    public function __construct(array $attributes = [])
    {
        $this->setAttributes(array_merge(['accept-charset' => 'utf-8'], $attributes));
        $this->elements = new SplObjectStorage;
    }

    public function setValues(array $values)
    {
        foreach ($this->elements as $element) {
            $name = $element->getName();

            if (array_key_exists($name, $values)) {
                $element->setValue($values[$name]);
            }
        }
    }

    public function withValues(array $values): FormInterface
    {
        $this->setValues($values);

        return $this;
    }

    public function getElements(array $names): SplObjectStorage
    {
        $filtered = clone $this->elements;

        foreach ($this->elements as $element) {
            if (false === in_array($element->getName(), $names, true)) {
                $filtered->detach($element);
            }
        }

        return $filtered;
    }

    public function getElementsExcluding(array $names): SplObjectStorage
    {
        $filtered = clone $this->elements;

        foreach ($this->elements as $element) {
            if (true === in_array($element->getName(), $names, true)) {
                $filtered->detach($element);
            }
        }

        return $filtered;
    }

    public function setElements(array $elements)
    {
        $this->elements = new SplObjectStorage;

        foreach ($elements as $element) {
            $this->append($element);
        }
    }

    public function withElements(array $elements): FormInterface
    {
        foreach ($elements as $element) {
            $this->append($element);
        }

        return $this;
    }

    public function getIterator()
    {
        return $this->elements;
    }

    public function count()
    {
        return $this->elements->count();
    }

    public function open(array $attributes = [])
    {
        return sprintf('<form %s>', $this->withAttributes($attributes)->getAttributesAsString());
    }

    public function withFiles(): FormInterface
    {
        return $this->withAttribute('enctype', 'multipart/form-data');
    }

    public function close()
    {
        return '</form>';
    }
}
