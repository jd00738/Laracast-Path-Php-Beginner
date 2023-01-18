<?php
// TO DEFINE LOCAL DB CONNECTIVITY31
$config = require('config.php');


// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);

$heading = "My Notes";

$note = $db->query("SELECT * FROM `notes` WHERE id = :id", ["id" => $_GET['id']])->fetch();

require "views/note.view.php";
