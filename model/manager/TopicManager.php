<?php

namespace Model\Manager;

use App\AbstractManager;

// UserManager va hériter de toutes les méthodes publiques et protégées, 
// propriétés et constantes de la classe parente. 
// Temps qu'une classe n'écrase pas ces méthodes, elles conservent leur fonctionnalité d'origine.

// rajouter une listes des topics

class TopicManager extends AbstractManager
{
  private static $classname = "Model\Entity\User";
  //fully qualified classname

  public function __construct()
  {
    self::connect(self::$classname);
  }

  // public function findOneById(){}

  public function findAll()
  {
    $sql = "SELECT * FROM topic";

    return self::getResults(
      self::select($sql, null, true),
      self::$classname
    );
  }
}
