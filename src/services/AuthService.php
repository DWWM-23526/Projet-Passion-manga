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
    if (!$user && !password_verify($password, $user->password)) {
      exit("error");
    }
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
      return $this->userRepository->registerUser($pseudo, $password, $email);
    } else {
      var_dump($errors);
      return $errors;
    }
  }

  // public function updatePassword()
  // {

  // }

  public function deleteAccount()
  {
  }

  public function logout()
  {
    session_start();
    if (!isset($_SESSION['user'])) {
      header('Location: login.view.php');
      exit();
    }
    unset($_SESSION['user']);

    header('Location: register.view.php');
  }
}
