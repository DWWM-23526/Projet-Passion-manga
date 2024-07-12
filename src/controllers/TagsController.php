<?php

namespace controllers;

use core\App;
use services\MangaService;
use services\TagsService;
use controllers\Controller;
use models\Manga;

class TagsController extends Controller
{
    protected TagsService $tagsService;
    protected MangaService $mangaService;

    public function __construct()
    {
        $this->tagsService = App::injectService()->getContainer(TagsService::class);
        $this->mangaService = App::injectService()->getContainer(MangaService::class);
    }

    public function index()
    {
        $tags = $this->tagsService->getAllTags();
        $headerTitle = 'LES GENRES';

        $this->render('/tags/index.tags.view.php', [
            'tags' => $tags,
            'headerTitle' => $headerTitle
        ]);
    }

    public function show()
    {

        $mangas = $this->mangaService->getMangasByTagID($_GET['id']);
        $tagName = $this->tagsService->getTagsById($_GET['id']);
        $headerTitle = $tagName->tag_name;

        $this->render('/tags/show.tags.view.php', [

            'mangas' => $mangas,
            'headerTitle' => $headerTitle
        ]);
    }
}
