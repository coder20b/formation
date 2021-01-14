<?php

class Eleve
{
    // METHODES D'OBJET
    function afficherInfos ()
    {
        // $this EST COMME UNE VARIABLE QUI CONTIENT L'OBJET PAR LEQUEL ON A APPELE LA METHODE
        echo "<hr>";
        echo "<h3>MON NOM EST " . $this->nom . "</h3>";
        echo "<h3>MON ADRESSE EST " . $this->adresse . "</h3>";

    }

    // PROPRIETES D'OBJET 
    // => INDIVIDUELLES 
    // => CREES POUR CHAQUE OBJET
    public $nom     = "";
    public $prenom  = "";
    public $adresse = "";

    // METHODE MAGIQUE: CONSTRUCTEUR __construct
    // CALLBACK => PHP QUI VA APPELER CETTE METHODE AUTOMATIQUEMENT
    function __construct ($nom, $adresse, $actif=true)
    {
        $this->nom = $nom;              // ON RANGE LES VALEURS DANS LES PROPRIETES       
        $this->adresse = $adresse;
    }
}
/*
$georges            = new Eleve;
$georges->nom       = "Clooney";
$georges->adresse   = "Aix";

$julie              = new Eleve;
$julie->nom         = "Depardieu";
$julie->adresse     = "Toulon";
*/

$georges = new Eleve("Clooney", "Aix");         // PHP VA APPELER __construct("Clooney", "Aix")
$julie   = new Eleve("Depardieu", "Toulon");

$georges->afficherInfos();
$julie->afficherInfos();