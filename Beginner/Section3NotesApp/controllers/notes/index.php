<?php

use core\Database;

// TO DEFINE LOCAL DB CONNECTIVITY31
$config = require base_path('config.php');


// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);


$notes = $db->query("SELECT * FROM `notes` WHERE user_id=2")->findAll();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
