<?php

namespace Forms\Elements;

class Input extends AbstractElement {

	protected $format = '<input %s>';

	protected $type = 'text';

	public function getHtml() {
		return sprintf($this->format, $this->getAttributesAsString());
	}

}
