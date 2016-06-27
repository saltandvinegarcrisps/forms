<?php

namespace Forms;

use Forms\Elements\ElementInterface;

interface FormInterface
{
    public function open(array $attributes = []): string;

    public function close(): string;
}
