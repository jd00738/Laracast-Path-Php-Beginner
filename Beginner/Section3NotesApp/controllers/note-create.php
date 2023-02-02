<?php
// TO DEFINE LOCAL DB CONNECTIVITY31
$config = require('config.php');


// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);

$heading = "New Notes";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $db->query('INSERT INTO notes (body,user_id) Values(:body,:userId)', [
        "body" => $_POST['body'],
        "userId" => 2
    ]);
}
require "views/note-create.view.php";
