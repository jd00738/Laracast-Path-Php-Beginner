<?php

/**
 * THIS FILE IS TO SET THE BASIC ROUTING OF THE APP
 */

require "functions.php";
require "Database.php";

// require "route.php";


// CREATING OBJECT FOR DATABASE
$db = new Database();

// EXECUTING CUSTOM QUERY
// FETCHING AS ASSOCIATE ARRAY AND RETURNING RESPONSE
// SELECTING FETCH OR FETHC ALL ACCORDING TO THE FETCHED DATA FROM DB 
$posts = $db->query("select * from post where id=1")->fetch(PDO::FETCH_ASSOC);

// ITERATION TO FETCH DATA
// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }

// FOR SINGLE RECORD
echo "<li>".$posts['title']."</li>";
