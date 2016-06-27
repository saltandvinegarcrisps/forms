<?php

namespace Forms;

use Forms\Elements\ElementInterface;

interface FormInterface
{
	public function setValues(array $values);

	public function withValues(array $values): FormInterface;

    public function open(array $attributes = []): string;

    public function close(): string;
}
