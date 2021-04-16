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
}
