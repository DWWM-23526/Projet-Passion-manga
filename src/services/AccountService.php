<?php

namespace services;

use services\Service;

class AccountService extends Service
{
  private string $tableUser = 'users';

  public function login(string $emailUser, string $password)
  {
    $stmt = $this->selectAll($this->tableUser);
    $stmt->execute(['email' => $emailUser]);
    $user = $stmt->fetch();

    if (!$user && !password_verify($password, $user['password'])) {
      return die('User ou mdp incorrect');
    }
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    return true;
  }

  public function register(string $username, string $password, string $emailUser)
  {
    $stmt = $this->db->query("SELECT * FROM users WHERE email = :email", ['email' => $emailUser])->fetchOrFail();

    $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

    $stmt = $this->db->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
    return $stmt->execute([
      "username" => $username,
      "password" => $hashedPassword,
      "email" => $emailUser
    ]);
  }

  public function logout()
  {
    session_start();
    if (!isset($_SESSION["user_id"])) {
      header("Location: login.view.php");
      exit();
    }
    unset($_SESSION["user_id"]);

    header("Location: register.view.php");
  }
}
