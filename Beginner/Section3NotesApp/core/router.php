<?php

$routes = require base_path('routes.php');

/**
 * REDIRECTING TO THE CONTROLLER
 * FETCHING VIEW ON THE BASIS OF AVAILABLE ROUTES
 */
function routeToController($uri, $routes)
{

    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
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
    require base_path("views/{$statusCode}.php");
}

/**
 * USE PHP PARSE URL TO GET THE PATH 
 * HELPFUL IN CASE OF URL ALSO CONTAINS QUERY PARAMS 
 * 
 */
$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

routeToController($uri, $routes);
