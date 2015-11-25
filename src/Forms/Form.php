<?php

namespace Forms;

use Forms\Elements\ElementInterface;

class Form implements \IteratorAggregate {

	use Traits\Attributes;

	protected $elements;

	public function __construct(array $attributes = []) {
		$this->setAttributes(array_merge(['accept-charset' => 'utf-8'], $attributes));
		$this->elements = new \SplObjectStorage;
	}

	public function setValues(array $values) {
		foreach($this->elements as $element) {
			$name = $element->getName();

			if(array_key_exists($name, $values)) {
				$element->setValue($values[$name]);
			}
		}
	}

	public function withValues(array $values) {
		$this->setValues($values);

		return $this;
	}

	public function addElement(ElementInterface $element) {
		$this->elements->attach($element);
	}

	public function removeElement($name) {
		$element = $this->getElement($name);

		$this->elements->detach($element);
	}

	public function getElement($name) {
		foreach($this->elements as $element) {
			if($element->getName() === $name) {
				return $element;
			}
		}

		throw new \InvalidArgumentException(sprintf('Form element not found "%s"', $name));
	}

	public function getElements(array $names) {
		$filtered = clone $this->elements;

		foreach($this->elements as $element) {
			if(false === in_array($element->getName(), $names, true)) {
				$filtered->detach($element);
			}
		}

		return $filtered;
	}

	public function getElementsExcluding(array $names) {
		$filtered = clone $this->elements;

		foreach($this->elements as $element) {
			if(true === in_array($element->getName(), $names, true)) {
				$filtered->detach($element);
			}
		}

		return $filtered;
	}

	public function setElements(array $elements) {
		$this->elements = new \SplObjectStorage;

		foreach($elements as $element) {
			$this->addElement($element);
		}

		unset($elements);
	}

	public function withElements(array $elements) {
		foreach($elements as $element) {
			$this->addElement($element);
		}

		unset($elements);

		return $this;
	}

	public function getIterator() {
		return $this->elements;
	}

	public function open(array $extra = []) {
		return sprintf('<form %s>', $this->withAttributes($extra)->getAttributesAsString());
	}

	public function withFiles() {
		return $this->withAttribute('enctype', 'multipart/form-data');
	}

	public function close() {
		return '</form>';
	}

}
