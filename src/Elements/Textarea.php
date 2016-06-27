<?php

namespace Forms\Elements;

use Forms\Traits\Value;

class Textarea extends AbstractElement
{

    use Value;

    protected $format = '<textarea %s>%s</textarea>';

    public function getHtml()
    {
        return sprintf($this->format, $this->getAttributesAsString(), $this->getValue());
    }
}
