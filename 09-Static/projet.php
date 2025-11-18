<?php

/**
 * 📊 PROJET 09 : STATIC & SELF
 * Concept : Propriétés et méthodes statiques (partagées)
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer la classe Utilisateur avec propriété statique
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Utilisateur' avec :
// - Propriété STATIC private $compteur = 0
// - Propriétés normales : private $nom, $id
// - Constructeur qui :
//   1. Incrémente self::$compteur
//   2. Assigne self::$compteur à $this->id
//   3. Assigne le $nom
//   4. Affiche "✅ Utilisateur #[id] créé : [nom]"
//
// Indice :
// private static $compteur = 0;
// self::$compteur++;

class Utilisateur
{
    private static $compteur = 0;
    private static $utilisateurs = [];
    private $nom;
    private $id;

    public function __construct($nom)
    {
        self::$compteur++;
        $this->id = self::$compteur;
        $this->nom = $nom;
        self::$utilisateurs[] = $this; // Ajout de l'utilisateur au tableau statique
        echo " Utilisateur #" . $this->id . " créé : " . $this->nom . " <br>";
    }


    public static function resetCompteur()
    {
        self::$compteur = 0;
        self::$utilisateurs = [];
    }

    public static function affichertous()
    {
        foreach (self::$utilisateurs as $utilisateur) {
            echo "👤 User #" . $utilisateur->id . " : " . $utilisateur->nom . " <br>";
        }
    }





    // ─────────────────────────────────────────────────────────────────────────
    // TODO 2 : Ajouter une méthode statique
    // ─────────────────────────────────────────────────────────────────────────
    //
    // Ajoute une méthode STATIQUE getNombreUtilisateurs() qui :
    // - Retourne self::$compteur
    //
    // Indice :
    // public static function getNombreUtilisateurs() {
    //     return self::$compteur;
    // }

    public static function getNombreUtilisateurs()
    {
        return self::$compteur;
    }



    // ─────────────────────────────────────────────────────────────────────────
    // TODO 3 : Ajouter une méthode normale
    // ─────────────────────────────────────────────────────────────────────────
    //
    // Ajoute une méthode afficher() qui affiche :
    // "👤 User #[id] : [nom]"

    public function afficher()
    {
        echo "👤 User #" . $this->id . " : " . $this->nom . " <br>";
    }
}

// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Créer et tester des utilisateurs
// ─────────────────────────────────────────────────────────────────────────
//
// 1. Affiche le nombre d'utilisateurs AVANT création
//    (Utilisateur::getNombreUtilisateurs())
//
// 2. Crée 3 utilisateurs : "Jean", "Marie", "Paul"
//
// 3. Affiche le nombre total APRÈS création
//
// 4. Affiche les infos de chaque utilisateur
//
// Indice : Méthode statique → Classe::methode()

echo "Nombre d'utilisateurs : " . Utilisateur::getNombreUtilisateurs() . "<br>";

$user1 = new Utilisateur("Jean");
$user2 = new Utilisateur("Marie");
$user3 = new Utilisateur("Paul");

echo "Nombre d'utilisateurs : " . Utilisateur::getNombreUtilisateurs() . "<br>";

$user1->afficher();
$user2->afficher();
$user3->afficher();
echo "<br>";
echo Utilisateur::affichertous();


// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 09
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ Les propriétés et méthodes statiques partagées par tous les objets
// ✅ self:: pour accéder aux membres statiques
// ✅ Classe::methode() pour appeler sans instancier d'objet
//
// 🎯 Prochaine étape : Projet 10 - Namespaces (organisation du code)
//
