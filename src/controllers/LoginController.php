<?php

namespace controllers;


use controllers\Controller;


class LoginController extends Controller
{

    public function index()
    {
        $headerTitle = 'CONNEXION';

        $this->views('/login/login.view.php', [
            'headerTitle' => $headerTitle
        ]);
    }

    public function login()
    {

        header('location: /');

    }

    public function register()
    {
        $headerTitle = 'Enregistrement';

        $this->views('/login/register.view.php', [
            'headerTitle' => $headerTitle
        ]);
    }
}
