<?php

namespace Forms;

abstract class Element extends Attributes {

	protected $type;

	protected $label;

	protected $value;

	protected $format = '<input %s>';

	public function __construct($name, array $options = array()) {
		$this->setName($name);

		if(isset($options['attributes'])) {
			$this->setAttributes($options['attributes']);
		}

		if(null !== $this->type) {
			$this->setAttribute('type', $this->type);
		}

		if(isset($options['label'])) {
			$this->setLabel($options['label']);
		}

		if(isset($options['value'])) {
			$this->setValue($options['value']);
		}

		if(isset($options['options'])) {
			$this->setOptions($options['options']);
		}
	}

	public function getLabel() {
		return $this->label;
	}

	public function setLabel($value) {
		$this->label = $value;
	}

	public function hasLabel() {
		return null !== $this->label;
	}

	public function getType() {
		return $this->type;
	}

	public function getName() {
		return $this->getAttribute('name');
	}

	public function setName($value) {
		$this->setAttribute('name', $value);
	}

	public function getValue() {
		return $this->getAttribute('value');
	}

	public function setValue($value) {
		$this->setAttribute('value', $value);
	}

	abstract public function getHtml();

}