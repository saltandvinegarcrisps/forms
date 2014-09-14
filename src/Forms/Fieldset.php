<?php

namespace Forms;

class Fieldset extends Attributes {

	protected $name;

	protected $elements;

	public function __construct($name) {
		$this->name = $name;
	}

	public function addElement(Element $element) {
		$this->elements[] = $element;
	}

}