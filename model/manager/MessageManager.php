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
  public function findFirstPostByTopic($topicId)
  {
    $sql = "SELECT * 
    FROM messages
    WHERE topic_id = :id
    ORDER BY dateCreation ASC
    LIMIT 1";

    return self::getOneOrNullResult(
      self::select(
        $sql,
        ["id" => $topicId],
        false
      ),
      self::$classname
    );
  }

  public function editMessage($messageId, $newMessage)
  {
    $sql = "UPDATE messages
    SET text = :text
    WHERE id_message = :id";
    return self::update(
      $sql,
      [
        "id" => $messageId,
        "text" => $newMessage
      ]
    );
  }

  public function addMessageForTopic($text, $idTopic, $idUser)
  {
    $sql = "INSERT INTO messages (text, topic_id, user_id)
    VALUES (:text, :idTopic, :idUser)";

    return self::create(
      $sql,
      [
        "text" => $text,
        "idTopic" => $idTopic,
        "idUser" => $idUser
      ]
    );
  }
  public function deleteMessagesByTopic($topicId)
  {
    $sql = "DELETE FROM messages
    WHERE topic_id = :id";
    return self::delete($sql, ["id" => $topicId]);
  }
}
