<?php

/**
 * CONSTANT FOR ROOT DIRECTORY PATH
 */
const BASE_PATH = __DIR__ . '/../';



/**
 * THIS FILE IS TO SET THE COMMON FUNCTIONS OR UTILITY OF THE APP
 */
require BASE_PATH . "functions.php";

/**
 * THIS FILE IS TO SET THE DATABASE CONFIGURATION OF THE APP
 */
// require base_path("Database.php");


/**
 * THIS FILE IS TO SET THE BASIC RESPONSE OF THE APP
 */

// require base_path("Response.php");

/**
 * THIS FILE IS TO SET THE BASIC ROUTING OF THE APP
 */

/**
 * TO AUTOLOAD FILES
 */
spl_autoload_register(function ($class) {
    require base_path("core/{$class}.php");
});

require base_path("router.php");
