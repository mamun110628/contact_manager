<?php

namespace ContactManager\Field;

class TextArea extends Field {
    public function render() {
        return "<label>{$this->label}</label><textarea name='{$this->name}'>{$this->value}</textarea>";
    }
}
