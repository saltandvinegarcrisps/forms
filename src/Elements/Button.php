<?php

namespace Forms\Elements;

use Forms\Traits\Value;

class Button extends AbstractElement
{
    protected $format = '<button %s>%s</button>';

    protected $type = 'button';

    protected $contents = 'Submit';

    public function setContents(string $contents)
    {
        $this->contents = $contents;
    }

    public function getContents(): string
    {
        return $this->contents;
    }

    public function getHtml()
    {
        return sprintf($this->format, $this->getAttributesAsString(), $this->getContents());
    }
}
