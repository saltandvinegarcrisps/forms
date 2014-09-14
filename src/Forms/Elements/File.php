<?php

namespace Forms\Elements;

use Forms\Element;

class File extends Element {

	protected $format = '<input %s>';

	protected $type = 'file';

	public function getHtml() {
		return sprintf($this->format, $this->getAttributesAsString());
	}

}