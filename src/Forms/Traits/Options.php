<?php

namespace Forms\Traits;

trait Options {

	protected $options = [];

	public function getOptions() {
		return $this->options;
	}

	public function setOptions(array $options) {
		$this->options = $options;
	}

	public function withOptions(array $options) {
		$this->setOptions($options);

		return $this;
	}

}
