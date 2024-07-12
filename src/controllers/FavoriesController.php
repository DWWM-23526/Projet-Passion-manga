<?php

namespace controllers;

use core\App;
use controllers\Controller;
use services\MangaService;
use services\FavoriesService;

class FavoriesController extends Controller
{
    protected $favoriesService;
    protected $mangaService;

    public function __construct()
    {

        $this->favoriesService = App::injectService()->getContainer(FavoriesService::class);
        $this->mangaService = app::injectService()->getContainer(MangaService::class);
    }

    public function index()
    {
        $headerTitle = 'FAVORIES';
        $userId = $_SESSION['user']['id'];
        $favories = $this->favoriesService->getAllFavories($userId);
        $mangas = $this->mangaService->getAllMAngasById($favories);

        $this->render('/favories/favories.view.php', [
            'headerTitle' => $headerTitle,
            'mangas' => $mangas,
            
        ]);
    }
}
