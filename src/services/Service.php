<?php

namespace services;


class Service
{
    protected mixed $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    protected function selectAll(string $table)
    {
        return $this->db->query("SELECT * FROM {$table} ")->fetchAll();
    }

    protected function selectOneById(string $table, string $idTable, int $id)
    {
        return $this->db->query(
            "SELECT * FROM {$table} where {$idTable} = :id",
            ['id' => $id]
        )->fetchOrFail();
    }

}
