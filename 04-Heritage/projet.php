<?php
/**
 * 🐕 PROJET 04 : L'HÉRITAGE
 * Concept : Héritage (extends) - réutiliser du code
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer la classe PARENT Animal
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Animal' avec :
// - Propriété PROTECTED $nom  (protected = accessible dans les enfants)
// - Constructeur qui initialise $nom
// - Méthode manger() : "🍖 [nom] mange..."
// - Méthode dormir() : "😴 [nom] dort... Zzz"
//
// Indice : protected permet aux classes enfants d'accéder à la propriété

class Animal {
    protected $nom;
    protected $age;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function manger() {
        echo $this->nom . " mange... <br>";
    }

    public function dormir() {
        echo $this->nom . " dort... <br>";
    }

    public function sePresenter() {
        echo "Je m'appelle " . $this->nom . " et j'ai " . $this->age . " ans. <br>";
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Créer la classe ENFANT Chien
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Chien' qui HÉRITE de Animal :
// - Utilise le mot-clé 'extends'
// - Ajoute une méthode aboyer() : "🐕 [nom] : WOOF WOOF !"
//
// Le Chien hérite automatiquement de manger() et dormir() !
//
// Indice : class Chien extends Animal { ... }

class chien extends Animal {
    protected $age = 4;
    public function aboyer() {
        echo $this->nom . " : waff waff ! <br>";
    }
}




// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Créer la classe ENFANT Chat
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Chat' qui hérite de Animal :
// - Ajoute une méthode miauler() : "🐈 [nom] : MIAOU !"

class chat extends Animal {
    protected $age = 1;
    public function miaule() {
        echo $this->nom . " : nya nya ! <br>";
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Créer la classe ENFANT Oiseau
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Oiseau' qui hérite de Animal :
// - Ajoute une méthode voler() : "🦅 [nom] vole dans le ciel !"

class oiseau extends Animal {
    protected $age = 6;
    public function voler() {
        echo $this->nom . " vole dans le ciel ! <br>";
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 5 : Créer et tester des animaux
// ─────────────────────────────────────────────────────────────────────────
//
// Crée :
// - Un chien nommé "Rex"
// - Un chat nommé "Minou"
// - Un oiseau nommé "Tweety"
//
// Pour chacun, teste :
// - Les méthodes héritées (manger, dormir)
// - Les méthodes spécifiques (aboyer, miauler, voler)

$chien = new chien ("Rex");
$chien->sePresenter();
$chien->manger();
$chien->dormir();
$chien->aboyer();
echo "<br>";
$chat = new chat ("Minou");
$chat->sePresenter();
$chat->manger();
$chat->dormir();
$chat->miaule();
echo "<br>";
$oiseau = new oiseau ("Tweety");
$oiseau->sePresenter();
$oiseau->manger();
$oiseau->dormir();
$oiseau->voler();


// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 04
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ L'héritage avec extends pour réutiliser du code
// ✅ Les classes enfants héritent de toutes les méthodes du parent
// ✅ Le mot-clé protected pour partager avec les enfants
//
// 🎯 Prochaine étape : Projet 05 - Le Polymorphisme (même méthode, comportements différents)
//
?>
