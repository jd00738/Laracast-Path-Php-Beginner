<?php

/**
 * BELOW CONDITION WILL HELP IN ROUTING OF THE APP ACCORDING TO PATH IN THE URL 
 */

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/destroy.php');
// $router->delete('/note', 'controllers/notes/destroy.php');
