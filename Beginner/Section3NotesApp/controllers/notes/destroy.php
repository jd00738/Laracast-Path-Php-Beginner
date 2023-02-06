<?php

use core\App;
use core\Database;


$db = App::resolve(Database::class);

// FETCH NOTE FROM DB FOR SPECFIC ID
$note = $db->query("SELECT * FROM `notes` WHERE id = :id", ["id" => $_POST['id']])->findOrFail();

authorized($note['user_id'] == 2);

$db->query("DELETE FROM notes WHERE id=:id", [
    'id' => $_POST['id']
]);

header("location: /notes");
exit;
