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
        return array_map(fn($data) => (new Tags($data))->toArray(), $result);
  }

  function getTagsById(int $id)
  {
    $result = $this->getById($this->table, $this->idTable, $id);
    return $result ? (new Tags($result))->toArray() : null;
  }
  
  public function getMangasByTagID(int $id)
  {
    //TODO Refacto la requête
       return $this->db->query('SELECT mangas.* , tags.tag_name  FROM mangas
        JOIN tags_manga on tags_manga.Id_manga = mangas.Id_manga
        JOIN tags on tags.Id_tag = tags_manga.Id_tag
        WHERE tags.Id_tag = :id', ['id' => $id])->fetchAll();
  }
}