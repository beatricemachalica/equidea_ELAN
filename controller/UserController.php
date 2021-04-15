<?php

namespace Controller;

use Model\Manager\UserManager;

class UserController
{
  public function login()
  {

    // traitement de la connexion

    return [
      "view" => "login.php",
      "data" => null
    ];
  }

  // majuscule ou pas au nom de la fonction ?
  public function usersList()
  {

    $userModel = new UserManager;
    $users = $userModel->findAll();

    return [
      "view" => "listUsers.php",
      "data" => [
        "users" => $users
      ]
    ];
  }
}
