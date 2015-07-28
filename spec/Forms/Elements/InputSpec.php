<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputSpec extends ObjectBehavior {

	public function let() {
		$this->beAnInstanceOf('Forms\Elements\Input');
	}

	public function it_should_be_a_type_of_text() {
		$this->beConstructedWith('foo');

		$this->getType()->shouldBe('text');
	}

}
