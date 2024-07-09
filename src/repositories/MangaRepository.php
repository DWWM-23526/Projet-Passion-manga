<?php

namespace repositories;

use models\Manga;

class MangaRepository extends BaseRepository
{
    private string $table = 'mangas';
    private string $idTable = "Id_manga";

    // GET

    public function getAllMangas()
    {
        $result = $this->getAll($this->table);
        return array_map(fn ($data) => new Manga($data), $result);
    }

    public function getMangaById(int $id)
    {
        $result = $this->getById($this->table, $this->idTable, $id);
        return $result ? new Manga($result) : null;
    }

    public function getMangasByTagID(int $id)
    {
        //TODO Refacto la requête
        $result = $this->db->query('SELECT mangas.* , tags.tag_name  FROM mangas
        JOIN tags_manga on tags_manga.Id_manga = mangas.Id_manga
        JOIN tags on tags.Id_tag = tags_manga.Id_tag
        WHERE tags.Id_tag = :id', ['id' => $id])->fetchAll();

        return array_map(fn ($data) => new Manga($data), $result);
    }

    public function searchMangas(string $searchTerm)
    {

        $result = $this->searchByString($this->table, $searchTerm);
        return array_map(fn ($data) => new Manga($data), $result);
    }
}
