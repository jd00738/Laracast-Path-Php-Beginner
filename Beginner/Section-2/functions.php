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
    $route = $_SERVER['REQUEST_URI'];
    return $route === $value;
}

