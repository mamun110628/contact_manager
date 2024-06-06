<?php

require './vendor/autoload.php';

use ContactManager\Controller\ContactController;

$controller = new ContactController();
$contacts = $controller->getContacts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Contact Management</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Contact List</h1>
        <div class="text-right mb-2">
        <a href="./src/contact.php" class="btn btn-info underline-none ">Add Contact</a>
        </div>
        
        <div class="notification-container">
            <?php
            if($controller->getSession('success')){
                ?>
                <p class="text-center text-success"><?php echo $controller->getSession('success'); ?></p>
                <?php
                $controller->forgetSession('success');
            }
            if($controller->getSession('error')){
                ?>
                <p class="text-center text-success"><?php echo $controller->getSession('success'); ?></p>
                <?php
               $controller->forgetSession('success');
            }

            ?>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?= htmlspecialchars($contact['name']) ?></td>
                        <td><?= htmlspecialchars($contact['phone']) ?></td>
                        <td><?= htmlspecialchars($contact['email']) ?></td>
                        <td><?= htmlspecialchars($contact['address']) ?></td>
                        <td class="no-wrap">
                            <a href="./src/contact.php?id=<?= $contact['id'] ?>" class="btn btn-info">Edit</a>
                            <a href="./src/delete.php?id=<?= $contact['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
