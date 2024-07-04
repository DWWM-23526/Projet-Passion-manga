<?php
namespace controller;

use core\Database;
use controller\Controller;


class IndexController extends Controller
{

    public function index()
    {
        $headerTitle = 'BIENVENUE SUR PASSION MANGAS';


        $config = require __DIR__ . '/../config.php';
        $db = Database::getInstance($config['database']);
        $mangas = $db->query("SELECT * FROM mangas")->fetchAll();

        require __DIR__ . '/../views/index.view.php';
        $this->views('/index.view.php',[
            'mangas' => $mangas,
            'headerTitle' => $headerTitle
        ]);

    }
}
