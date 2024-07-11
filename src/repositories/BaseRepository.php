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

    protected function save(string $query, $value = [])
    {
        return $this->db->query($query, $value);
    }

    protected function delete(string $table, string $idTable, int $id)
    {
        return $this->db->query(
            "SELECT * FROM {$table} where {$idTable} = :id",
            ['id' => $id]
        );
    }
}
