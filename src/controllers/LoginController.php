<?php

namespace controllers;


use controllers\Controller;


class LoginController extends Controller
{

    public function index()
    {
        $headerTitle = 'CONNEXION';

        $this->render('/login/login.view.php', [
            'headerTitle' => $headerTitle
        ]);
    }

    public function login()
    {

        header('location: /');

    }

    public function register()
    {
        $headerTitle = 'ENREGISTREMENT';

        $this->render('/login/register.view.php', [
            'headerTitle' => $headerTitle
        ]);
    }
}
