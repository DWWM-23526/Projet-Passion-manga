<?php

namespace services;

use services\Service;

class TagsService extends Service 
{
    private string $table = 'tags';
    private string $idTable = "Id_tag";

    public function selectAllTags()
    {
        return $this->selectAll($this->table);
    }

    public function selectById(int $id)
    {
        return $this->selectOneById($this->table,$this->idTable, $id);
    }

    public function selectMangasByTagId(int $id)
    {
        return $this->db->query('SELECT mangas.* , tags.tag_name  FROM mangas 
        JOIN tags_manga on tags_manga.Id_manga = mangas.Id_manga
        JOIN tags on tags.Id_tag = tags_manga.Id_tag
        WHERE tags.Id_tag = :id', ['id' => $id])->fetchAll();
    }
}