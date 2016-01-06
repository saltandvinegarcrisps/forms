<?php

namespace Forms\Elements;

use Forms\Traits\Options;
use Forms\Traits\Value;

class Select extends AbstractElement {

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

	protected function getHtmlOptionGroup($key, $list)
    {
        $html = '';

        foreach ($list as $label => $value) {
            $html .= $this->getHtmlOption($label, $value, ($this->getValue() == $label));
        }

        return sprintf('<optgroup label="%s">%s</optgroup>', $key, $html).PHP_EOL;
    }

	protected function getHtmlOptions() {
		$html = '';

		foreach($this->options as $key => $value) {
			$html .= is_array($value) ?
				$this->getHtmlOptionGroup($key, $value) :
				$this->getHtmlOption($key, $value, ($this->getValue() == $key));
		}

		return $html;
	}

	public function getHtml() {
		return sprintf($this->format, $this->getAttributesAsString(), $this->getHtmlOptions());
	}

}
