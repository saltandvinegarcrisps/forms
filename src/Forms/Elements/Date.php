<?php

namespace Forms\Elements;

use Forms\Element;

class Date extends Element {

	protected $format = '<input %s>';

	protected $type = 'date';

	public function getHtml() {
		return sprintf($this->format, $this->getAttributesAsString());
	}

}
