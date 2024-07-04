<?php

namespace controllers;

use core\App;
use services\MangasService;
use services\TagsService;
use controllers\Controller;


class TagsController extends Controller
{

    public function index()
    {

        $headerTitle = 'LES GENRES';

        $db = App::getServicesContainer()->getContainer(TagsService::class);
        $cardsTab = $db->selectAllTags();

        $this->views('/tags/index.tags.view.php', [
            'cardsTab' => $cardsTab,
            'headerTitle' => $headerTitle
        ]);
    }

    public function show()
    {

        $dbMangas = App::getServicesContainer()->getContainer(MangasService::class);
        $tags = $dbMangas->selectMangasByTagId($_GET['id']);

        $dbTags = App::getServicesContainer()->getContainer(TagsService::class);
        $tagName = $dbTags->selectById($_GET['id']);
        $headerTitle = $tagName['tag_name'];

        $this->views('/tags/show.tags.view.php', [

            'tags' => $tags,
            'headerTitle' => $headerTitle
        ]);
    }
}
