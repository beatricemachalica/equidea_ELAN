<?php

namespace App;
// Les espaces de noms, dans leur définition la plus large, représentent un moyen d'encapsuler des éléments. 

// une classe abstraite est une classe dont l'implémentation n'est pas complète et qui n'est pas instanciable.

// La méthode handleRequest($get) du Router va permettre à l'index.php 
// (autremment dit le "front controller") de gérer les évenements / les actions des utilisateurs,
// grâce à la method $_GET. Autrement dit, le programme sait ce qu'il doit afficher
// grâce à ce qu'il trouve dans l'URL
abstract class Router
{

    public static function handleRequest($get)
    {
        $ctrlname = "Controller\HomeController";
        $method = "index";

        if (isset($get['ctrl'])) {
            $ctrlname = "Controller\\" . ucfirst($get['ctrl']) . "Controller";
            // $ctrlname = "Controller\UserController
        }

        $ctrl = new $ctrlname();
        // $ctrl = new UserController();

        if (isset($get['method']) && method_exists($ctrl, $get['method'])) {
            $method = $get['method'];
        }

        return $ctrl->$method();
        // $ctrl->login();
    }

    // méthode de redirection
    public static function redirectTo($ctrl = null, $method = null)
    {

        header("Location:?ctrl=" . $ctrl . "&method=" . $method);
        die();
    }

    // CSRF protection
    public static function CSRFProtection($token)
    {
        if (!empty($_POST)) {
            if (isset($_POST['token'])) {
                $form_crsf = $_POST['token'];
                if (hash_equals($form_crsf, $token)) {
                    return true;
                }
                return false;
            }
            return false;
        }
        return true;
    }
}
