<?php

namespace Controller;

class HomeController
{

  // affichage de la page d'accueil, fonction par défaut

  public function index()
  {
    return [
      "view" => "home.php",
      "data" => null,
      "titrePage" => "Equidea | Accueil"
    ];
  }
}
