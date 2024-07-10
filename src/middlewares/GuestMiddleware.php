<?php

namespace middlewares;

class GuestMiddleware extends Middleware
{
    public function handle()
    {
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
