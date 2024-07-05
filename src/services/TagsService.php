<?php

namespace services;

use core\App;
use repositories\TagsRepository;

class TagsService
{

  protected TagsRepository $tagsRepository;

  public function __construct()
  {
    $this->tagsRepository = App::injectRepository()->getContainer(TagsRepository::class);
  }

  public function getAllTags()
    {
        return $this->tagsRepository->getAllTags();
    }

  public function getTagsById(int $id)
  {
    return $this->tagsRepository->getTagsById($id);
  }

  public function getMangasByTagID(int $id)
  {
    return $this->tagsRepository->getMangasByTagID($id);
  }
}