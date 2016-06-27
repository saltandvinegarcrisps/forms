<?php

namespace Forms\Elements;

class CheckboxGroup implements ElementInterface
{

    protected $name;

    protected $options = [];

    public function __construct($name, array $params = [])
    {
        $this->setName($name);

        if (array_key_exists('group', $params)) {
            $this->addOptions($params['group'], $params['key'], $params['value']);
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function withName($name)
    {
        $this->setName($name);

        return $this;
    }

    public function addOptions(array $group, $key, $value)
    {
        foreach ($group as $item) {
            $this->addOption($item->$key, $item->$value);
        }
    }

    public function addOption($key, $value, $checked = false)
    {
        $element = new Checkbox($this->getName().'[]', [
            'value' => $key,
            'label' => $value,
        ]);

        if ($checked) {
            $element->setChecked();
        }

        $this->options[] = $element;
    }

    public function setChecked(array $keys)
    {
        foreach ($this->options as $element) {
            if (in_array($element->getValue(), $keys)) {
                $element->setChecked();
            }
        }
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setValue($values)
    {
        if (false === is_array($values)) {
            return false;
        }

        foreach ($this->options as $element) {
            if (in_array($element->getValue(), $values)) {
                $element->setChecked();
            }
        }
    }

    public function getValue()
    {
        $values = [];

        foreach ($this->options as $element) {
            if ($element->isChecked()) {
                $values[] = $element->getValue();
            }
        }

        return $values;
    }
}
