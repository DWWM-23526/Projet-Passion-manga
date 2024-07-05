<?php
namespace controllers;

use core\Database;
use controllers\Controller;


class IndexController extends Controller
{

    public function index()
    {
        $headerTitle = 'BIENVENUE SUR PASSION MANGAS';

        
        $this->render('/index.view.php',[
            'headerTitle' => $headerTitle
        ]);

    }
}
