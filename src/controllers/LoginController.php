<?php

namespace controllers;


use controllers\Controller;
use core\App;
use services\AuthService;

class LoginController extends Controller
{
    protected AuthService $authService;
    public function __construct()
    {
        $this->authService = App::injectService()->getContainer(AuthService::class);
    }

    public function index()
    {
        $headerTitle = 'CONNEXION';

        $this->render('/login/login.view.php', [
            'headerTitle' => $headerTitle
        ]);
    }

    public function login()
    {
        $userEmail = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->authService->autentication($userEmail, $password);
        $user = $this->authService->login($user);
        header('Location: /');
    }

    public function createUser()
    {

        $registerEmail = $_POST['email'];
        $registerPassword = $_POST['password'];
        $registerPseudo = $_POST['pseudo'];

        $user = $this->authService->register($registerPseudo, $registerPassword, $registerEmail);

        header('Location : /login');
    }

    public function registerShow()
    {

        $headerTitle = 'ENREGISTREMENT';

        $this->render('/login/register.view.php', [
            'headerTitle' => $headerTitle,
        ]);
    }
}
