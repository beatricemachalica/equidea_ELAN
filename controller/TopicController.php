<?php

namespace Controller;

use Model\Manager\TopicManager;
use Model\Manager\MessageManager;
use Model\Manager\UserManager;
use Model\Manager\ThemeManager;
use App\Session;

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
    $themeId = (isset($_GET['id_theme'])) ? $_GET['id_theme'] : null;
    $themeModel = new ThemeManager;
    $themeInformations = $themeModel->findOneById($themeId);
    $themeTitle = $themeInformations->getTitle();

    if (!empty($_POST['topicTitle']) && !empty($_POST['message'])) {

      $topicTitle = filter_input(INPUT_POST, "topicTitle", FILTER_SANITIZE_STRING);
      $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);

      // $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
      // $themeId = filter_input(INPUT_POST, "themeId", FILTER_SANITIZE_STRING);

      //without hidden inputs :
      $themeId = (isset($_GET['id_theme'])) ? $_GET['id_theme'] : null;
      $username = (isset($_GET['user'])) ? $_GET['user'] : null;

      $topicModel = new TopicManager;
      $messageModel = new MessageManager;
      $userModel = new UserManager;

      // on récupère les informations de l'utilisateur
      $userInformations = $userModel->findOneByPseudo($username);
      // puis on récupère l'id de l'utilisateur
      $userId = $userInformations->getId();
      // $userId = session::getUser()->getId();

      // on vérifie si le topic n'existe pas déjà
      if (!$topicModel->findOneByName($topicTitle)) {

        $newTopic = $topicModel->addTopic($topicTitle, $themeId, $userId);

        $topicAdded = $topicModel->findOneByName($topicTitle);
        $topicId = $topicAdded["id_topic"];

        // add message
        $newMessage = $messageModel->addMessageForTopic($message, $topicId, $userId);

        header("Location:?ctrl=theme&method=themeList");
      } else {
        var_dump("le topic existe déjà");
      }
    }
    return [
      "view" => "createTopic.php",
      "data" => [
        "themeTitle" => $themeTitle
      ]
    ];
  }
  // edit topic
  public function editTopicById()
  {
    $topicId = (isset($_GET['id'])) ? $_GET['id'] : null;
    $topicModel = new TopicManager;
    $currentTopic = $topicModel->findOneById($topicId);
    $currentTopicTitle = $currentTopic->getTitle();
    $postModel = new MessageManager;
    $firstPost = $postModel->findFirstPostByTopic($topicId);
    $message = $firstPost->getText();
    $messageId = $firstPost->getId();

    if (!empty($_POST['topicTitle']) && !empty($_POST['message'])) {

      $newTopicTitle = filter_input(INPUT_POST, "topicTitle", FILTER_SANITIZE_STRING);
      $newMessage = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);

      // on vérifie si le topic n'existe pas déjà
      if (!$topicModel->findOneByName($newTopicTitle)) {

        // edit methods
        $topicModel->editTopic($topicId, $newTopicTitle);
        $postModel->editMessage($messageId, $newMessage);
        header("Location:?ctrl=theme&method=themeList");
      } else {
        var_dump("this topic already exists");
      }
    }
    return [
      "view" => "editTopicForm.php",
      "data" => [
        "topicTitle" => $currentTopicTitle,
        "firstMessage" => $message
      ]
    ];
  }
  // delete topic
  public function deleteTopicById()
  {
    $topicId = (isset($_GET['idTopic'])) ? $_GET['idTopic'] : null;
    $userId = (isset($_GET['userId'])) ? $_GET['userId'] : null;

    $topicModel = new TopicManager;
    $messagesModel = new MessageManager;

    $currentTopic = $topicModel->findOneById($topicId);
    $topicAuthor = $currentTopic->getUser();
    $topicAuthorId = $topicAuthor->getId();

    // user id topic = user id session ?
    if ($topicAuthorId == $userId) {

      // first we have to delete messages
      $messagesModel->deleteMessagesByTopic($topicId);

      // delete topic
      $topicModel->deleteTopicById($topicId);
      header("Location:?ctrl=theme&method=themeList");
    } else {
      var_dump("you are not allowed to do this");
    }
    return [
      "view" => "home.php",
      "data" => null
    ];
  }
}
