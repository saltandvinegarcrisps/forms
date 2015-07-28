<?php

namespace Forms\Traits;

trait Metadata {

	protected $meta = [];

	public function getMeta($key, $default = null) {
		return array_key_exists($key, $this->meta) ? $this->meta[$key] : $default;
	}

	public function setMeta($key, $value) {
		$this->meta[$key] = $value;
	}

	public function withMeta($key, $value) {
		$this->setMeta($key, $value);

		return $this;
	}

}
