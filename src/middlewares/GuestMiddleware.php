<?php

namespace middlewares;

use core\HTTPResponse;

class GuestMiddleware extends Middleware
{
    public function handle()
    {
        
        if ($_SESSION['user'] ?? false) {
            
            require_once __DIR__ . '/../utils/urlis.php';

            if (urlIs('/login') || urlIs('/register')){
                HTTPResponse::redirect('/', 401);
                exit();
            }

            HTTPResponse::abort(403);
            exit();
        }
    }
}
