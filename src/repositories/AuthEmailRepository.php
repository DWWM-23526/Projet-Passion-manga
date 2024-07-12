<?php

namespace repositories;
use models\AuthEmail;

class AuthEmailRepository extends BaseRepository
{

  private string $table = 'email_confirmation';

  public function insertEmail(string $email, int $cle)
  {
    $result = $this->db->query("INSERT INTO {$this->table} (email, cle) VALUES (:email, :cle)", [
      "email" => $email,
      "cle"=> $cle,
    ]);
    return $result;
  }

  public function getByEmail(string $email)
  {
    $result = $this->db->query("SELECT * FROM {$this->table} WHERE email = :email" , ['email' => $email])->fetchOrFail();
    return new AuthEmail($result);
  }
}