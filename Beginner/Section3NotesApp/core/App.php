<?php

namespace core;

class App
{
    /**
     * PROPERTY TO POPULATE CONTAINER
     */
    protected static $container;

    /**
     * FUNCTION TO SET CONTAINER
     */
    public static function setContainer($container)
    {
        static::$container = $container;
    }

    /**
     * FUNCTION TO GET CONTAINERS
     */
    public static function container()
    {
        return static::$container;
    }

    /**
     * FUNCTION TO BIND PROPERTIES INSIDE THE CONTAINER
     */

    public static function bind($key, $resolver)
    {
        return static::container()->bind($key, $resolver);
    }

    /**
     * FUCNTION TO GET PROPERTIES OF THE CONTAINER
     */
    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }
}
