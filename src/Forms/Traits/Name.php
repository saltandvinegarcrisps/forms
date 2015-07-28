<?php

namespace Forms\Traits;

trait Name {

	public function getName() {
		return $this->getAttribute('name');
	}

	public function setName($value) {
		$this->setAttribute('name', $value);
	}

	public function withName($value) {
		$this->setName($value);

		return $this;
	}

}
