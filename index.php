<?php

namespace App;
// Les espaces de noms, représentent un moyen d'encapsuler des éléments.

require_once "app/Autoloader.php";
Autoloader::register();
// On utilise la méthode register de la class Autoloader
// ce qui permet aux classes et aux interfaces d'être automatiquement chargées

use App\Router;
// importation du Router grâce au namespace

// define : Définit une constante à l'exécution. 
// Ici pour faire les chemins vers les fichiers nécessaires.
// define('nom de la constante', valeur)
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', '.' . DS);
define('PUBLIC_PATH', ROOT_DIR . 'public' . DS);
define('CSS_PATH', PUBLIC_PATH . 'css' . DS);
define('VIEW_PATH', ROOT_DIR . 'view' . DS);
define('IMG_PATH', PUBLIC_PATH . 'img' . DS);
define('CTRL_PATH', ROOT_DIR . 'controller' . DS);
define('SERVICE_PATH', ROOT_DIR . 'app' . DS);
define('MODEL_PATH', ROOT_DIR . 'model' . DS);


$result = Router::handleRequest($_GET);
ob_start();

if (is_array($result) && array_key_exists('view', $result)) {
  $data = isset($result['data']) ? $result['data'] : null;
  include VIEW_PATH . $result['view'];
} else include VIEW_PATH . "404.html";

$page = ob_get_contents();
ob_end_clean();

include VIEW_PATH . "layout.php";
