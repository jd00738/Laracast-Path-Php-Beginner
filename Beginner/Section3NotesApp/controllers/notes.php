<?php
// TO DEFINE LOCAL DB CONNECTIVITY31
$config = require('config.php');


// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);

$heading = "My Notes";

$notes = $db->query("SELECT * FROM `notes` WHERE user_id=2")->findAll();

require "views/notes.view.php";
