<?php

namespace ContactManager\Controller;

use ContactManager\Model\Contact;

class ContactController
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new Contact();

        if (session_status() == PHP_SESSION_NONE) {
            // Start the session
            session_start();
        }
    }

    public function getContacts()
    {
        return $this->contactModel->getAllContacts();
    }

    public function getContact($id)
    {
        return $this->contactModel->getContactById($id);
    }

    public function addContact($data)
    {
        $result = $this->contactModel->createContact($data);
        if($result){
            $this->setSession('success','Successfully added data');
            return $result;
        }
        $this->setSession('error','Something wrong');
        return false;
        
    }

    public function updateContact($id, $data)
    {
        $result = $this->contactModel->updateContact($id, $data);
        if($result){
            $this->setSession('success','Successfully updated data');
            return $result;
        }
        $this->setSession('error','Something wrong');
        return false; 
    }

    public function deleteContact($id)
    
    {
        $result =  $this->contactModel->deleteContact($id);
        if($result){
            $this->setSession('success','Successfully deleted data');
            return $result;
        }
        $this->setSession('error','Something wrong');
        return false; 
    }
    public function setSession($key, $value){
        $_SESSION[$key] = $value;
    }
    public function getSession($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return false; 
    }
    public function forgetSession($key){
        unset($_SESSION[$key]);
    }
}
