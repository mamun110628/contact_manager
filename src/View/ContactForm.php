<?php

namespace ContactManager\View;

use ContactManager\Form;

class ContactForm
{
    private $form;

    public function __construct($fields)
    {
        $this->form = new Form($fields);
    }

    public function render()
    {
        return $this->form->render();
    }
}
