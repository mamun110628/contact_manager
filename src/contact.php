<?php

require '../vendor/autoload.php';

use ContactManager\Controller\ContactController;
use ContactManager\View\ContactForm;

$controller = new ContactController();
$fields = [
    ['type' => 'TextInput', 'name' => 'name', 'label' => 'Name'],
    ['type' => 'TextInput', 'name' => 'phone', 'label' => 'Phone'],
    ['type' => 'TextInput', 'name' => 'email', 'label' => 'Email'],
    ['type' => 'TextArea', 'name' => 'address', 'label' => 'Address'],
];

if (isset($_GET['id'])) {
    $contact = $controller->getContact($_GET['id']);
    foreach ($fields as &$field) {
        $field['value'] = $contact[$field['name']];
    }
}

$contactForm = new ContactForm($fields);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['id'])) {
        $controller->updateContact($_GET['id'], $_POST);
    } else {
        $controller->addContact($_POST);
    }
    header('Location: ../index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Contact Form</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Contact Form</h1>
        <div class="mb-2 text-right">
        <a href="../index.php" class="btn btn-info underline-none ">Back to Contact List</a>
        </div>
        <div class="form-container">
        <?php echo $contactForm->render(); ?>
        </div>
        
    </div>
</body>
</html>
