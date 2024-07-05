<?php

namespace repositories;

class BaseRepository
{
    protected mixed $db;

    public function __construct(mixed $db)
    {

        $this->db = $db;
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

}