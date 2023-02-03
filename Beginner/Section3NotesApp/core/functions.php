<?php
use core\Response;
/**
 * Function to dump any value and kill the process
 * 
 */
function dumpAndDie($value)
{
    $heading = "Home";
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

/** 
 * FUNCTION TO GET THE URL PATH 
 * 
 */

function urlIs($value)
{
    $route = $_SERVER['REQUEST_URI'];
    return $route === $value;
}

/**
 * FUNCTION TO AUTHORIZE WITH CUSTOM STATUS
 */

function authorized($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

/**
 * HELPER FUNCTION TO ACCESS THE ROOT FOLDER AND BASE PATH
 */

function base_path($path)
{
    return BASE_PATH . $path;
}

/**
 * HELPER FUNCTION TO LOAD VIEW AND DATA
 */

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path);
}
