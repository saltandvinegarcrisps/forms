<?php

namespace Forms;

use Iterator;

class Form extends Attributes implements Iterator {

	protected $index = 0;
	
	protected $attributes = array('accept-charset' => 'utf-8');

	protected $elements;

	public function __construct(array $attributes = array()) {
		$this->setAttributes($attributes);
	}

	public function setValues(array $input) {
		foreach($this->elements as $element) {
			$name = $element->getName();

			if(isset($input[$name])) {
				$element->setValue($input[$name]);
			}
		}
	}

	protected function findElement($name) {
		foreach($this->elements as $index => $element) {
			if($element->getName() == $name) {
				return array($element, $index);
			}
		}
	}

	public function addElement(Element $element) {
		$this->elements[] = $element;
	}

	public function removeElement($name) {
		list($element, $index) = $this->findElement($name);

		unset($this->elements[$index]);
	}

	public function getElement($name) {
		list($element, $index) = $this->findElement($name);

		return $element;
	}

	public function getElements(array $names) {
		return array_intersect_key($this->elements, array_fill_keys($names, null));
	}

	public function getElementsExcluding(array $names) {
		$names = array_diff(array_keys($this->elements), $names);

		return $this->getElements($names);
	}

	public function setElements(array $elements) {
		$this->elements = array();

		foreach($elements as $element) {
			$this->addElement($element);
		}
	}

	public function current() {
		return $this->elements[$this->index];
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
		return isset($this->elements[$this->index]);
	}

	public function open() {
		return sprintf('<form %s>', $this->getAttributesAsString());
	}

	public function close() {
		return '</form>';
	}

}