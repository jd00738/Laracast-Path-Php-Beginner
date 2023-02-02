<?php
// TO DEFINE LOCAL DB CONNECTIVITY31
$config = require('config.php');

//TO GET THE VALIDATOR CLASS
require('Validator.php');

// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);
$validator = new Validator();

$heading = "New Notes";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $error = [];
    if (!Validator::string($_POST['body'], 1, 1000)) {
        $error['body'] = "A body of no more then 1000 characters is required";
    }

    if (empty($error)) {
        $db->query('INSERT INTO notes (body,user_id) Values(:body,:userId)', [
            "body" => $_POST['body'],
            "userId" => 2
        ]);
    }
}
require "views/notes/create.view.php";
