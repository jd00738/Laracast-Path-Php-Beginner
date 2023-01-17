<?php

/**
 * THIS FILE IS TO SET THE BASIC ROUTING OF THE APP
 */

require "functions.php";

// require "route.php";

/**
 * CONNECT TO THE MY DATABASE
 */

// CONNECTION STRING
$dsn = "mysql:host=mysql-dev;port=3306;dbname=myapp;charset=utf8mb4";

// CREATING CONNECTION 
$pdo = new PDO($dsn, 'root', 'root');

// PREPARING QUERY FOR EXECUTION
$statemet = $pdo->prepare("select * from post");

// EXECUTING STATEMENTS
$statemet->execute();

// FETCTING STATMENT
// FETCHING AS ASSOCIATE ARRAY
$posts = $statemet->fetchAll(PDO::FETCH_ASSOC);

// ITERATION TO FETCH DATA
foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}

// HOME WORK

echo "<h2> HOME WORK</h2>";

// PREPARING QUERY FOR EXECUTION WHERE ID =1
$statemet = $pdo->prepare("select * from post where id = 1");

// EXECUTING STATEMENTS
$statemet->execute();

// FETCTING STATMENT
$posts = $statemet->fetch(PDO::FETCH_ASSOC);

// FETCH DATA
echo "<li>" . $posts['title'] . "</li>";
