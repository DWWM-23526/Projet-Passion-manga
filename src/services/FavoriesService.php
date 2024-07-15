<?php

namespace services;

use core\App;
use repositories\FavoriesRepository;

class FavoriesService
{
    protected FavoriesRepository $favoriesRepository;

    public function __construct()
    {
        $this->favoriesRepository = App::injectRepository()->getContainer(FavoriesRepository::class);
    }

    public function addFavorites(int $mangaId, int $userId)
    {
        $this->favoriesRepository->addToFavories($mangaId, $userId); 
    }

    public function deleteFavorite(int $mangaId, int $userId)
    {
        $this->favoriesRepository->deleteFromFavories($mangaId, $userId);

    }

    public function getAllFavories($id)
    {
        return $this->favoriesRepository->getFavoriesByUserId($id);
    }

    public function getFavoriteByMangaId($id)
    {
        $result = $this->favoriesRepository->getFavoriteByMangaId($id);

        return $result !== null;

    }
  
}
