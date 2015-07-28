<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubmitSpec extends ObjectBehavior {

	public function let() {
		$this->beAnInstanceOf('Forms\Elements\Submit');
	}

	public function it_should_be_a_type_of_submit() {
		$this->beConstructedWith('foo');

		$this->getType()->shouldBe('submit');
	}

}
