<?php

namespace services;

class Service
{
    protected $db;

    public function __construct($db)
    {

        $this->db = $db;
    }


    protected function selectAll($table)
    {
        return $this->db->query("SELECT * FROM {$table} ")->fetchAll();
    }

    protected function selectOneById($table, $id)
    {
        return $this->db->query(
            "SELECT * FROM {$table} where Id_manga = :id",
            ['id' => $id]
        )->fetchOrFail();
    }
}
