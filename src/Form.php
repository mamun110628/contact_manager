<?php

namespace ContactManager;

use ContactManager\Field\Field;

class Form {
    private $fields = [];

    public function __construct($config) {
        foreach ($config as $fieldConfig) {
            $class = "ContactManager\\Field\\" . $fieldConfig['type'];
            if (class_exists($class)) {
                $this->fields[] = new $class($fieldConfig['name'], $fieldConfig['label'], $fieldConfig['value'] ?? '', $fieldConfig['options'] ?? []);
            }
        }
    }

    public function render() {
        $html = "<form method='post'>";
        foreach ($this->fields as $field) {
            $html .= $field->render();
        }
        $html .= "<button type='submit' class='btn btn-info'>Save</button></form>";
        return $html;
    }
}
