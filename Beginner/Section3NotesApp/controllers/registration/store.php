<?php

use core\App;
use core\Database;
use core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// VALIDATE THE FORM INPUTS
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = "Provide a valid email address";
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Provide password of minimum 7 characters";
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'error' => $errors
    ]);
}

// CHECK DUPLICATIONS
$db = App::resolve(Database::class);

//IF EXIST REDIRECT TO LOGIN PAGE   
$user = $db->query("select * from users where email=:email", [
    "email" => $email
])->find();

if ($user) {
    header("location: /");
    exit();
} else {
    $db->query("INSERT into users (email,password) VALUES (:email,:password)", [
        "email" => $email,
        "password" => $password
    ]);

    $_SESSION['user'] = [
        "email" => $email
    ];
    header("location: /");
    exit();
}

//ELSE CREATE USER AND LOGIN  NEW USER 