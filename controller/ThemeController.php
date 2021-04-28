<?php

namespace Controller;

use Model\Manager\ThemeManager;
use Model\Manager\TopicManager;
use App\Session;

class ThemeController
{
  public function themeList()
  {
    $userStatus = session::getUser()->getStatus();
    $themeModel = new ThemeManager;
    $themes = $themeModel->findAll();

    return [
      "view" => "listOfThemes.php",
      "data" => [
        "themes" => $themes,
        "userStatus" => $userStatus
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

  // méthode pour ajouter un nouveau theme
  public function addNewTheme()
  {
    // si le formulaire n'est pas vide
    if (!empty($_POST['themeTitle'])) {

      // on va se prémunir des failles XSS, on va utiliser filter input
      $theme = filter_input(INPUT_POST, "themeTitle", FILTER_SANITIZE_STRING);
      $model = new ThemeManager;

      // si le nom du theme n'existe pas déjà en bdd
      if (!$model->findOneByName($theme)) {
        $model->addTheme($theme);
        // ! = "s'il n'y est PAS" on ajoute le nouveau theme

        // redirection vers la liste des themes.
        header("Location:?ctrl=theme&method=themeList");
      } else {
        var_dump("This theme already exists");
        // sinon on affiche que le theme existe déjà. 
      }
    }
    return [
      "view" => 'createTheme.php',
      "data" => null
    ];
  }
}
