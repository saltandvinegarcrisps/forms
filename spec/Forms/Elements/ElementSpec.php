<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Forms\Elements\Element as AbstractElement;

class ElementSpec extends ObjectBehavior {

	public function let() {
		$this->beAnInstanceOf('spec\Forms\Elements\Element');
	}

	public function it_should_set_the_label() {
		$this->beConstructedWith('foo');

		$this->withLabel('foo')->getLabel()->shouldBe('foo');
	}

	public function it_should_test_the_label_is_set() {
		$this->beConstructedWith('foo');

		$this->hasLabel()->shouldBe(false);

		$this->withLabel('foo')->hasLabel()->shouldBe(true);
	}

	public function it_should_return_the_type() {
		$this->beConstructedWith('foo');

		$this->getType()->shouldBe('input');
	}

	public function it_should_return_the_name() {
		$this->beConstructedWith('foo');

		$this->getName()->shouldBe('foo');
	}

	public function it_should_set_the_name() {
		$this->beConstructedWith('foo');

		$this->withName('bar')->getName()->shouldBe('bar');
	}

	public function it_should_return_the_value_from_the_attributes() {
		$this->beConstructedWith('foo', ['attributes' => ['value' => 'bar']]);

		$this->getValue()->shouldBe('bar');
	}

	public function it_should_set_the_value() {
		$this->beConstructedWith('foo', ['attributes' => ['value' => 'bar']]);

		$this->withValue('baz')->getValue()->shouldBe('baz');
	}

}

class Element extends AbstractElement {

	protected $type = 'input';

}
