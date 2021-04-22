<?php

namespace Controller;

use Model\Manager\TopicManager;
use Model\Manager\MessageManager;

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

  // méthodes pour ajouter un nouveau sujet
  public function addNewTopic()
  {
    if (!empty($_POST['topicTitle'])) {

      $topic = filter_input(INPUT_POST, "topicTitle", FILTER_SANITIZE_STRING);
      $model = new TopicManager;

      // on vérifie si le topic n'existe pas déjà
      if (!$model->findOneByName($topic)) {
        $model->addTopic($topic);
        // ajouter le topic avec l'id du theme
        // ajouter le premier message du nouveau topic
        header("Location:?ctrl=theme&method=themeList"); //rediriger vers une autre page ?
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
