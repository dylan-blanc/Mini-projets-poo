<?php
/**
 * 🎸 PROJET 05 : LE POLYMORPHISME
 * Concept : Polymorphisme (même méthode, comportements différents)
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer la classe parent Instrument
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Instrument' avec :
// - Propriété protected $nom
// - Constructeur
// - Méthode jouer() : "🎵 [nom] joue de la musique..."

class Instrument {
    protected $nom;
    protected $orchestre;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function jouer() {
        echo $this->nom . " joue de la musique... <br>";
    }

    public function accorder() {
        echo $this->nom . " est accordé ! <br>";
    }
}



// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Créer la classe Guitare (redéfinir jouer)
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Guitare' qui hérite de Instrument :
// - REDÉFINIS la méthode jouer() :
//   "🎸 [nom] : GLING GLING GLING ♪"
//
// Indice : On réécrit la même méthode dans l'enfant

class Guitare extends Instrument {
    public function accorder()
    {
        echo $this->nom . " est accordée ! <br>";
    }
    public function jouer() {
        echo $this->nom . " : GLING GLING GLING ♪ <br>";
    }
}




// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Créer les classes Piano et Batterie
// ─────────────────────────────────────────────────────────────────────────
//
// Piano :
// - Redéfinir jouer() : "🎹 [nom] : PLONK PLONK PLONK ♫"
//
// Batterie :
// - Redéfinir jouer() : "🥁 [nom] : BOOM BOOM CRASH ♪♫"

class Piano extends Instrument {
    public function accorder()
    {
        echo $this->nom . " est accordée ! <br>";
    }
    public function jouer() {
        echo $this->nom . " : PLONK PLONK PLONK ♫ <br>";
    }
}


class Batterie extends Instrument {
    public function accorder()
    {
        echo $this->nom . " est accordée ! <br>";
    }
    public function jouer() {
        echo $this->nom . " : BOOM BOOM CRASH ♪♫ <br>";
    }
}

class Violon extends Instrument {
    public function accorder()
    {
        echo $this->nom . " est accordée ! <br>";
    }
    public function jouer() {
        echo $this->nom . " : TRIN TRIN TRIN ♫♫ <br>";
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Créer un orchestre et tester
// ─────────────────────────────────────────────────────────────────────────
//
// Crée un tableau $orchestre avec :
// - Une guitare "Fender"
// - Un piano "Yamaha"
// - Une batterie "Pearl"
//
// Fais une boucle qui fait jouer tous les instruments
//
// Indice :
// foreach ($orchestre as $instrument) {
//     $instrument->jouer();
// }

$orchestre = [
    new Guitare("Fender"),
    new Piano("Yamaha"),
    new Batterie("Pearl"),
    new Violon("Stradivarius")
];

foreach ($orchestre as $instrument) {
    $instrument->accorder();
    $instrument->jouer();
}



// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 05
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ Le polymorphisme : redéfinir une méthode dans chaque enfant
// ✅ Traiter différents objets de la même manière dans une boucle
// ✅ Override (redéfinition) des méthodes parentes
//
// 🎯 Prochaine étape : Projet 06 - Classes Abstraites (forcer l'implémentation)
//
?>
