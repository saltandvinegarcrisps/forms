<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CheckboxSpec extends ObjectBehavior {

	public function let() {
		$this->beAnInstanceOf('Forms\Elements\Checkbox');
	}

	public function it_should_be_a_type_of_checkbox() {
		$this->beConstructedWith('foo');

		$this->getType()->shouldBe('checkbox');
	}

}
