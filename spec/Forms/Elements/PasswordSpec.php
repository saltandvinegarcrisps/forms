<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PasswordSpec extends ObjectBehavior {

	public function let() {
		$this->beAnInstanceOf('Forms\Elements\Password');
	}

	public function it_should_be_a_type_of_password() {
		$this->beConstructedWith('foo');

		$this->getType()->shouldBe('password');
	}

}
