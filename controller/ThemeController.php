<?php

namespace Controller;

use Model\Manager\ThemeManager;
use Model\Manager\TopicManager;

class ThemeController
{
  public function themeList()
  {

    $themeModel = new ThemeManager;
    $themes = $themeModel->findAll();

    return [
      "view" => "listOfThemes.php",
      "data" => [
        "themes" => $themes
      ]
    ];
  }

  public function listTopicsByCategory()
  {

    $id = (isset($_GET['id'])) ? $_GET['id'] : null;

    $themeModel = new ThemeManager;
    $topicModel = new TopicManager;

    $theme = $themeModel->findOneById($id);
    $topics = $topicModel->findTopicsByCategory($id);

    return [
      "view" => "listOfTopicsByCategory.php",
      "data" => [
        "theme" => $theme,
        "topics" => $topics
      ]
    ];
  }
}
