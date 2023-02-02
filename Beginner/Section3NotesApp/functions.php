<?php

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
