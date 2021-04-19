<?php

namespace Controller;

use Model\Manager\MessageManager;

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

  // méthode pour ajouter un message (répondre)
  // méthode pour modifier son message
  // méthode pour supprimer son message

}
