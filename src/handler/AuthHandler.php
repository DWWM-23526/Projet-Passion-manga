<?php
namespace handler;

use core\App;
use services\AuthService;
use services\JwtService;

class AuthHandler
{
  protected mixed $auth;
  protected mixed $jwt;

  public function __construct() {
    $this->auth = App::inject()->getContainer(AuthService::class);
    $this->jwt = App::inject()->getContainer(JwtService::class);
  }

  public function insertEmailHandler($email)
  {
    $result = $this->auth->insertEmail($email);
    return $result;
  }


  public function verifEmailHandler()
  {
    if (isset($_GET['token'])) {
      $token = $_GET['token'];
      $payload = $this->jwt->validateToken($token);

      if ($payload && isset($payload['email'])) {
        $email = $payload['email'];
        // todo continuer comparaison email
      }
    }
  }
}