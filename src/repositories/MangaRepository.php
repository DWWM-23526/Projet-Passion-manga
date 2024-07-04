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
        return array_map(fn($data) => (new Manga($data))->toArray(), $result);
    }

    public function getMangaById(int $id)
    {
        $data = $this->getById($this->table, $this->idTable, $id);
        return $data ? (new Manga($data))->toArray() : null;
    }
    // public function selectMangasByTagId(int $id)
    // {
    //     return $this->db->query('SELECT mangas.* , tags.tag_name  FROM mangas 
    //     JOIN tags_manga on tags_manga.Id_manga = mangas.Id_manga
    //     JOIN tags on tags.Id_tag = tags_manga.Id_tag
    //     WHERE tags.Id_tag = :id', ['id' => $id])->fetchAll();
    // }

}