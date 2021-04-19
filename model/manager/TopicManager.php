<?php

namespace Model\Manager;

use App\AbstractManager;

// Le Manager va hériter de toutes les méthodes publiques et protégées, 
// propriétés et constantes de la classe parente. 
// Temps qu'une classe n'écrase pas ces méthodes, elles conservent leur fonctionnalité d'origine.

class TopicManager extends AbstractManager
{
  private static $classname = "Model\Entity\Topic";
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

  public function findOneById($id)
  {
    $sql = "SELECT * 
    FROM topic 
    WHERE id_topic = :id";

    return self::getOneOrNullResult(
      self::select(
        $sql,
        ["id" => $id],
        false
      ),
      self::$classname
    );
  }

  public function findTopicsByCategory($id)
  {
    $sql = "SELECT t.id_topic, t.title, t.dateCreation, t.user_id, u.pseudonym
    FROM topic t
    INNER JOIN user u
    ON u.id_user = t.user_id
    WHERE t.theme_id = :id";

    return self::getResults(
      self::select(
        $sql,
        ["id" => $id],
        true
      ),
      self::$classname
    );
  }

  // code à finir
  public function addOneTopic()
  {
    $sql = "INSERT INTO ...";
    return self::update($sql, null);
  }
}
