<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileSpec extends ObjectBehavior {

	public function let() {
		$this->beAnInstanceOf('Forms\Elements\File');
	}

	public function it_should_be_a_type_of_file() {
		$this->beConstructedWith('foo');

		$this->getType()->shouldBe('file');
	}

}
