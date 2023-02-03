<?php


use core\Database;
// TO DEFINE LOCAL DB CONNECTIVITY31
$config = require base_path('config.php');


// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // FETCH NOTE FROM DB FOR SPECFIC ID
    $note = $db->query("SELECT * FROM `notes` WHERE id = :id", ["id" => $_GET['id']])->findOrFail();

    authorized($note['user_id'] == 2);

    $db->query("DELETE FROM notes WHERE id=:id", [
        'id' => $_POST['id']
    ]);

    header("location: /notes");
    exit;
} else {

    // FETCH NOTE FROM DB FOR SPECFIC ID
    $note = $db->query("SELECT * FROM `notes` WHERE id = :id", ["id" => $_GET['id']])->findOrFail();

    //IF RECORD EXISTS BUT NOT FOR THE ACCESSING USER THEN ABORT WITH 403 i.e. FORBIDDEN
    if ($note['user_id'] !== 2) {
        abort(Response::FORBIDDEN);
    }



    view("notes/show.view.php", [
        'heading' => 'My Note',
        'note' => $note
    ]);
}
