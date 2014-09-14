<?php

namespace Forms\Elements;

use Forms\Element;

class Select extends Element {

	protected $format = '<select %s>%s</select>';

	protected $options = array();

	protected $selected;

	public function __construct($name, array $options = array()) {
		parent::__construct($name, $options);

		if(isset($options['options'])) {
			$this->setOptions($options['options']);
		}
	}

	public function getValue() {
		return $this->selected;
	}

	public function setValue($value) {
		$this->selected = $value;
	}

	protected function getHtmlOption($key, $value, $selected = false) {
		$attr = array('value' => $key);
		$pairs = array();

		if($selected) {
			$attr['selected'] = null;
		}

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

	public function getOptions() {
		return $this->options;
	}

	public function setOptions(array $options) {
		$this->options = $options;
	}

	public function getHtml() {
		return sprintf($this->format, $this->getAttributesAsString(), $this->getHtmlOptions());
	}

}