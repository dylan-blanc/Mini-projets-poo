<?php

/**
 * 📐 PROJET 06 : CLASSES ABSTRAITES
 * Concept : Classes abstraites (forcer l'implémentation)
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer la classe ABSTRAITE Forme
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe ABSTRAITE 'Forme' avec :
// - Mot-clé 'abstract' devant 'class'
// - Propriété protected $nom
// - Constructeur
// - Méthode ABSTRAITE calculerAire() (pas de code, juste la signature)
// - Méthode NORMALE afficher() qui affiche nom et aire
//
// Indice :
// abstract class Forme { ... }
// abstract public function calculerAire();

abstract class Forme
{
    protected $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    abstract public function calculerAire();

    abstract public function calculerPerimetre();

    public function afficher()
    {
        echo "La forme " . $this->nom . " a une aire de " . $this->calculerAire() . " et un périmètre de " . $this->calculerPerimetre() . " <br>";
    }
}




// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Créer la classe Cercle
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Cercle' qui hérite de Forme :
// - Propriété private $rayon
// - Constructeur qui appelle parent::__construct("Cercle") et stocke $rayon
// - IMPLÉMENTER calculerAire() : return pi() * $rayon * $rayon;
//
// Indice : Tu DOIS implémenter calculerAire(), sinon erreur !

class Cercle extends Forme
{
    private $rayon;

    public function __construct($rayon)
    {
        parent::__construct("Cercle");
        $this->rayon = $rayon;
    }

    public function calculerAire()
    {
        return pi() * $this->rayon * $this->rayon;
    }

    public function calculerPerimetre()
    {
        return 2 * pi() * $this->rayon;
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Créer la classe Rectangle
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Rectangle' qui hérite de Forme :
// - Propriétés private $largeur, $hauteur
// - Constructeur
// - Implémenter calculerAire() : return $largeur * $hauteur;

class rectangele extends Forme
{
    private $largeur;
    private $hauteur;

    public function __construct($largeur, $hauteur)
    {
        parent::__construct("Rectangle");
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
    }

    public function calculerAire()
    {
        return $this->largeur * $this->hauteur;
    }

    public function calculerPerimetre()
    {
        return 2 * ($this->largeur + $this->hauteur);
    }
}

class Triangle extends Forme
{
    private $base;
    private $hauteur;

    public function __construct($base, $hauteur)
    {
        parent::__construct("Triangle");
        $this->base = $base;
        $this->hauteur = $hauteur;
    }

    public function calculerAire()
    {
        return $this->base * $this->hauteur / 2;
    }

    public function calculerPerimetre()
    {
        return $this->base + 2 * sqrt( ($this->base / 2) ** 2 + $this->hauteur ** 2 );
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Créer et tester des formes
// ─────────────────────────────────────────────────────────────────────────
//
// Crée :
// - Un cercle de rayon 5
// - Un rectangle de 10 × 20
//
// Affiche l'aire de chacun avec afficher()
//
// Essaie de créer une Forme directement :
// $forme = new Forme("Test");  ← Ça va planter ! C'est normal.

$cercle = new Cercle(5);
$cercle->afficher();

$rectangle = new rectangele(10, 20);
$rectangle->afficher();

$triangle = new Triangle(10, 15);
$triangle->afficher();


// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 06
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ Les classes abstraites qui ne peuvent pas être instanciées
// ✅ Forcer les enfants à implémenter certaines méthodes
// ✅ Garantir une structure commune à toutes les classes enfants
//
// 🎯 Prochaine étape : Projet 07 - Interfaces (contrat 100% strict)
//
