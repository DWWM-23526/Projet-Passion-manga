<?php

namespace services;

use core\App;
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
    $user = $this->userRepository->getByEmail($email);
    if (!$user) {
      die("NON connecté");
    }
    // if (!password_verify($password, $user->password)) {
    //   die("NON connecté");
    // }
    return $user;
  }

  public function login($user)
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
    $errors = [];

    if (!strlen($pseudo) >= 4 && !strlen($pseudo) <= 30) {
      $errors["pseudo"] = "Pseudo doit être entre 4 et 30 caractères";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors["email"] = "Ce n'est pas un email !";
    }
    if (!strlen($password) >= 8 && !strlen($password) <= 30) {
      $errors["passwordLength"] = "Password pas assez long !";
    }

    if (empty($errors)) {
      return $this->userRepository->registerUser($pseudo, $password, $email);
    } else {
      return $errors;
    }
  }

  public function updatePassword()
  {
  }

  public function deleteAccount()
  {
  }

  public function logout()
  {
    session_start();
    if (!isset($_SESSION['user_id'])) {
      header('Location: login.view.php');
      exit();
    }
    unset($_SESSION['user_id']);

    header('Location: register.view.php');
  }
}
