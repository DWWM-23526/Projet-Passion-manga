<?php

namespace middlewares;

use services\JwtService;
use core\App;
use core\HTTPResponse;
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
            HTTPResponse::abort(403);
        }

        if (!isset($_COOKIE['AuthToken'])) {
            HTTPResponse::abort(401);
        }

        $userTokenDecoded = $this->decodeToken();

        $this->verifyUserId($userTokenDecoded);
        $this->verifyUserEmail($userTokenDecoded);
        $this->verifyUserIdFavories($userTokenDecoded);
    }

    private function decodeToken()
    {
        $token = $_COOKIE['AuthToken'];
        $authTokenDecoded = $this->jwtService->validateToken($token);

        if (!$authTokenDecoded) {
            HTTPResponse::abort(401);
        }

        return $authTokenDecoded;
    }

    private function verifyUserId($tokenDecoded)
    {
        $tokenUserId = $tokenDecoded['userId'];
        $sessionUserId = $_SESSION['user']['id'];

        $user = $this->userService->getUserById($tokenUserId);

        if (!$user || $sessionUserId !== $user->Id_user) {
            HTTPResponse::abort(401);
        }
    }

    private function verifyUserEmail($tokenDecoded)
    {
        $tokenEmail = $tokenDecoded['email'];
        $sessionUserEmail = $_SESSION['user']['email'];

        $user = $this->userService->getUserByEmail($tokenEmail);

        if (!$user || $sessionUserEmail !== $user->email) {
            HTTPResponse::abort(401);
        }
    }

    private function verifyUserIdFavories($tokenDecoded)
    {
        if (!str_contains($_SERVER['REQUEST_URI'], "/favories/user" )) {
            return;
            
        } else {

            $tokenUserId = $tokenDecoded['userId'];
            $urlUserId = $_GET['id'];

            if ($tokenUserId == $urlUserId) {
                return;
            } else {
                HTTPResponse::abort(401);
            }
        }
    }
}
 