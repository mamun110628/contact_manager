<?php

namespace ContactManager\Model;

use PDO;

class Contact
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllContacts()
    {
        $stmt = $this->pdo->query('SELECT * FROM contacts order by id desc');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM contacts WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createContact($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO contacts (name, phone, email, address) VALUES (:name, :phone, :email, :address)');
        return $stmt->execute($data);
    }

    public function updateContact($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE contacts SET name = :name, phone = :phone, email = :email, address = :address WHERE id = :id');
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function deleteContact($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM contacts WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
