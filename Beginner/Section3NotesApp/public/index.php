<?php
session_start();
/**
 * CONSTANT FOR ROOT DIRECTORY PATH
 */
const BASE_PATH = __DIR__ . '/../';



/**
 * THIS FILE IS TO SET THE COMMON FUNCTIONS OR UTILITY OF THE APP
 */
require BASE_PATH . "core/functions.php";

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

    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path("bootstrap.php");

$router = new \core\Router();
/**
 * USE PHP PARSE URL TO GET THE PATH 
 * HELPFUL IN CASE OF URL ALSO CONTAINS QUERY PARAMS 
 * 
 */

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
