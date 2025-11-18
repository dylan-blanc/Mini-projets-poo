<?php

namespace src\MonApp\Models;

class User
{
    private $nom;
    public function __construct($nom)
    {
        $this->nom = $nom;
    }
    public function afficher()
    {
        echo "👤 Modèle User : {$this->nom}";
    }
}
