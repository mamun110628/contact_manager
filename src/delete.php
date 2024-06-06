<?php

require '../vendor/autoload.php';

use ContactManager\Controller\ContactController;

if (isset($_GET['id'])) {
    $controller = new ContactController();
    $controller->deleteContact($_GET['id']);
}

header('Location: ../index.php');
exit;
