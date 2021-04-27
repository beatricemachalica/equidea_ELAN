<?php

namespace Controller;

use Model\Manager\MessageManager;
use Model\Manager\UserManager;

class MessageController
{
  public function themeList()
  {

    $msgModel = new MessageManager;
    $messages = $msgModel->findAll();

    return [
      "view" => "listOfThemes.php",
      "data" => [
        "messages" => $messages
      ]
    ];
  }

  // méthode pour ajouter un message
  public function addMessage()
  {
    if (!empty($_POST['textMessage'])) {

      // filter input pour se prémunir des failles XSS 
      $text = filter_input(INPUT_POST, "textMessage", FILTER_SANITIZE_STRING);
      $idTopic = filter_input(INPUT_POST, "topicId", FILTER_SANITIZE_STRING);
      $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);

      $msgModel = new MessageManager;
      $userModel = new UserManager;

      // on récupère les informations de l'utilisateur
      $userInformations = $userModel->findOneByPseudo($username);
      // puis on récupère l'id de l'utilisateur
      $userID = $userInformations->getId();

      // on ajoute le nouveau message
      $newMessage = $msgModel->addMessageForTopic($text, $idTopic, $userID);
    }

    header("Location:?ctrl=topic&method=listMessagesByTopic&id=$idTopic");

    // $posts = model puis findMessagesForTopic($idTopic)
    // $topic = model puis findOneById($idTopic)
    // return [
    // "view" => "listOfMessagesByTopic.php",
    // "data" => [
    // "posts" => $posts,
    // "topic" => $topic
    // ]
    // ];
  }

  // méthode pour modifier son message
  // public function editMessage(){}

  // méthode pour supprimer son message
  // public function deleteMessage(){}

}
