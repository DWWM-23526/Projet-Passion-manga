<?php

namespace repositories;

use models\Manga;

class MangaRepository extends BaseRepository
{
    private string $table = 'mangas';
    private string $idTable = "Id_manga";
   
    public function getAllMangas()
    {
        $result = $this->getAll($this->table);
        return array_map(fn($data) => new Manga($data), $result);
    }

    public function getMangaById(int $id)
    {
        $result = $this->getById($this->table, $this->idTable, $id);
        return $result ? new Manga($result): null;
    }
    
   public function searchMangas(string $searchTerm)
   {

    $result = $this->searchByString($this->table, $searchTerm);
    return array_map(fn($data) => new Manga($data), $result);

   }

}