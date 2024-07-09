<?php

namespace repositories;

use models\Users;

class UserRepository extends BaseRepository
{
  private string $table = 'users';


  public function getAllUser()
  {
    $result = $this->getAll($this->table);
    return array_map(fn ($data) => new Users($data), $result);
  }

  public function getByEmail(string $email)
  {
    $result = $this->db->query("SELECT * FROM {$this->table} WHERE email = :email", ['email' => $email])->fetchOrFail();
    return new Users($result);
  }


  public function registerUser(string $pseudo, string $password, string $emailUser)
  {

    $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

    $result = $this->db->query("INSERT INTO users (pseudo, password, email) VALUES (:pseudo, :password, :email)", [
      "pseudo" => $pseudo,
      "password" => $hashedPassword,
      "email" => $emailUser
    ]);

    return $result;
  }
}
