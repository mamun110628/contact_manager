<?php

namespace ContactManager\Field;

class TextInput extends Field {
    public function render() {
        return "<label>{$this->label}</label><input type='text' name='{$this->name}' value='{$this->value}' />";
    }
}
