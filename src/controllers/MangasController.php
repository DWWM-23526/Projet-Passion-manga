<?php

namespace controllers;

use core\App;
use services\MangasService;
use controllers\Controller;


class MangasController extends Controller
{

    public function index()
    {

        $db = App::getServicesContainer()->getContainer(MangasService::class);
        $cardsTab = $db->selectAllMangas();
        $headerTitle = 'LES MANGAS';

        $this->views('/mangas/index.mangas.view.php', [
            'cardsTab' => $cardsTab,
            'headerTitle' => $headerTitle
        ]);
    }

    public function show()
    {

        $db = App::getServicesContainer()->getContainer(MangasService::class);
        $manga = $db->selectById($_GET['id']);
        $headerTitle = $manga['manga_name'];

        $this->views('/mangas/show.mangas.view.php', [
            'manga' => $manga,
            'headerTitle' => $headerTitle
        ]);
    }
}
