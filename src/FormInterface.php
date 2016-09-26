<?php

namespace Forms;

interface FormInterface extends \IteratorAggregate, \Countable
{
    public function setValues(array $values);

    public function withValues(array $values): FormInterface;

    public function withFiles(): FormInterface;

    public function open(array $attributes = []): string;

    public function close(): string;
}
