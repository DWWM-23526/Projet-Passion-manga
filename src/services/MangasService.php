<?php

namespace services;

use services\Service;

class MangasService extends Service 
{
    private $table = 'mangas';


    public function selectAllMangas()
    {
        return $this->selectAll($this->table);
    }

    public function selectById($id)
    {
        return $this->selectOneById($this->table, $id);
    }
}