<?php

namespace spec\Forms\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ButtonSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beAnInstanceOf('Forms\Elements\Button');
    }

    public function it_should_be_a_type_of_button()
    {
        $this->beConstructedWith('foo');

        $this->getType()->shouldBe('button');
    }

    public function it_should_return_the_value()
    {
        $this->beConstructedWith('foo');

        $this->getValue()->shouldBe('');
    }

    public function it_should_set_the_value()
    {
        $this->beConstructedWith('foo');

        $this->withValue('bar')->getValue()->shouldBe('bar');
    }

    public function it_should_return_the_name()
    {
        $this->beConstructedWith('foo');

        $this->getName()->shouldBe('foo');
    }

    public function it_should_set_the_name()
    {
        $this->beConstructedWith('foo');

        $this->withName('bar')->getName()->shouldBe('bar');
    }

    public function it_should_return_the_label()
    {
        $this->beConstructedWith('foo');

        $this->getLabel()->shouldBe('');
    }

    public function it_should_set_the_label()
    {
        $this->beConstructedWith('foo');

        $this->withLabel('bar')->getLabel()->shouldBe('bar');
    }
}
