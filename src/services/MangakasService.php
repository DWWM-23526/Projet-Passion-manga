<?php

namespace services;
use services\Service;
class MangakasService extends Service
{
  private $table = 'mangakas';
  private $idTable = 'Id_mangaka';

  public function selectAllMangakas()
  {
    return $this->selectAll($this->table);
  }

  public function selectById($id)
  {
    return $this->selectOneById($this->table,$this->idTable, $id);
  }

}