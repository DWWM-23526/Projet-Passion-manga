<?php 
namespace middlewares;

class Middleware
{

    const MAP = [
        'guest' => GuestMiddleware::class,
        'auth' => AuthMiddleware::class,

    ];

    protected function abort(int | string $error = 404)
    {
        http_response_code($error);
        require_once __DIR__ . "/../views/errors/{$error}.php";
        die();
    }

    protected function redirect(string $error)
    {
        require_once __DIR__ . "/../views/errors/{$error}.php";
        die();
    }
}