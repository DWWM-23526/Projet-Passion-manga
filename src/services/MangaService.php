<?php

namespace services;

use core\App;
use repositories\MangaRepository;

class MangaService
{
    protected MangaRepository $mangaRepository;

    public function __construct()
    {
        $this->mangaRepository = App::injectRepository()->getContainer(MangaRepository::class);
    }

    public function getAllMangas()
    {
        return $this->mangaRepository->getAllMangas();
    }

    public function getMangaById(int $id)
    {
        return $this->mangaRepository->getMangaById($id);
    }

}