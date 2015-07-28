<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TextareaSpec extends ObjectBehavior {

	public function let() {
		$this->beAnInstanceOf('Forms\Elements\Textarea');
	}

	public function it_should_render_html() {
		$this->beConstructedWith('foo');

		$this->withValue('bar')->getHtml()->shouldBe('<textarea name="foo">bar</textarea>');
	}

}
