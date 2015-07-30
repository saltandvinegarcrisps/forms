<?php

namespace Forms\Elements;

class Checkbox extends Input {

	protected $type = 'checkbox';

	public function setValue($value) {
		if($value) {
			$this->setAttribute('checked', 'checked');
		}
		else {
			$this->removeAttribute('checked');
		}

		$this->setAttribute('value', 1);
	}

	public function getValue() {
		return $this->hasAttribute('checked') ? 1 : 0;
	}

}
