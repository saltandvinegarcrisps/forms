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

	public function it_can_be_checked() {
		$this->beConstructedWith('foo');

		$this->setChecked()->hasAttribute('checked')->shouldBe(true);
	}

	public function it_can_be_unchecked() {
		$this->beConstructedWith('foo');

		$this->setUnchecked()->hasAttribute('checked')->shouldBe(false);
	}

}
