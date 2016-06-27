<?php

namespace Forms\Elements;

class Checkbox extends Input
{

    protected $format = '<span class="checkbox-wrap"><input %s><span class="custom-checkbox"></span></span>';
    protected $type = 'checkbox';

    public function isChecked()
    {
        return $this->hasAttribute('checked');
    }

    public function setChecked()
    {
        $this->setAttribute('checked', 'checked');

        return $this;
    }

    public function setUnchecked()
    {
        $this->removeAttribute('checked');

        return $this;
    }
}
