<?php


use core\Database;
// TO DEFINE LOCAL DB CONNECTIVITY31
$config = require base_path('config.php');


// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);

// FETCH NOTE FROM DB FOR SPECFIC ID
$note = $db->query("SELECT * FROM `notes` WHERE id = :id", ["id" => $_POST['id']])->findOrFail();

authorized($note['user_id'] == 25);

$db->query("DELETE FROM notes WHERE id=:id", [
    'id' => $_POST['id']
]);

header("location: /notes");
exit;
