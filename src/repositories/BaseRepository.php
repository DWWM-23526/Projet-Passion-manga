<?php

namespace repositories;

use core\App;
use core\Database;

class BaseRepository
{
    protected mixed $db;

    public function __construct()
    {
        $this->db = App::inject()->getContainer(Database::class);
    }

    protected function getAll(string $table)
    {
        return $this->db->query("SELECT * FROM {$table} ")->fetchAll();
    }




    protected function getById(string $table, string $idTable, int $id)
    {
        return $this->db->query(
            "SELECT * FROM {$table} where {$idTable} = :id",
            ['id' => $id]
        )->fetchOrFail();
    }

    protected function searchByStringManga(string $table, string $searchTerm)

    {
        return $this->db->query(
            "SELECT * FROM $table WHERE manga_name LIKE :searchTerm",
            ['searchTerm' => "%$searchTerm%"]
        )->fetchAll();
    }

    protected function searchByStringMangaka(string $table, string $searchTerm)
    {
        return $this->db->query(
            "SELECT * FROM $table WHERE first_name LIKE :searchTerm OR last_name LIKE :searchTerm2",
            [
                'searchTerm' => "%$searchTerm%",
                'searchTerm2' => "%$searchTerm%"
            ]
        )->fetchAll();
    }



}
