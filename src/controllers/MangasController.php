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

        $this->mangaService = App::injectService()->getContainer(MangaService::class);
    }

    public function index()
    {
        $headerTitle = 'LES MANGAS';
        $cardsTab = $this->mangaService->getAllMangas();


        $this->render('/mangas/index.mangas.view.php', [
            'cardsTab' => $cardsTab,
            'headerTitle' => $headerTitle
        ]);
    }

    public function post()
    {
        $headerTitle = 'LES MANGAS';

        if (isset($_POST['search']) && !empty($_POST['search'])) {

            $searchTerm = $_POST['search'];
            $cardsTab = $this->mangaService->searchMangas($searchTerm);

            $this->render('/mangas/index.mangas.view.php', [
                'cardsTab' => $cardsTab,
                'headerTitle' => $headerTitle
            ]);

        } else {
            header('location: /mangas');
        }
    }

    public function show()
    {

        $manga = $this->mangaService->getMangaById($_GET['id']);
        $headerTitle = $manga->manga_name;

        $this->render('/mangas/show.mangas.view.php', [
            'manga' => $manga,
            'headerTitle' => $headerTitle
        ]);
    }
}
