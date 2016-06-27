<?php

namespace Forms\Elements;

class Password extends Input
{

    protected $type = 'password';

    // password can not be pre-populated
    public function setValue($value)
    {
    }
}
