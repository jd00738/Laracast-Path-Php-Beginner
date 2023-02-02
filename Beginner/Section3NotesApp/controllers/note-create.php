<?php
// TO DEFINE LOCAL DB CONNECTIVITY31
$config = require('config.php');


// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);

$heading = "New Notes";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $error = [];
    if (strlen($_POST['body']) == 0) {
        $error['body'] = "Body is required";
    }

    if (strlen($_POST['body']) < 10) {
        $error['body'] = "minimum allowed character are 10";
    }

    if (strlen($_POST['body']) > 1000) {
        $error['body'] = "maximum allowed character are 1000";
    }

    if (empty($error)) {
        $db->query('INSERT INTO notes (body,user_id) Values(:body,:userId)', [
            "body" => $_POST['body'],
            "userId" => 2
        ]);
    }
}
require "views/note-create.view.php";
