<?php
namespace services;
use repositories\BaseRepository;

class AuthService extends BaseRepository {

  private string $table = 'users';
  public function login(string $password)
  {
    $stmt = $this->getAll($this->table);
    $user = $stmt;
    if (!$user && !password_verify($password, $user['password'])) {
      return die('User ou Mdp incorrect');
    }
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    return die('Connecté !');
  }

  public function register()
  {
    //TODO Logique d'inscription.
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
    if (!isset($_SESSION['user_id'])) {
      header('Location: login.view.php');
      exit();
    }
    unset($_SESSION['user_id']);

    header('Location: register.view.php');
  }
}