<?php

namespace core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    /**
     * TO EXECUTE GET ACTION
     */
    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }


    /**
     * TO EXECUTE POST ACTION
     */
    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
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
        $this->add('PUT', $uri, $controller);
    }

    /**
     * TO ROUTE CURRENT URI
     */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {

                return require base_path($route['controller']);
            }
        }
        $this->abort();
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
