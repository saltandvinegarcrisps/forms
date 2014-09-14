<?php

namespace Forms\Elements;

use Forms\Element;

class Radio extends Element {

	protected $format = '<input %s>';

	protected $type = 'radio';

	public function getHtml() {
		return sprintf($this->format, $this->getAttributesAsString());
	}

}