<?php

namespace Forms\Elements;

use Forms\Traits\Value;

class Button extends AbstractElement {

	use Value;

	protected $format = '<button %s>%s</button>';

	protected $type = 'button';

	public function getHtml() {
		return sprintf($this->format, $this->getAttributesAsString(), $this->getValue());
	}

}
