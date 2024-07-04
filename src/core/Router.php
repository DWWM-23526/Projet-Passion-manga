<?php

namespace core;

use Exception;

class Router
{
    protected array $routes = [];

    public function get(string $uri, string $controller, string $method)
    {
        $this->addRoute('GET', $uri, $controller, $method);
    }
    
    public function post(string $uri, string $controller, string $method)
    {
        $this->addRoute('POST', $uri, $controller, $method);
    }

    public function delete(string $uri, string $controller, string $method)
    {
        $this->addRoute('DELETE', $uri, $controller, $method);
    }

    public function patch(string $uri, string $controller, string $method)
    {
        $this->addRoute('PATCH', $uri, $controller, $method);
    }

    public function put(string $uri, string $controller, string $method)
    {
        $this->addRoute('PUT', $uri, $controller, $method);
    }


    protected function addRoute(string $requestMethod, string $uri, string $controller, string $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'requestMethod' => $requestMethod,
        ];
    }

    public function route(string $uri, string $requestMethod)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['requestMethod'] === strtoupper($requestMethod)) {

                if (class_exists($route['controller'])) {
                    $controller = new $route['controller'];
                    $method = $route['method'];
                    if (method_exists($controller, $method)) {
                        $controller->$method();
                        return;
                    } else {
                        throw new Exception(" method {$method} not found in class {$controller}");
                    }
                } else {
                    throw new Exception("class {$route['controller']} does not exist");
                }
            }
        }
        $this->abort();
    }

    protected function abort(int $error = 404)
    {
        http_response_code($error);
        require_once __DIR__ . '/../views/errors/404.php';
        die();
    }
}
