<?php

namespace Model\Manager;

use App\AbstractManager;
// importation de AbstractManager grâce au namespace

// UserManager va hériter de toutes les méthodes publiques et protégées, 
// propriétés et constantes de la classe parente. 
// Temps qu'une classe n'écrase pas ces méthodes, elles conservent leur fonctionnalité d'origine.

class UserManager extends AbstractManager
{
  private static $classname = "Model\Entity\User";
  //fully qualified classname

  public function __construct()
  {
    self::connect(self::$classname);
  }

  public function findOneById($id)
  {
    $sql = "SELECT * FROM user
    WHERE id_user = :id";

    return self::getOneOrNullResult(
      self::select(
        $sql,
        ["id" => $id],
        false
      ),
      self::$classname
    );
  }

  public function findOneByEmail($email)
  {
    $sql = "SELECT * FROM user
    WHERE email = :email";

    return self::getOneOrNullResult(
      self::select(
        $sql,
        ["email" => $email],
        false
      ),
      self::$classname
    );
  }

  public function addUser($userName, $email, $hash)
  {
    $sql = "INSERT INTO user (pseudonym, password, email)
    VALUES (:username, :password, :email)";

    return self::create(
      $sql,
      [
        "username" => $userName,
        "email" => $email,
        "password" => $hash
      ]
    );
  }

  public function findOneByPseudo($username)
  {
    $sql = "SELECT * 
    FROM user
    WHERE pseudonym = :pseudonym";

    return self::getOneOrNullResult(
      self::select(
        $sql,
        ["pseudonym" => $username],
        false
      ),
      self::$classname
    );
  }

  public function findAll()
  {
    $sql = "SELECT * FROM user";

    return self::getResults(
      self::select($sql, null, true),
      self::$classname
    );
  }
}
