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

        $cardsTab = $this->mangaService->getAllMangas();
        $headerTitle = 'LES MANGAS';

        $this->render('/mangas/index.mangas.view.php', [
            'cardsTab' => $cardsTab,
            'headerTitle' => $headerTitle
        ]);
    }

    public function show()
    {

        $manga = $this->mangaService->getMangaById($_GET['id']);
        $headerTitle = $manga['manga_name'];

        $this->render('/mangas/show.mangas.view.php', [
            'manga' => $manga,
            'headerTitle' => $headerTitle
        ]);
    }
}
