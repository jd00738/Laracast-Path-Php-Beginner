<?php

namespace core;

use core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            "middleware" => null
        ];
        return $this;
    }

    /**
     * TO EXECUTE GET ACTION
     */
    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }


    /**
     * TO EXECUTE POST ACTION
     */
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }


    /**
     * TO EXECUTE DELETE ACTION
     */
    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }


    /**
     * TO EXECUTE PATCH ACTION
     */
    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }


    /**
     * TO EXECUTE PUT ACTION
     */
    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    /**
     * TO SET THE MIDDLE WAR
     */
    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    /**
     * TO ROUTE CURRENT URI
     */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {

                Middleware::resolve($route['middleware']);
                return require base_path($route['controller']);
            }
        }
        return $this->abort();
    }

    /**
     * TO ABORT THE REQUEST WIHT ANY POSSIBLE HTTP STATUS CODE
     */

    protected function abort($statusCode = 404)
    {
        http_response_code($statusCode);
        require base_path("views/{$statusCode}.php");
    }
}
