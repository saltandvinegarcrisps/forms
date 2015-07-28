<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RadioSpec extends ObjectBehavior {

	public function let() {
		$this->beAnInstanceOf('Forms\Elements\Radio');
	}

	public function it_should_be_a_type_of_radio() {
		$this->beConstructedWith('foo');

		$this->getType()->shouldBe('radio');
	}

}
