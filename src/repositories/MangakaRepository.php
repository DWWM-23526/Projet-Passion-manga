<?php

namespace repositories;

use models\Mangaka;

class MangakaRepository extends BaseRepository
{
  private string $table = 'mangakas';
  private string $idTable = "Id_mangaka";

  public function getAllMangakas()
  {
    $result = $this->getAll($this->table);
    return array_map(fn ($data) => (new Mangaka($data))->toArray(), $result);
  }

  public function getMangakaById(int $id)
  {
    $result = $this->getById($this->table, $this->idTable, $id);
    return $result ? (new Mangaka($result))->toArray() : null;
  }
}
