<?php 
namespace middlewares;

class Middleware
{

    const MAP = [
        'guest' => GuestMiddleware::class,
        'auth' => AuthMiddleware::class,

    ];

}