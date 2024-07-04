<?php

namespace core;

class Router
{
    protected array $routes = [];

    public function get(string $uri, string $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET',
        ];
    }
    public function post(string $uri, string $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST',
        ];
    }
    public function delete(string $uri, string $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'DELETE',
        ];
    }
    public function patch(string $uri, string $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PATCH',
        ];
    }
    public function put(string $uri, string $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PUT',
        ];
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                require __DIR__ . '/../' . $route['controller'];
                return;
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
