<?php

namespace middlewares;

class GuestMiddleware extends Middleware
{
    public function handle()
    {
        
        if ($_SESSION['user'] ?? false) {
            
            require_once __DIR__ . '/../utils/urlis.php';

            if (urlIs('/login') || urlIs('/register')){
                $this->redirect('login');
                exit();
            }

            $this->abort(403);
            exit();
        }
    }
}
