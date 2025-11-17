<?php

/**
 * 💳 PROJET 07 : INTERFACES
 * Concept : Interfaces (contrat 100% strict, 0% de code)
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer l'interface PaymentInterface
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une INTERFACE 'PaymentInterface' avec :
// - Méthode payer($montant) (juste la signature)
// - Méthode rembourser($montant) (juste la signature)
//
// Indice :
// interface PaymentInterface {
//     public function payer($montant);
//     public function rembourser($montant);
// }

interface PaymentInterface
{
    public function payer($montant);
    public function rembourser($montant);
    public function verifierSolde();
}



// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Créer la classe CarteBancaire
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'CarteBancaire' qui IMPLÉMENTE PaymentInterface :
// - Mot-clé 'implements'
// - Propriété private $numero
// - Constructeur
// - Implémenter payer() : "💳 Paiement de X€ par carte ****[4 derniers chiffres]"
// - Implémenter rembourser() : "💳 Remboursement de X€ sur la carte"

class CarteBancaire implements PaymentInterface
{
    private $numero;
    private $solde;

    public function __construct($numero)
    {
        $this->numero = $numero;
        $this->solde = 0;
    }

    public function payer($montant)
    {
        if ($this->solde >= $montant) {
            $this->solde -= $montant;
            $last4 = substr($this->numero, -4);
            echo "💳 Paiement de " . $montant . "€ par carte ****" . $last4 . " <br>";
            return true;
        }
        return false;
    }

    public function rembourser($montant)
    {
        echo "💳 Remboursement de " . $montant . "€ sur la carte <br>";
    }

    public function verifierSolde()
    {
        echo "Solde de la carte : " . $this->solde . "€ <br>";
    }

    public function setSolde($montant)
    {
        $this->solde = $montant;
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Créer les classes PayPal et Crypto
// ─────────────────────────────────────────────────────────────────────────
//
// PayPal (implémente PaymentInterface) :
// - Propriété private $email
// - payer() : "🅿️  Paiement PayPal de X€ via [email]"
// - rembourser() : "🅿️  Remboursement PayPal de X€"
//
// Crypto (implémente PaymentInterface) :
// - Propriété private $wallet
// - payer() : "₿ Paiement crypto de X€ depuis wallet [8 premiers caractères]..."
// - rembourser() : "₿ Remboursement crypto de X€"

class Paypal implements PaymentInterface
{
    private $email;
    private $solde;

    public function __construct($email)
    {
        $this->email = $email;
        $this->solde = 0;
    }

    public function payer($montant)
    {
        if ($this->solde >= $montant) {
            $this->solde -= $montant;
            echo "🅿️  Paiement PayPal de " . $montant . "€ via " . $this->email . " <br>";
            return true;
        }
        return false;
    }

    public function rembourser($montant)
    {
        echo " Remboursement PayPal de " . $montant . "€ <br>";
    }

    public function verifierSolde()
    {
        echo "Solde PayPal : " . $this->solde . "€ <br>";
    }

    public function setSolde($montant)
    {
        $this->solde = $montant;
    }
}

class Crypto implements PaymentInterface
{
    private $wallet;
    private $solde;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->solde = 0;
    }

    public function payer($montant)
    {
        if ($this->solde >= $montant) {
            $this->solde -= $montant;
        $first8 = substr($this->wallet, 0, 8);
        echo " Paiement crypto de " . $montant . "€ depuis wallet " . $first8 . "... <br>";
        return true;
        }
        return false;
    }

    public function rembourser($montant)
    {
        echo " Remboursement crypto de " . $montant . "€ <br>";
    }

    public function verifierSolde()
    {
        echo "Solde crypto : " . $this->solde . "€ <br>";
    }

    public function setSolde($montant)
    {
        $this->solde = $montant;
    }
}



// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Créer une fonction qui accepte N'IMPORTE QUEL paiement
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une fonction traiterPaiement() qui :
// - Prend en paramètre PaymentInterface $methode et $montant
// - Affiche "🛒 COMMANDE : X€"
// - Appelle $methode->payer($montant)
// - Affiche "✅ Paiement validé !"
//
// Indice :
// function traiterPaiement(PaymentInterface $methode, $montant) { ... }

function traiterPaiement(PaymentInterface $methode, $montant)
{
    echo "🛒 COMMANDE : " . $montant . "€ <br>";
    if ($montant > 1000) {
        echo "❌ Paiement refusé : montant trop élevé ! <br>";
        return;
    }
    if ($methode->payer($montant)) {
        echo "✅ Paiement validé ! <br>";
    } else {
        echo "❌ Paiement refusé : solde insuffisant ! <br>";
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 5 : Tester avec les 3 méthodes de paiement
// ─────────────────────────────────────────────────────────────────────────
//
// Crée :
// - Une carte bancaire "1234567812345678"
// - Un PayPal "jean@email.com"
// - Un wallet crypto "1A2B3C4D5E6F7G8H9I"
//
// Appelle traiterPaiement() avec chacun



$carte = new CarteBancaire("1234567812345678");
$paypal = new Paypal("jean@email.com");
$crypto = new Crypto("1A2B3C4D5E6F7G8H9I");

// Ajout du solde pour les tests
$carte->setSolde(1000);
$paypal->setSolde(500);
$crypto->setSolde(2000);


$carte->verifierSolde();
$paypal->verifierSolde();
$crypto->verifierSolde();

traiterPaiement($carte, 500);
traiterPaiement($paypal, 200);
traiterPaiement($crypto, 1500);

$carte ->verifierSolde();
$paypal ->verifierSolde();
$crypto ->verifierSolde();


// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 07
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ Les interfaces : contrat pur sans code (100% abstrait)
// ✅ Le mot-clé implements pour respecter un contrat
// ✅ L'interchangeabilité : accepter différentes implémentations
//
// 🎯 Prochaine étape : Projet 08 - Traits (réutilisation horizontale)
//
