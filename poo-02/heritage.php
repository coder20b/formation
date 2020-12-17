<?php

class Centrale
{
    // PROPRIETES D'OBJET
    public $nom = "";       // CHAQUE OBJET AURA SON PROPRE NOM

    // METHODES
    function afficherCoucou ()
    {
        echo "<h1>COUCOU</h1>";
    }

    // CONSTRUCTEUR
    function __construct ()
    {
        echo "<h1>Centrale::__construct</h1>";
    }
}

class MaClasseA
    extends Centrale    // HERITAGE SE FAIT SUR UNE SEULE CLASSE PARENTE
{
    // METHODES
    function afficherTitre ()
    {
        // DANS UNE METHODE DE LA CLASSE ENFANT, ON PEUT UTILISER UNE PROPRIETE DU PARENT
        // (PLUS DE SUBTILITES... TOUT DE SUITE... CAR public)
        echo "<h1>MON NOM EST " . $this->nom . "</h1>"; 
    }
}

class MaClasseB
    extends Centrale   // HERITAGE SE FAIT SUR UNE SEULE CLASSE PARENTE
{
    // METHODES
    function afficherTitre ()
    {
        // DANS UNE METHODE DE LA CLASSE ENFANT, ON PEUT UTILISER UNE PROPRIETE DU PARENT
        // (PLUS DE SUBTILITES... TOUT DE SUITE... CAR public)
        echo "<h1>MON NOM EST " . $this->nom . "</h1>"; 
    }

}

$objetMaClasseA = new MaClasseA;    // DECLENCHE LE CONSTRUCTEUR
$objetMaClasseA->afficherCoucou();

$objetMaClasseA->nom = "georges";
$objetMaClasseA->afficherTitre();


$objetMaClasseB = new MaClasseB;    // DECLENCHE LE CONSTRUCTEUR
$objetMaClasseB->afficherCoucou();

$objetMaClasseB->nom = "julie";
$objetMaClasseB->afficherTitre();




