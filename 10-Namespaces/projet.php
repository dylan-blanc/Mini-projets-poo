<?php

/*
* **** C'est pas clair, a voir avec un vrai namespace pour mieux comprnedre le fonctionnement ****
*/


/**
 * 📁 PROJET 10 : NAMESPACES
 * Concept : Namespaces (organisation et éviter les conflits)
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer une classe User dans un namespace
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe User dans le namespace 'MonApp\Models' :
//
// namespace MonApp\Models;
//
// class User {
//     private $nom;
//     public function __construct($nom) { ... }
//     public function afficher() { echo "👤 Modèle User : [nom]"; }
// }
//
// NOTE : En pratique, chaque namespace serait dans un fichier séparé.
// Ici, on fait tout dans un fichier pour simplifier.

namespace MonApp\Models {
    class User
    {
        private $nom;
        public function __construct($nom)
        {
            $this->nom = $nom;
        }
        public function afficher()
        {
            echo " Modèle User : {$this->nom}";
        }
    }
}

// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Créer une classe UserController dans un autre namespace
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe UserController dans 'MonApp\Controllers' :
//
// namespace MonApp\Controllers;
//
// class UserController {
//     public function index() { echo "📋 Liste des utilisateurs"; }
// }

namespace MonApp\Controllers {
    class UserController
    {
        private $users;
        public function __construct($users = [])
        {
            $this->users = $users;
        }
        public function index()
        {
            echo "📋 Liste des utilisateurs :<br>";
            foreach ($this->users as $user) {
                $user->afficher();
                echo "<br>";
            }
        }
    }
}

// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Utiliser les classes avec leur chemin complet
// ─────────────────────────────────────────────────────────────────────────
//
// IMPORTANT : Pour revenir au namespace global, utilisez :
// namespace {
//     // Code ici
// }
//
// Crée un objet User avec le chemin complet :
// $user = new \MonApp\Models\User("Jean");
//
// Crée un objet UserController :
// $controller = new \MonApp\Controllers\UserController();
//
// Teste les méthodes.

namespace {
    $user = new \MonApp\Models\User("Jean");
    $user->afficher(); // Affiche :  Modèle User : Jean

    echo "<br>";

    $controller = new \MonApp\Controllers\UserController();
    $controller->index(); // Affiche :  Liste des utilisateurs

    echo "<br>";
}

// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Utiliser 'use' pour simplifier
// ─────────────────────────────────────────────────────────────────────────
//
// Au lieu d'écrire le chemin complet à chaque fois,
// utilisez 'use' :
//
// use MonApp\Models\User;
// use MonApp\Controllers\UserController;
//
// Puis crée les objets simplement :
// $user2 = new User("Marie");
// $controller2 = new UserController();

namespace {

    use MonApp\Models\User;
    use MonApp\Controllers\UserController;

    $user2 = new User("Marie");
    $user2->afficher();

    echo "<br>";

    $user3 = new User("Paul");
    $controller2 = new UserController([$user2, $user3]);
    $controller2->index();
    echo "<br>";
}




// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 10
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ Les namespaces pour organiser le code en dossiers logiques
// ✅ Éviter les conflits de noms entre classes
// ✅ Utiliser 'use' pour simplifier les imports
//
// 🎯 Prochaine étape : Projet 11 - Autoload (chargement automatique)
//



