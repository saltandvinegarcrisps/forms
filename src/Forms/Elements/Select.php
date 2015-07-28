<?php

namespace Forms\Elements;

use Forms\Traits\Options;
use Forms\Traits\Value;

class Select extends Element {

	use Options, Value;

	protected $format = '<select %s>%s</select>';

	protected function getHtmlOption($key, $value, $selected = false) {
		$attr = ['value' => $key];
		$pairs = [];

		if($selected) $attr['selected'] = null;

		foreach($attr as $key => $val) {
			if(null === $val) {
				$pairs[] = $key;
			}
			else {
				$pairs[] = $key . '="' . $val . '"';
			}
		}

		return sprintf('<option %s>%s</option>', implode(' ', $pairs), $value).PHP_EOL;
	}

	protected function getHtmlOptions() {
		$html = '';

		foreach($this->options as $key => $value) {
			$html .= $this->getHtmlOption($key, $value, ($this->getValue() == $key));
		}

		return $html;
	}

	public function getHtml() {
		return sprintf($this->format, $this->getAttributesAsString(), $this->getHtmlOptions());
	}

}
