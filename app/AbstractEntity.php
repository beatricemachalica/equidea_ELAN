<?php

namespace App;
// Les espaces de noms, dans leur définition la plus large, représentent un moyen d'encapsuler des éléments. 

// Les classes définies comme abstraites ne peuvent pas être instanciées.
abstract class AbstractEntity
{
    // création d'un hydratateur récursif
    // la clé étrangère récupère un objet, on accède à ses données avec son entité
    protected static function hydrate($data, $object)
    {
        // Le fait de déclarer des propriétés ou des méthodes comme statiques 
        // vous permet d'y accéder sans avoir besoin d'instancier la classe.
        // (ce qui colle bien avec une classe abstraite)

        // la fonction hydrate permet d'injecter les data dans un objet instancié
        // comme un nouveau objet User "Terence" de la classe User.php (dans model, entity)

        foreach ($data as $field => $value) {
            $fieldArray = explode("_", $field);
            // On explode la data au niveau du separator _ et uniquement à ce niveau là, 
            // exemple dans le cas d'une clé étrangère : user_id => ["user", "id"]
            // exemple du fonctionnement d'explode * 1

            $field = $fieldArray[0]; //devient user

            // ["user", "id"] => $fieldArray[0] = "user" // $fieldArray[0] = "id"
            if (isset($fieldArray[1]) && $fieldArray[1] == "id") {
                $classname = ucfirst($fieldArray[0]) . "Manager";
                $FQCName = "Model\Manager" . DS . $classname;
                // résultat : Model\Manager\UserManager

                $manager = new $FQCName();

                $value = $manager->findOneById($value); //devient un objet et va injecter la valeur
            }

            // On va lier les objets aux setters de la classe
            // setUser() etc. on va set un objet
            $method = "set" . ucfirst($field);
            if (method_exists($object, $method)) {
                $object->$method($value);
            }
        }
    }
}

// * 1 : 
// Exemple 1
// $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
// $pieces = explode(" ", $pizza);
// echo $pieces[0]; // piece1
// echo $pieces[1]; // piece2

// Exemple 2
// $data = "foo:*:1023:1000::/home/foo:/bin/sh";
// list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
// echo $user; // foo
// echo $pass; // *