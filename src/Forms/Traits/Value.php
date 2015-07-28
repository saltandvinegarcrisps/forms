<?php

namespace Forms\Traits;

trait Value {

	protected $value;

	public function getValue() {
		return $this->value;
	}

	public function setValue($value) {
		$this->value = $value;
	}

	public function withValue($value) {
		$this->setValue($value);

		return $this;
	}

}
