<?php

namespace Controller;

use Model\Manager\TopicManager;
use Model\Manager\MessageManager;
use Model\Manager\UserManager;
use App\DAO;

class TopicController
{

  // méthodes pour afficher la liste des messages pour un sujet (grâce à l'id du topic)
  public function listMessagesByTopic()
  {

    $id = (isset($_GET['id'])) ? $_GET['id'] : null;

    $topicModel = new TopicManager;
    $messagesModel = new MessageManager;

    $topic = $topicModel->findOneById($id);
    $messages = $messagesModel->findMessagesByTopic($id);

    return [
      "view" => "listOfMessagesByTopic.php",
      "data" => [
        "messages" => $messages,
        "topic" => $topic
      ]
    ];
  }

  // méthodes pour ajouter un nouveau topic et son premier message
  public function addNewTopic()
  {
    if (!empty($_POST['topicTitle']) && !empty($_POST['message'])) {

      $topicTitle = filter_input(INPUT_POST, "topicTitle", FILTER_SANITIZE_STRING);
      $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
      $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
      $themeId = filter_input(INPUT_POST, "themeId", FILTER_SANITIZE_STRING);

      $topicModel = new TopicManager;
      $messageModel = new MessageManager;
      $userModel = new UserManager;

      // on récupère les informations de l'utilisateur
      $userInformations = $userModel->findOneByPseudo($username);
      // puis on récupère l'id de l'utilisateur
      $userId = $userInformations->getId();

      // on vérifie si le topic n'existe pas déjà
      if (!$topicModel->findOneByName($topicTitle)) {
        $newTopic = $topicModel->addTopic($topicTitle, $themeId, $userId);

        // on récupère l'id du nouveau topic
        $lastId = DAO::getConnection()->lastInsertId();
        // Blog cinéma exemple :
        // $lastId = $dao->getBdd()->lastInsertId();

        $newMessage = $messageModel->addMessageForTopic($message, $lastId, $userId);

        header("Location:?ctrl=theme&method=themeList");
      } else {
        var_dump("le topic existe déjà");
      }
    }
    return [
      "view" => 'createTopic.php',
      "data" => null
    ];
  }
}
