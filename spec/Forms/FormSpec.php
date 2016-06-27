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

}
