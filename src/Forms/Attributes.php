<?php

namespace Forms;

abstract class Attributes {

	protected $attributes = [];

	public function getAttributesAsString() {
		$attrs = [];

		foreach($this->attributes as $key => $value) {
			if(null === $value) {
				$attrs[] = $key;
			}
			else {
				$attrs[] = $key . '="' . $value . '"';
			}
		}

		return implode(' ', $attrs);
	}

	public function getAttributes() {
		return $this->attributes;
	}

	public function getAttribute($key) {
		return isset($this->attributes[$key]) ? $this->attributes[$key] : null;
	}

	public function setAttributes(array $attributes) {
		$this->attributes = array_merge($this->attributes, $attributes);
	}

	public function withAttributes(array $attributes) {
		$this->setAttributes($attributes);

		return $this;
	}

	public function setAttribute($key, $value) {
		$this->attributes[$key] = $value;
	}

	public function withAttribute($key, $value) {
		$this->setAttribute($key, $value);

		return $this;
	}

	public function removeAttribute($key) {
		unset($this->attributes[$key]);
	}

	public function withoutAttribute($key) {
		$this->removeAttribute($key);

		return $this;
	}

}
