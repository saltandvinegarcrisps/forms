<?php

namespace Forms\Traits;

use Forms\Elements\ElementInterface;
use Forms\Exceptions\FormElementNotFound;

trait Elements
{
    public function get(string $name): ElementInterface
    {
        foreach ($this->elements as $element) {
            if ($element->getName() == $name) {
                return $element;
            }
        }

        throw new FormElementNotFound(sprintf('form element not found %s', $name));
    }

    public function append(ElementInterface $element)
    {
        $this->elements->attach($element);
    }

    public function has(string $name): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getName() == $name) {
                return true;
            }
        }

        return false;
    }

    public function remove(ElementInterface $element)
    {
        $this->elements->detach($element);
    }

    /**
     * Compatibility
     */
    public function addElement(ElementInterface $element)
    {
        $this->append($element);
    }

    public function removeElement(string $name)
    {
        $element = $this->getElement($name);

        return $this->remove($element);
    }

    public function hasElement(string $name)
    {
        return $this->has($name);
    }

    public function getElement(string $name): ElementInterface
    {
        return $this->get($name);
    }
}
