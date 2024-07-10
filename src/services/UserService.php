<?php

namespace services;

use core\App;
use repositories\BaseRepository;
use repositories\UserRepository;

class UserService extends BaseRepository
{

  protected UserRepository $userRepository;

  public function __construct()
  {
    $this->userRepository = App::injectRepository()->getContainer(UserRepository::class);
  }

  public function getUserById($id)
  {
    return $this->userRepository->getUserById($id);
  }

  public function getUserByEmail($email)
  {
    return $this->userRepository->getByEmail($email);
  }
 
}
