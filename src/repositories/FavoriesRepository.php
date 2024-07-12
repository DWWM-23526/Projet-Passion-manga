<?php

namespace repositories;

use models\Favories;

class FavoriesRepository extends BaseRepository
{
    private string $table = 'favoris';
    private string $userColumId = 'Id_user';
    private string $mangaColumId = 'Id_manga';

    // BASIC CRUD

    public function getFavoriesByMangaId(string $id)
    {
        $result = $this->getAllById($this->table, $this->mangaColumId, $id);
        return array_map(fn ($data) => new Favories($data), $result);
    }

    public function getFavoriesByUserId(string $id)
    {
        $result = $this->getAllById($this->table, $this->userColumId, $id);
        return array_map(fn ($data) => new Favories($data), $result);
    }

    public function addToFavories(string $mangaId, string $userId)
    {
        $this->db->query(
            "INSERT INTO {$this->table} ({$this->mangaColumId}, {$this->userColumId}) VALUES (:Id_manga, :Id_user)",
            [
                'Id_manga' => $mangaId,
                'Id_user' => $userId,
            ]
        );
    }

    public function deleteFromFavories(string $mangaId, string $userId)
    {
        $this->db->query(
            "DELETE FROM {$this->table} WHERE {$this->mangaColumId} = :Id_manga  AND {$this->userColumId} = :Id_user",
            [
                'Id_manga' => $mangaId,
                'Id_user' => $userId,
            ]
        );
    }
}
