<?php

namespace middlewares;

class AuthMiddleware extends Middleware
{

    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            $this->abort(403);
            exit();
        }
    }
}
