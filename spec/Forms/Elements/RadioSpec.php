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

	public function it_can_be_checked() {
		$this->beConstructedWith('foo');

		$this->setChecked()->hasAttribute('checked')->shouldBe(true);
	}

	public function it_can_be_unchecked() {
		$this->beConstructedWith('foo');

		$this->setUnchecked()->hasAttribute('checked')->shouldBe(false);
	}

}
