<?php

namespace Forms\Elements;

use Forms\Element;

class Checkbox extends Element {

	protected $format = '<input %s>';

	protected $type = 'checkbox';

	public function getHtml() {
		return sprintf($this->format, $this->getAttributesAsString());
	}

	public function setValue($value) {
		if($this->getValue() == $value) {
			$this->setAttribute('checked', 'checked');
		}

		$this->setAttribute('value', $value);
	}

}
