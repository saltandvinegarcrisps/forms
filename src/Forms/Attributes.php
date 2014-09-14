<?php

namespace Forms;

abstract class Attributes {

	protected $attributes = array();

	public function getAttributesAsString() {
		$attrs = array();

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
		$this->attributes = array_merge($attributes, $this->attributes);
	}

	public function setAttribute($key, $value) {
		$this->attributes[$key] = $value;
	}

	public function removeAttribute($key) {
		unset($this->attributes[$key]);
	}

}