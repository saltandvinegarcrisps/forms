<?php

namespace Forms\Traits;

trait Label {

	protected $label;

	public function getLabel() {
		return $this->label;
	}

	public function setLabel($value) {
		$this->label = $value;
	}

	public function withLabel($value) {
		$this->setLabel($value);

		return $this;
	}

	public function hasLabel() {
		return null !== $this->label;
	}

}
