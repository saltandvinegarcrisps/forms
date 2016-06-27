<?php

namespace spec\Forms;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormSpec extends ObjectBehavior {

    public function it_is_initializable() {
		$this->shouldHaveType('Forms\Form');
	}

	public function it_should_accept_a_new_element($element) {
		$element->beADoubleOf('Forms\Elements\Input');
		$this->append($element);
		$this->count()->shouldReturn(1);
	}

	public function it_should_fetch_a_element_by_name($element) {
		$element->beADoubleOf('Forms\Elements\Input');
		$element->getName()->willReturn('test');
		$this->append($element);
		$this->getElement('test')->shouldBe($element);
	}

	public function it_should_throw_exception_for_missing_elements() {
		$this->shouldThrow(new \Forms\Exceptions\FormElementNotFound('form element not found test'))->during('getElement', ['test']);
	}

	public function it_should_return_empty_for_missing_attributes() {
		$this->getAttribute('foo')->shouldBe('');
	}

	public function it_should_return_attribute_when_set_by_key_value() {
		$this->withAttribute('foo', 'bar')->getAttribute('foo')->shouldBe('bar');
	}

	public function it_should_return_attribute_when_set_with_array_of_attributes() {
		$this->withAttributes(['baz' => 'qux'])->getAttribute('baz')->shouldBe('qux');
	}

	public function it_should_return_attributes_as_a_string() {
		$this->setAttributes(['foo' => 'bar']);
		$this->getAttributesAsString()->shouldBe('foo="bar"');
	}

}
