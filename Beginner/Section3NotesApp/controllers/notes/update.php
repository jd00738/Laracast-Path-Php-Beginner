<?php

use core\Validator;

use core\App;
use core\Database;


$db = App::resolve(Database::class);


$errors = [];


// FETCH NOTE FROM DB FOR SPECFIC ID
$note = $db->query("SELECT * FROM `notes` WHERE id = :id", ["id" => $_POST['id']])->findOrFail();

//IF RECORD EXISTS BUT NOT FOR THE ACCESSING USER THEN ABORT WITH 403 i.e. FORBIDDEN
authorized($note['user_id'] == 2);

if (!Validator::string($_POST['body'], 1, 10)) {
    $errors['body'] = "A body of no more then 1000 characters is required";
}

if (count($errors)) {
    return view("notes/edit.view.php", [
        'heading' => 'Update Note',
        'error' => $errors,
        'note' => $note
    ]);
}


$db->query('UPDATE notes SET body=:body WHERE id=:id', [
    "id" => $_POST['id'],
    "body" => $_POST['body']
]);

header("location: /notes");
die();
