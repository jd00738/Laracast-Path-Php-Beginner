<?php

/**
 * USE PHP PARSE URL TO GET THE PATH 
 * HELPFUL IN CASE OF URL ALSO CONTAINS QUERY PARAMS 
 * 
 */
$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

/**
 * BELOW CONDITION WILL HELP IN ROUTING OF THE APP ACCORDING TO PATH IN THE URL 
 */

$routes = [
    '/' => "controllers/index.php",
    '/about' => "controllers/about.php",
    '/contact' => "controllers/contact.php",
    '/mission' => "controllers/mission.php",

];


/**
 * REDIRECTING TO THE CONTROLLER
 * FETCHING VIEW ON THE BASIS OF AVAILABLE ROUTES
 */
function routeToController($uri, $routes)
{

    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

/**
 * TO ABORT THE REQUEST WIHT ANY POSSIBLE HTTP STATUS CODE
 */

function abort($statusCode = 404)
{
    http_response_code($statusCode);
    require("views/{$statusCode}.php");
}

routeToController($uri, $routes);
