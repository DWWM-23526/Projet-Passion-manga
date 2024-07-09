<?php

namespace controllers;


use controllers\Controller;
use core\App;
use services\AuthService;

class AuthController extends Controller
{
    protected AuthService $authService;
    public function __construct()
    {
        $this->authService = App::injectService()->getContainer(AuthService::class);
    }

    public function indexLogin()
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
        exit();
    }

    public function IndexRegister()
    {

        $headerTitle = 'ENREGISTREMENT';

        $this->render('/login/register.view.php', [
            'headerTitle' => $headerTitle,
        ]);
    }

    public function managment()
    {
        $headerTitle = 'GESTION DE COMPTE';

        $this->render('/login/managment.view.php', [
            'headerTitle' => $headerTitle,
        ]);
    }

    public function logout()
    {

        $this->authService->logoutUser();
        $headerTitle = 'BIENVENUE SUR PASSION MANGAS';

        $this->render('/index.view.php', [
            'headerTitle' => $headerTitle
        ]);
    }

    public function Register()
    {

        $registerEmail = $_POST['email'];
        $registerPassword = $_POST['password'];
        $registerPseudo = $_POST['pseudo'];

        $user = $this->authService->register($registerPseudo, $registerPassword, $registerEmail);

        if (is_array($user)) {
            $headerTitle = 'ENREGISTREMENT';
            $this->render('/login/register.view.php', [
                'headerTitle' => $headerTitle,
                'errors' => $user
            ]);
        } else {
            $user = $this->authService->autentication($registerEmail, $registerPassword);
            $user = $this->authService->login($user);
            header('Location: /');
            exit();
        }
    }
}
