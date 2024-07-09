<?php

namespace repositories;

use models\Tags;

class TagsRepository extends BaseRepository
{
  private string $table = 'tags';
  private string $idTable = 'Id_tag';

  public function getAllTags()
  {
    $result = $this->getAll($this->table);
    return array_map(fn ($data) => new Tags($data), $result);
  }

  function getTagsById(int $id)
  {
    $result = $this->getById($this->table, $this->idTable, $id);
    return $result ? new Tags($result) : null;
  }
}
