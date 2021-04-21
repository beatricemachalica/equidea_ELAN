<?php

namespace App;
// Les espaces de noms, dans leur définition la plus large, représentent un moyen d'encapsuler des éléments. 

// une classe abstraite est une classe dont l'implémentation n'est pas complète et qui n'est pas instanciable.
// DAO permet de se connecter à la BDD
abstract class DAO
{
    const DB_HOST = "localhost";
    const DB_NAME = "equidea";
    const DB_USER = "root";
    const DB_PASS = "";

    public static function getConnection()
    {

        //connexion à la BDD
        // si une problème avec UTF8 il faut rajouter après DB_NAME: .';charset=utf8'
        try {
            $pdo = new \PDO(
                'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME,
                self::DB_USER,
                self::DB_PASS,
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ]
            );
            return $pdo;
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
            // en cas d'erreur catch permet "d'attraper" l'erreur renvoyé
        }
    }
}
