# Projet de création d'un site avec ELAN :

## Création d'un forum à l'aide de PHP 7, MySQL et Bootstrap

Exercice de templating et de design pattern. Utilisation de l'architecture MVC (model / view / controller).

Nous avons relié les différentes vues, controleurs, modèles ainsi que la BDD.

Il est possible de consulter les consignes du projet en format PDF dans le dossier "PDF" dans le dossier "Public".

Réalisation d'un mock-up à l'aide d'AbodeXD (également en format PDF dans le dossier PDF dans le dossier public) : premier mock-up dont le design risque d'évoluer en fonction des fonctionnalités.

### Fonctionnalités :

- liste des utilisateurs du forum ;
- liste des grands thèmes du forum ;
- liste des sujets par thème, ainsi que la date de création et l'auteur du sujet ;
- inscription d'un nouveau utilisateur ;
- connexion à un compte et déconnexion ;
- ajout des messages dans les sujets (topics) ;
- ajout topic et modification ;
- suppression d'un topic et de ses messages

### Pistes d'amélioration :

- suppression et modification du compte et des informations de l'utilisateur ;
- affichage des messages d'erreurs en cas de besoin ;
- accès administrateur ;
- animation et amélioration du design ;

### Sécurité :

Requetes SQL préparées et filtration des inputs :

- protection contre les injections SQL ;
- protection contre les failles XSS ;
- protection contre la faille CSRF (à l'aide d'un token) ;

Formateurs : Stéphane SMAIL et Gilles MUESS.
