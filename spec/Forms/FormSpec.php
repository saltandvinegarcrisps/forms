<?php

namespace spec\Forms;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Forms\Elements\Element;

class FormSpec extends ObjectBehavior {

	public function it_is_initializable() {
		$this->shouldHaveType('Forms\Form');
	}

	public function it_should_accept_a_new_element(Element $element) {
		$element->getName()->shouldBeCalled();
		$this->addElement($element);
		$this->count()->shouldReturn(1);
	}

	public function it_should_fetch_a_element_by_name(Element $element) {
		$element->getName()->willReturn('test');
		$this->addElement($element);
		$this->getElement('test')->shouldBe($element);
	}

	public function it_should_throw_exception_for_missing_elements() {
		$this->shouldThrow(new \InvalidArgumentException("Form element not found: test"))->during('getElement', ['test']);
	}

}
