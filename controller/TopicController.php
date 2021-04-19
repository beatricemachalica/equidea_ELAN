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
  public function addNewTopicForm()
  {
    // renvoyer un form pour le nouveau topic
    // la method addNewTopic
  }
  public function addNewTopic()
  {
    $topicModel = new TopicManager;
    $newTopic = $topicModel->addOneTopic();
  }
}
