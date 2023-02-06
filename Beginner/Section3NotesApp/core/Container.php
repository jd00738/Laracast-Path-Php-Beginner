<?php

namespace core;

class Container
{

    /**
     * TO STORE ALL THE BINDING ADDED IN THE CONAITNER
     */
    protected $bindings = [];
    /**
     * TO ADD THINGS TO THE CONTAINER
     */
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * TO FETCH THINGS FROM THE CONTAINER
     */
    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching bindings found for {$key}");
        }

        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}
