<?php

namespace App;
// Les espaces de noms, dans leur définition la plus large, représentent un moyen d'encapsuler des éléments. 

// Les classes définies comme abstraites ne peuvent pas être instanciées.
abstract class AbstractManager
{
    private static $connection;

    // On peut accéder aux méthodes static sans avoir besoin d'instancier la classe.

    // Les méthodes ci-dessous seront utiles aux classes "Manager" (dans model, manager) 
    // comme UserManager.php par exemple pour afficher une liste des utilisateurs.
    // Ces méthodes statiques ont pour rôle d'intéragir avec la bdd.

    // méthode pour se connecter à l'aide de DAO
    protected static function connect()
    {
        self::$connection = DAO::getConnection();
    }

    protected static function getOneOrNullResult($row, $class)
    {

        if ($row != null) {
            return new $class($row);
        }
        return null;
    }
    protected static function getOneOrNullResultInt($row)
    {

        if ($row != null) {
            return $row;
        }
        return null;
    }

    protected static function getResults($rows, $class)
    {

        $results = [];

        if ($rows != null) {
            foreach ($rows as $row) {
                $results[] = new $class($row);
            }
        }
        return $results;
    }

    protected static function select($sql, $params = null, $multiple = true)
    {
        $stmt = self::$connection->prepare($sql);
        $stmt->execute($params);

        if ($multiple) {
            return $stmt->fetchAll();
        }
        return $stmt->fetch();
    }

    protected static function create($sql, $params)
    {
        $stmt = self::$connection->prepare($sql);

        return $stmt->execute($params);
    }

    protected static function update($sql, $params)
    {
        $stmt = self::$connection->prepare($sql);

        return $stmt->execute($params);
    }

    protected static function delete($sql, $params)
    {
        $stmt = self::$connection->prepare($sql);

        return $stmt->execute($params);
    }
}
