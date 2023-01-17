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
 * Function to get actural url to ge 
 * 
 */

function urlIs($value)
{
    $route = explode("/", $_SERVER['REQUEST_URI']);

    $route = $route[sizeof($route) - 1];

    return $route == $value;
}
