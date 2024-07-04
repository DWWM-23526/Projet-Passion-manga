<?php

namespace controllers;

use core\App;
use services\MangaService;
use controllers\Controller;


class MangasController extends Controller
{
    protected MangaService $mangaService;

    public function __construct()
    {
        
        $this->mangaService = App::inject()->getContainer(MangaService::class);
        
    }

    public function index()
    {

        // $db = App::inject()->getContainer(MangasService::class);
        // $cardsTab = $db->selectAllMangas();
        $cardsTab = $this->mangaService->getAllMangas();
        $headerTitle = 'LES MANGAS';

        $this->views('/mangas/index.mangas.view.php', [
            'cardsTab' => $cardsTab,
            'headerTitle' => $headerTitle
        ]);
    }

    public function show()
    {

        // $db = App::inject()->getContainer(MangasService::class);
        // $manga = $db->selectById($_GET['id']);
        $manga = $this->mangaService->getMangaById($_GET['id']);
        $headerTitle = $manga['manga_name'];

        $this->views('/mangas/show.mangas.view.php', [
            'manga' => $manga,
            'headerTitle' => $headerTitle
        ]);
    }
}
