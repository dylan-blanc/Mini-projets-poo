<?php
/**
 * 🔒 PROJET 03 : PUBLIC VS PRIVATE
 * Concept : Encapsulation (protéger les données sensibles)
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer la classe Portefeuille
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Portefeuille' avec :
// - Propriété PRIVATE $proprietaire
// - Propriété PRIVATE $argentDisponible
//
// Attention : PRIVATE, pas public !

class Portefeuille {
    private $proprietaire;
    private $argentDisponible;
    private $historiqueTransactions = [];




// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Ajouter le constructeur
// ─────────────────────────────────────────────────────────────────────────
//
// Le constructeur doit :
// 1. Prendre 2 paramètres : $proprietaire, $argentInitial
// 2. Initialiser les propriétés privées
// 3. Afficher "👛 Portefeuille créé pour [nom] avec [argent]€"

public function __construct($proprietaire, $argentInitial)
{
    $this->proprietaire = $proprietaire;
    $this->argentDisponible = $argentInitial;
    echo "Portefeuille cree pour " . $this->proprietaire . " avec " . $this->argentDisponible . "€ <br>";
}




    // ─────────────────────────────────────────────────────────────────────────
    // TODO 3 : Ajouter un GETTER
    // ─────────────────────────────────────────────────────────────────────────
    //
    // Crée une méthode getArgent() qui :
    // - RETOURNE (return) la valeur de $argentDisponible
    // - Permet de LIRE l'argent sans pouvoir le modifier

    public function getArgent() {
    return $this->argentDisponible;
}

public function getHistorique() {
    return $this->historiqueTransactions;
}




    // ─────────────────────────────────────────────────────────────────────────
    // TODO 4 : Ajouter la méthode ajouterArgent()
    // ─────────────────────────────────────────────────────────────────────────
    //
    // Cette méthode doit :
    // 1. Prendre un paramètre $montant
    // 2. Vérifier que $montant > 0
    // 3. Si OUI : ajouter le montant et afficher "✅ Ajout de [montant]€"
    // 4. Si NON : afficher "❌ Montant invalide !"

    public function ajouterArgent($montant)
    {
        if ($montant > 0) {
            $this->argentDisponible += $montant;
            $this->historiqueTransactions[] = [
                'type' => 'ajout',
                'montant' => $montant,
                'solde' => $this->argentDisponible
            ];
            echo "Ajout de " . $montant . "€ <br>";
        } else {
            echo "Montant invalide ! <br>";
        }
    }




    // ─────────────────────────────────────────────────────────────────────────
    // TODO 5 : Ajouter la méthode retirerArgent()
    // ─────────────────────────────────────────────────────────────────────────
    //
    // Cette méthode doit :
    // 1. Vérifier que $montant > 0
    // 2. Vérifier que $montant <= $argentDisponible
    // 3. Si OK : retirer et afficher "✅ Retrait de [montant]€"
    // 4. Sinon : afficher "❌ Fonds insuffisants !" ou "❌ Montant invalide !"

    public function retirerArgent($montant)
    {
        if ($montant > 0) {
            if ($montant <= $this->argentDisponible) {
                $this->argentDisponible -= $montant;
                $this->historiqueTransactions[] = [
                    'type' => 'retrait',
                    'montant' => $montant,
                    'solde' => $this->argentDisponible
                ];
                echo "Retrait de " . $montant . "€ <br>";
            } else {
                echo "Fonds insuffisants ! <br>";
            }
        } else {
            echo "Montant invalide ! <br>";
        }
    }
}




// ─────────────────────────────────────────────────────────────────────────
// TODO 6 : Créer et tester un portefeuille
// ─────────────────────────────────────────────────────────────────────────
//
// Crée $monPortefeuille avec :
// - Propriétaire : ton prénom
// - Argent initial : 100€
//
// Teste :
// 1. Afficher l'argent (avec getArgent())
// 2. Ajouter 50€
// 3. Retirer 30€
// 4. Tenter de retirer 500€ (devrait échouer)
// 5. Tenter d'ajouter -20€ (devrait échouer)
// 6. Afficher l'argent final

$monPortefeuille = new Portefeuille("Alex", 100);
echo "Argent disponible : " . $monPortefeuille->getArgent() . "€ <br>";
$monPortefeuille->ajouterArgent(50);
echo "Argent disponible : " . $monPortefeuille->getArgent() . "€ <br>";
$monPortefeuille->retirerArgent(30);
echo "Argent disponible : " . $monPortefeuille->getArgent() . "€ <br>";
echo "- <br>";
echo "Essaie de retirer 500€ <br>";
$monPortefeuille->retirerArgent(500);
echo "essaie d'ajouter un montant negatif <br>";
$monPortefeuille->ajouterArgent(-20);
echo "Argent disponible final : " . $monPortefeuille->getArgent() . "€ <br>";


echo "<br> <br>";
echo "Historique des transactions : <br>";
foreach ($monPortefeuille->getHistorique() as $transaction) {
    echo ucfirst($transaction['type']) . " de " . $transaction['montant'] . "€, solde après transaction : " . $transaction['solde'] . "€ <br>";
}




// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 03
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ L'encapsulation : protéger les données avec private
// ✅ Les getters pour lire sans modifier
// ✅ Les méthodes avec validation pour sécuriser les modifications
//
// 🎯 Prochaine étape : Projet 04 - L'Héritage (réutiliser du code)
//
?>
