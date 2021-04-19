<?php

namespace Model\Manager;

use App\AbstractManager;

// Le Manager va hériter de toutes les méthodes publiques et protégées, 
// propriétés et constantes de la classe parente. 
// Temps qu'une classe n'écrase pas ces méthodes, elles conservent leur fonctionnalité d'origine.

class MessageManager extends AbstractManager
{
  private static $classname = "Model\Entity\Message";
  //fully qualified classname

  public function __construct()
  {
    self::connect(self::$classname);
  }

  public function findAll()
  {
    $sql = "SELECT * FROM messages";

    return self::getResults(
      self::select($sql, null, true),
      self::$classname
    );
  }

  public function findMessagesByTopic($id)
  {
    $sql = "SELECT * FROM messages
    WHERE topic_id = :id
    ORDER BY dateCreation DESC";

    return self::getResults(
      self::select(
        $sql,
        ["id" => $id],
        true
      ),
      self::$classname
    );
  }
}
