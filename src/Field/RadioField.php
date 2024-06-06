<?php

namespace ContactManager\Field;

class RadioField extends Field {
    private $options;

    public function __construct($name, $label, $options, $value = '') {
        parent::__construct($name, $label, $value);
        $this->options = $options;
    }

    public function render() {
        $html = "<label>{$this->label}</label>";
        foreach ($this->options as $label => $value) {
            $checked = ($value === $this->value) ? 'checked' : '';
            $html .= "<input type='radio' name='{$this->name}' value='{$value}' {$checked}> {$label}";
        }
        return $html;
    }
}
