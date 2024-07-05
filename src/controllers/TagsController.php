<?php

namespace controllers;

use core\App;
use services\MangaService;
use services\TagsService;
use controllers\Controller;


class TagsController extends Controller
{
    protected TagsService $tagsService;
    public function __construct()
    {
        $this->tagsService = App::injectService()->getContainer(TagsService::class);
    }

    public function index()
    {
        $cardsTab = $this->tagsService->getAllTags();
        $headerTitle = 'LES GENRES';

        $this->render('/tags/index.tags.view.php', [
            'cardsTab' => $cardsTab,
            'headerTitle' => $headerTitle
        ]);
    }

    public function show()
    {

        // $dbMangas = App::injectService()->getContainer(MangaService::class);
        // $tags = $dbMangas->selectMangasByTagId($_GET['id']);

        $dbTags = App::injectService()->getContainer(TagsService::class);
        $tags = $dbTags->getMangasByTagID($_GET['id']);
        $tagName = $dbTags->getTagsById($_GET['id']);
        $headerTitle = $tagName['tag_name'];

        $this->render('/tags/show.tags.view.php', [

            'tags' => $tags,
            'headerTitle' => $headerTitle
        ]);
    }
}
