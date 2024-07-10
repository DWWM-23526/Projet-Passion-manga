<?php

namespace middlewares;

use services\JwtService;
use core\App;
use services\UserService;

class AuthMiddleware extends Middleware
{
    protected JwtService $jwtService;
    protected UserService $userService;

    public function __construct()
    {
        $this->jwtService = App::injectService()->getContainer(JwtService::class);
        $this->userService = App::injectService()->getContainer(UserService::class);
    }

    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            $this->abort(403);
        }

        if (!isset($_COOKIE['AuthToken'])) {
            $this->abort(401);
        }

        $userTokenDecoded = $this->decodeToken();

        $this->verifyUserId($userTokenDecoded);
        $this->verifyUserEmail($userTokenDecoded);
    }

    private function decodeToken()
    {
        $token = $_COOKIE['AuthToken'];
        $authTokenDecoded = $this->jwtService->validateToken($token);

        if (!$authTokenDecoded) {
            $this->abort(401);
        }

        return $authTokenDecoded;
    }

    private function verifyUserId($tokenDecoded)
    {
        $tokenUserId = $tokenDecoded['userId'];
        $sessionUserId = $_SESSION['user']['id'];

        $user = $this->userService->getUserById($tokenUserId);

        if (!$user || $sessionUserId !== $user->Id_user) {
            $this->abort(401);
        }
    }

    private function verifyUserEmail($tokenDecoded)
    {
        $tokenEmail = $tokenDecoded['email'];
        $sessionUserEmail = $_SESSION['user']['email'];

        $user = $this->userService->getUserByEmail($tokenEmail);

        if (!$user || $sessionUserEmail !== $user->email) {
            $this->abort(401);
        }
    }
}
