<?php

use core\App;
use core\Database;


$db = App::resolve(Database::class);


// FETCH NOTE FROM DB FOR SPECFIC ID
$note = $db->query("SELECT * FROM `notes` WHERE id = :id", ["id" => $_GET['id']])->findOrFail();

//IF RECORD EXISTS BUT NOT FOR THE ACCESSING USER THEN ABORT WITH 403 i.e. FORBIDDEN
authorized($note['user_id'] == 2);

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'note' => $note,
    'errors' => []
]);
