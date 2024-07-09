<?php

namespace middlewares;

class GuestMiddleware extends Middleware
{
    public function handle()
    {
        require __DIR__ . '/../utils/urlis.php';
        if ($_SESSION['user'] ?? false) {

            if (urlIs('/login')) {
                $this->redirect('login');
                exit();
            }

            $this->abort(403);
            exit();
        }
    }
}
