<?php

class Chauffeur
{
    public $nom = "";
    public $anneePermis = "";

    // SI ON APPELLE new SANS LES 2 PARAMETRES
    // Fatal error: Uncaught ArgumentCountError: Too few arguments to function Chauffeur::__construct(), 0 passed
    // UTILISATION CLASSIQUE DU CONSTRUCTEUR
    // => INITIALISER LES VALEURS DES PROPRIETES
    // (ATTENTION PHP8 AJOUTE UNE NOUVELLE FACON PLUS COMPACTE...)
    function __construct($nom, $anneePermis)
    {
        $this->nom = $nom;
        $this->anneePermis = $anneePermis;
    }
}

$alfred = new Chauffeur("Wilfried", "1950");    // PHP VA CREER $this = $alfred
// $alfred->nom = "Wilfried";
// $alfred->anneePermis = "1950";

$julie = new Chauffeur("Depardieu", "1990");
// $julie->nom = "Depardieu";
// $julie->anneePermis = "1990";

$georges = new Chauffeur("Clooney", "1970");

// ... 


