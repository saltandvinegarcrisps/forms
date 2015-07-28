<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HiddenSpec extends ObjectBehavior {

	public function let() {
		$this->beAnInstanceOf('Forms\Elements\Hidden');
	}

	public function it_should_be_a_type_of_hidden() {
		$this->beConstructedWith('foo');

		$this->getType()->shouldBe('hidden');
	}

}
