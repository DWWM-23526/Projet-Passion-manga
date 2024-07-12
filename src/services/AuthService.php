<?php

namespace services;

use core\App;
use models\Users;
use repositories\BaseRepository;
use repositories\UserRepository;

class AuthService extends BaseRepository
{

  protected UserRepository $userRepository;

  public function __construct()
  {
    $this->userRepository = App::injectRepository()->getContainer(UserRepository::class);
  }

  public function autentication(string $email, string $password)
  {
    $errors = [];
    $user = $this->userRepository->getByEmail($email);
    if (!$user || !password_verify($password, $user->password)) {
      $errors["passwordError"] = "MDP ou email incorrect";
    }

    if (empty($errors)) {
      return $user;
    } else {
      return $errors;
    }
  }


  public function setUser($user)
  {
    $_SESSION["user"] = [
      "id" => $user->Id_user,
      "email" => $user->email,
      "pseudo" => $user->pseudo
    ];
    return;
  }

  public function register($pseudo, $password, $email)
  {
    $pattern = '/^(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*[a-zA-Z]).{8,}$/';
    $errors = [];

    if (!strlen($pseudo) >= 4 && !strlen($pseudo) <= 30) {
      $errors["pseudo"] = "Pseudo doit être entre 4 et 30 caractères";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors["email"] = "Ce n'est pas un email !";
    }
    if (!preg_match($pattern, $password)) {
      $errors["passwordComplexity"] = "Le mot de passe doit contenir au moins huit caractère un chiffre, un caractère spécial et une lettre !";
    }

    if (empty($errors)) {
      return new Users([
        "pseudo" => $pseudo,
        "password" => $password,
        "email" => $email
      ]);
    } else {
      var_dump($errors);
      return $errors;
    }
  }

  public function deleteAccount()
  {
  }

  public function logoutUser()
  {
    unset($_SESSION['user']);
  }
}
