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

    public function getAllFavories($id)
    {
        return $this->favoriesRepository->getFavoriesByUserId($id);
    }
  
}
