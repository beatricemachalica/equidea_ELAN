<?php

namespace Model\Manager;

use App\AbstractManager;

// Le Manager va hériter de toutes les méthodes publiques et protégées, 
// propriétés et constantes de la classe parente. 
// Temps qu'une classe n'écrase pas ces méthodes, elles conservent leur fonctionnalité d'origine.

class ThemeManager extends AbstractManager
{
  private static $classname = "Model\Entity\Theme";
  //fully qualified classname

  public function __construct()
  {
    self::connect(self::$classname);
  }

  // fonction qui permet de trouver tous les themes 
  public function findAll()
  {
    $sql = "SELECT * FROM theme";

    return self::getResults(
      self::select($sql, null, true),
      self::$classname
    );
  }

  public function findOneById($id)
  {
    $sql = "SELECT * 
    FROM theme 
    WHERE id_theme = :id";

    return self::getOneOrNullResult(
      self::select(
        $sql,
        ["id" => $id],
        false
      ),
      self::$classname
    );
  }
}
