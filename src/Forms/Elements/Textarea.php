<?php

namespace Forms\Elements;

use Forms\Element;

class Textarea extends Element {

	protected $format = '<textarea %s>%s</textarea>';

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