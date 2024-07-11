<?php

namespace controllers;


use controllers\Controller;
use core\App;
use services\AuthService;
use services\JwtService;

class AuthController extends Controller
{
    protected AuthService $authService;
    protected JwtService $jwtService;

    public function __construct()
    {
        $this->authService = App::injectService()->getContainer(AuthService::class);
        $this->jwtService = App::injectService()->getContainer(JwtService::class);
    }

    public function indexLogin()
    {
        $headerTitle = 'CONNEXION';

        $this->render('/login/login.view.php', [
            'headerTitle' => $headerTitle
        ]);
    }

    public function validRegister()
    {
        // todo
    }

    public function login()
    {
        $userEmail = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->authService->autentication($userEmail, $password);
        if (is_array($user)) {
            $headerTitle = 'CONNEXION';
            $this->render('/login/login.view.php', [
                'headerTitle' => $headerTitle,
                'errors' => $user
            ]);
        } else {
            $token = $this->jwtService->generateToken($user);
            setcookie('AuthToken', $token, time()+ (60*60), "/", "", false, true);
            $user = $this->authService->setUser($user);
            header('Location: /');
            exit();
        }
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
            $user = $this->authService->setUser($user);
            header('Location: /');
            exit();
        }
    }
}
