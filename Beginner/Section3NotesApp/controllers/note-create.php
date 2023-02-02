<?php
// TO DEFINE LOCAL DB CONNECTIVITY31
$config = require('config.php');


// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);

$heading = "New Notes";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    dumpAndDie($_POST);
}
require "views/note-create.view.php";
