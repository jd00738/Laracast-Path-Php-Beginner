<?php

/**
 * THIS FILE IS TO SET THE BASIC ROUTING OF THE APP
 */

require "functions.php";
require "Database.php";

// require "route.php";


// TO DEFINE LOCAL DB CONNECTIVITY
$config = require('config.php');


// CREATING OBJECT FOR DATABASE
$db = new Database($config['database']);

// ID FROM PARAM 
$id = $_GET['id'];

// EXECUTING CUSTOM QUERY
// CAN USE '?' OR USE KEY FOLLOWING ':' 

//QUERY WITH ? 
// $query = "select * from post where id = ? ";

// QUERT WITH KEY
$query = "select * from post where id = :id ";

// FETCHING AS ASSOCIATE ARRAY AND RETURNING RESPONSE
// SELECTING FETCH OR FETCH ALL ACCORDING TO THE QURIED DATA FROM DB 

// QUERY EXEC WITH PARAM ?
// $posts = $db->query($query, [$id])->fetch();

// QUERY EXEC WIHT KEY PARAM
$posts = $db->query($query, [':id' => $id])->fetch();

// ITERATION TO FETCH DATA
// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }

// FOR SINGLE RECORD
echo "<li>" . $posts['title'] . "</li>";
