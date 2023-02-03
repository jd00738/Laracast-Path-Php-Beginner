<?php
// TO DEFINE LOCAL DB CONNECTIVITY31
$config = require base_path('config.php');

//TO GET THE VALIDATOR CLASS
require base_path('Validator.php');

// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);
$validator = new Validator();

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {


    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = "A body of no more then 1000 characters is required";
    }

    if (empty($error)) {
        $db->query('INSERT INTO notes (body,user_id) Values(:body,:userId)', [
            "body" => $_POST['body'],
            "userId" => 2
        ]);
    }
}

view("notes/create.view.php", [
    'heading' => 'New Notes',
    'errors' => $errors
]);
