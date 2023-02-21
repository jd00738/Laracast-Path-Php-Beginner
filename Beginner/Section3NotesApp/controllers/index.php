<?php
$_SESSION['name'] = "Junaid";
$heading = "HOME";
view("index.view.php", [
    'heading' => 'Home'
]);
