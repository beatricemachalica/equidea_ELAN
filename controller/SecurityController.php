<?php

namespace Controller;

use App\Router;
use App\Session;
use Model\Manager\UserManager;

class SecurityController
{
  public function register()
  {
    // on va vérifier si le formulaire est rempli
    if (!empty($_POST)) {

      // on va se prémunir des failles XSS, on va utiliser des "filter input"
      $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_STRING);
      $email = filter_input(INPUT_POST, "userEmail", FILTER_SANITIZE_EMAIL);
      $passWord1 = filter_input(INPUT_POST, "firstPassword", FILTER_SANITIZE_STRING);
      $passWord2 = filter_input(INPUT_POST, "secondPassword", FILTER_SANITIZE_STRING);
      // $userName = $_POST['userName'];
      // $email = $_POST['email'];
      // $passWord1 = $_POST['passWord1'];
      // $passWord2 = $_POST['passWord2'];
      var_dump($_POST);

      if ($userName && $email && $passWord1 && $passWord2) {
        // on vérifie si tous les champs ont été renseignés

        // on vérifie si les 2 mdp correspondent
        if ($passWord1 == $passWord2) {

          // on va instancier le user manager
          $model = new UserManager();

          if (!$model->findOneByPseudo($userName)) {

            // on va chercher si l'email n'est pas déjà dans la bdd
            if (!$model->findOneByEmail($email)) {

              // hashage du mdp
              $hash = password_hash($passWord1, PASSWORD_ARGON2I); //PASSWORD_BCRYPT possible également

              // enfin si on rajoute l'utilisateur en bdd
              if ($model->addUser($userName, $email, $hash)) {

                // on redirige vers le login
                Router::redirectTo("home", "index");
              }
            } else
              var_dump("l'email existe déjà !");
          } else
            var_dump("user déjà existant !");
        } else
          var_dump("les mdp ne correspondent pas !");
      } else
        var_dump("un ou plusieurs champ(s) manquant(s)");
    }

    return [
      "view" => "security/register.php",
      "data" => null
    ];
  }

  public function login()
  {
    if (!empty($_POST)) {

      $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
      $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

      $model = new UserManager();

      if ($user = $model->findOneByPseudo($username)) {
        if (password_verify($password, $user->getPassword())) {

          Session::setUser($username);
          // on va mettre l'utilisateur en session
          Router::redirectTo("home");
          // redirection

        } else var_dump("le mot de passe ne correspond pas !");
      } else var_dump("user n'existe pas.");
    }

    return [
      "view" => "security/register.php",
      "data" => null
    ];
  }

  public function logout()
  {
    Session::removeUser();
    Router::redirectTo("home");
  }
}
