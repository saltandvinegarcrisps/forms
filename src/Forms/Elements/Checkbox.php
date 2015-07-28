<?php

namespace Forms\Elements;

class Checkbox extends Input {

	protected $type = 'checkbox';

	public function setValue($value) {
		if($this->getValue() == $value) {
			$this->setAttribute('checked', 'checked');
		}

		$this->setAttribute('value', $value);
	}

}
