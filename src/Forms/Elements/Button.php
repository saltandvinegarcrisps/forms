<?php

namespace Forms\Elements;

use Forms\Element;

class Button extends Element {

	protected $format = '<button %s>%s</button>';

	protected $type = 'button';

	protected $content;

	public function getValue() {
		return $this->content;
	}

	public function setValue($value) {
		$this->content = $value;
	}

	public function getHtml() {
		return sprintf($this->format, $this->getAttributesAsString(), $this->getValue());
	}

}