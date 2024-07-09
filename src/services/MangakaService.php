<?php

namespace services;

use core\App;
use repositories\MangakaRepository;

class MangakaService
{
  protected MangakaRepository $mangakaRepository;

  public function __construct()
  {
    $this->mangakaRepository = App::injectRepository()->getContainer(MangakaRepository::class);
  }

  public function getAllMangakas()
  {
    return $this->mangakaRepository->getAllMangakas();
  }

  public function getAllMangakasById(int $id)
  {
    return $this->mangakaRepository->getMangakaById($id);
  }
}
