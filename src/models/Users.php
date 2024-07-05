<?php

namespace models;

class Users
{
  public int $Id_user;
  public ?string $password;
  public ?string $email;
  public ?string $pseudo;


  public function __construct(array $data = [])
  {
    $this->Id_user = $data['Id_user'];
    $this->password = $data['password'];
    $this->email = $data['email'];
    $this->pseudo = $data['pseudo'];
  }

  public function toArray(): array
  {
    return [
      'Id_user' => $this->Id_user,
      'password' => $this->password,
      'email' => $this->email,
      'pseudo' => $this->pseudo
    ];
  }
}
