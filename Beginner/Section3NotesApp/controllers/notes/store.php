<?php

use core\Database;
use core\Validator;

// TO DEFINE LOCAL DB CONNECTIVITY31
$config = require base_path('config.php');

// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A body of no more then 1000 characters is required";
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'New Notes',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes (body,user_id) Values(:body,:userId)', [
    "body" => $_POST['body'],
    "userId" => 2
]);

header("location: /notes");
die();
