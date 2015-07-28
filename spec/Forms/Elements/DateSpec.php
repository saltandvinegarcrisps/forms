<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DateSpec extends ObjectBehavior {

	public function let() {
		$this->beAnInstanceOf('Forms\Elements\Date');
	}

	public function it_should_be_a_type_of_date() {
		$this->beConstructedWith('foo');

		$this->getType()->shouldBe('date');
	}

}
