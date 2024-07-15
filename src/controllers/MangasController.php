<?php

namespace controllers;

use core\App;
use services\MangaService;
use controllers\Controller;
use services\FavoriesService;

class MangasController extends Controller
{
    protected MangaService $mangaService;
    protected FavoriesService $favoriesService;

    public function __construct()
    {

        $this->mangaService = App::injectService()->getContainer(MangaService::class); 
        $this->favoriesService = App::injectService()->getContainer(FavoriesService::class);
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

        $isFavorite = $this->favoriesService->getFavoriteByMangaId($manga->Id_manga);

        $this->render('/mangas/show.mangas.view.php', [
            'manga' => $manga,
            'isFavorite' => $isFavorite,
            'headerTitle' => $headerTitle,
        ]);
    }

    public function addFav()
    {

        $manga = $this->mangaService->getMangaById($_GET['id']);
        $headerTitle = $manga->manga_name;

        $userId = $_SESSION['user']['id'];
        $mangaId = $manga->Id_manga;

        $this->favoriesService->addFavorites($mangaId, $userId);

        $isFavorite = $this->favoriesService->getFavoriteByMangaId($manga->Id_manga);
        $this->render('/mangas/show.mangas.view.php', [
            'manga' => $manga,
            'isFavorite' => $isFavorite,
            'headerTitle' => $headerTitle,
        ]);
    }

    public function deleteFav()
    {
        $manga = $this->mangaService->getMangaById($_GET['id']);
        $headerTitle = $manga->manga_name;

        $userId = $_SESSION['user']['id'];
        $mangaId = $manga->Id_manga;

        $this->favoriesService->deleteFavorite($mangaId, $userId);

        $isFavorite = $this->favoriesService->getFavoriteByMangaId($manga->Id_manga);
        $this->render('/mangas/show.mangas.view.php', [
            'manga' => $manga,
            'isFavorite' => $isFavorite,
            'headerTitle' => $headerTitle,
        ]);

    }
}
