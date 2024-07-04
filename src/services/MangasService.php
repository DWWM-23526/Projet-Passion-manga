<?php

namespace services;

use services\Service;

class MangasService extends Service 
{
    private string $table = 'mangas';
    private string $idTable = "Id_manga";

    public function selectAllMangas()
    {
        return $this->selectAll($this->table);
    }

    public function selectById(int $id)
    {
        return $this->selectOneById($this->table,$this->idTable, $id);
    }
}