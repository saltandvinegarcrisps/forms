<?php

namespace Forms;

use Iterator, Countable;

class Form extends Attributes implements Iterator, Countable {

	protected $index = 0;

	protected $keys = [];

	protected $elements = [];

	protected $attributes = ['accept-charset' => 'utf-8'];

	public function __construct(array $attributes = []) {
		$this->setAttributes($attributes);
	}

	public function setValues(array $values) {
		foreach($this->elements as $element) {
			$name = $element->getName();

			if(isset($values[$name])) {
				$element->setValue($values[$name]);
			}
		}
	}

	public function withValues(array $values) {
		$this->setValues($values);

		return $this;
	}

	public function addElement(Element $element) {
		$this->elements[$element->getName()] = $element;
		$this->keys[] = $element->getName();
	}

	public function removeElement($name) {
		unset($this->elements[$name]);
		unset($this->keys[array_search($name, $this->keys)]);
	}

	public function getElement($name) {
		if(false === array_key_exists($name, $this->elements)) {
			throw new \InvalidArgumentException(sprintf('Form element not found: %s', $name));
		}

		return $this->elements[$name];
	}

	public function getElements(array $names) {
		return array_intersect_key($this->elements, array_fill_keys($names, null));
	}

	public function getElementsExcluding(array $names) {
		$names = array_diff(array_keys($this->elements), $names);

		return $this->getElements($names);
	}

	public function setElements(array $elements) {
		$this->elements = [];

		foreach($elements as $element) {
			$this->addElement($element);
		}
	}

	public function withElements(array $elements) {
		foreach($elements as $element) {
			$this->addElement($element);
		}

		return $this;
	}

	public function current() {
		$key = $this->keys[$this->index];

		return $this->elements[$key];
	}

	public function key() {
		return $this->index;
	}

	public function next() {
		$this->index++;
	}

	public function rewind() {
		$this->index = 0;
	}

	public function valid() {
		return isset($this->keys[$this->index]);
	}

	public function count() {
		return count($this->elements);
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
