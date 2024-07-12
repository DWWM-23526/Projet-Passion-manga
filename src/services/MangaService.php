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

    public function searchMangas(string $searchTerm)
    {
        return $this->mangaRepository->searchByStringManga($searchTerm);
    }

    public function  getMangasByTagID(int $id)
    {
        return $this->mangaRepository->getMangasByTagID($id);
    }

    public function getAllMangasByID(array $favories)
    {
        $mangas = [];
        foreach ($favories as $favoris) {
            $manga = $this->mangaRepository->getMangaById($favoris->Id_manga);
            if ($manga) {
                $mangas[] = $manga;
            }
        }

        return $mangas;
    }

}
