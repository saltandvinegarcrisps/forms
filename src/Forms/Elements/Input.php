<?php

namespace Forms\Elements;

use Forms\Element;

class Input extends Element {

	protected $format = '<input %s>';

	protected $type = 'text';

	public function getHtml() {
		return sprintf($this->format, $this->getAttributesAsString());
	}

}