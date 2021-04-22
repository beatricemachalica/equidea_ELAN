<?php

namespace Controller;
// Les espaces de noms, dans leur définition la plus large, représentent un moyen d'encapsuler des éléments. 

use Model\Manager\UserManager;
// importation de UserManger grâce au namespace

// plusieurs méthodes de UserController vont gérer les actions des users.
class UserController
{
  public function login()
  {
    return [
      "view" => "security/login.php",
      "data" => null
    ];
  }

  public function signup()
  {
    return [
      "view" => "security/register.php",
      "data" => null
    ];
  }

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
