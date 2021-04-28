<?php

namespace Controller;
// Les espaces de noms, dans leur définition la plus large, représentent un moyen d'encapsuler des éléments. 

use Model\Manager\UserManager;
use App\Session;
use Model\Manager\MessageManager;
use Model\Manager\TopicManager;

// importation de UserManager grâce au namespace

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

  public function userAccount()
  {
    if (Session::getUser()) {
      $username = (isset($_GET['user'])) ? $_GET['user'] : null;

      $userModel = new UserManager;
      $topicModel = new TopicManager;
      $messagesModel = new MessageManager;

      $userInformations = $userModel->findOneByPseudo($username);
      $userId = $userInformations->getId();
      $userTopics = $topicModel->findTopicsByUserId($userId);
      // $messages = $messagesModel->findMessagesByTopic();
    }

    return [
      "view" => "security/account.php",
      "data" => [
        "userInformations" => $userInformations,
        "topics" => $userTopics
      ]
    ];
  }
}
