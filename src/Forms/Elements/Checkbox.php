<?php

namespace Forms\Elements;

class Checkbox extends Input {

	protected $type = 'checkbox';

	public function isChecked() {
		return $this->hasAttribute('checked');
	}

	public function setChecked() {
		$this->setAttribute('checked', 'checked');

		return $this;
	}

	public function setUnchecked() {
		$this->removeAttribute('checked');

		return $this;
	}

}
