<?php

namespace controllers;

use core\App;
use services\MangasService;
use controllers\Controller;


class MangasController extends Controller
{
    private $db;

public function __construct()
{
  $this->db = App::getServicesContainer()->getContainer(MangasService::class);
}

    public function index()
    {
        $cardsTab = $this->db->selectAllMangas();
        $headerTitle = 'LES MANGAS';

        $this->views('/mangas/index.mangas.view.php', [
            'cardsTab' => $cardsTab,
            'headerTitle' => $headerTitle
        ]);
    }

    public function show()
    {
        $manga = $this->db->selectById($_GET['id']);
        $headerTitle = $manga['manga_name'];

        $this->views('/mangas/show.mangas.view.php', [
            'manga' => $manga,
            'headerTitle' => $headerTitle
        ]);
    }
}
