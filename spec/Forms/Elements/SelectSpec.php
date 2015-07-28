<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SelectSpec extends ObjectBehavior {

	public function let() {
		$this->beAnInstanceOf('Forms\Elements\Select');
	}

	public function it_should_return_options() {
		$this->beConstructedWith('foo');

		$this->getOptions()->shouldBeArray();
	}

	public function it_should_set_options() {
		$this->beConstructedWith('foo');

		$this->withOptions(['bar'])->getOptions()->shouldContain('bar');
	}

	public function it_should_render_html() {
		$this->beConstructedWith('foo');

		$this->withValue('a')->withOptions(['a' => 'b'])->getHtml()->shouldBe('<select name="foo"><option value="a" selected>b</option>'.PHP_EOL.'</select>');
	}

}
