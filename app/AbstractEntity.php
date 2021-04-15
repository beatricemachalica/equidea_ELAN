<?php

namespace App;
// Les espaces de noms, dans leur définition la plus large, représentent un moyen d'encapsuler des éléments. 

// Les classes définies comme abstraites ne peuvent pas être instanciées.
abstract class AbstractEntity
{

    protected static function hydrate($data, $object)
    {
        // Le fait de déclarer des propriétés ou des méthodes comme statiques 
        // vous permet d'y accéder sans avoir besoin d'instancier la classe.
        // (ce qui colle bien avec une classe abstraite)

        // la fonction hydrate permet d'injecter les data dans un objet instancié
        // comme un nouveau objet User "Terence" de la classe User.php (dans model, entity)

        foreach ($data as $field => $value) {
            $fieldArray = explode("_", $field); // ['grade', 'id']
            // explode() retourne un tableau de chaînes de caractères, 
            // chacune d'elle étant une sous-chaîne du paramètre string 
            // extraite en utilisant le séparateur separator. exemples * 1

            if (isset($fieldArray[1]) && $fieldArray[1] === "id") {
                $classname = "Model\\" . ucfirst($fieldArray[0]) . "Manager";
                $manager = new $classname;
                $field = $fieldArray[0]; //devient grade
                $value = $manager->findOneById($value); //devient un objet Grade
            }

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