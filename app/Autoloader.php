<?php

namespace App;

abstract class Autoloader
{
	// explication de la classe Autoloader en bas du fichier * 1

	public static function register()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
		// spl_autoload_register — Enregistre une fonction en tant qu'implémentation de __autoload()

	}

	public static function autoload($class)
	{

		//$class = Model\Managers\VehiculeManager (FullyQualifiedClassName)
		//namespace = Model\Managers, nom de la classe = VehiculeManager

		// on explose notre variable $class par \
		$parts = preg_split('#\\\#', $class);
		//$parts = ['Model', 'Managers', 'VehiculeManager']

		// on extrait le dernier element 
		$className = array_pop($parts);
		//$className = VehiculeManager

		// on créé le chemin vers la classe
		// on utilise DS car plus propre et meilleure portabilité entre les différents systèmes (windows/linux) 

		//avant : ['Model', 'Managers']
		//après implode : "model\managers"
		$path = strtolower(implode(DS, $parts));

		$file = $className . '.php';
		//$file = VehiculeManager.php

		$filepath = ROOT_DIR . $path . DS . $file;
		//$filepath = ./model/managers/VehiculeManager.php
		if (file_exists($filepath)) {
			require $filepath;
		}
	}
}
// * 1 
// De nombreux développeurs qui écrivent des applications orientées objet 
// créent un fichier source par définition de classe. 
// Un des plus gros inconvénients de cette méthode est 
// d'avoir à écrire une longue liste d'inclusions de fichier de classes 
// au début de chaque script : une inclusion par classe.

// La fonction spl_autoload_register() enregistre un nombre quelconque de chargeurs automatiques, 
// ce qui permet aux classes et aux interfaces d'être automatiquement chargées 
// si elles ne sont pas définies actuellement. 
// En enregistrant des autochargeurs, PHP donne une dernière chance 
// d'inclure une définition de classe ou interface, avant que PHP n'échoue avec une erreur. 
