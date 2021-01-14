<?php

// DANS UN TRAIT, ON PEUT METTRE LE MEME CODE QUE DANS UNE CLASSE
trait MonTrait
{
    // PROPRIETES

    // METHODES
    function afficherTitre($texte)
    {
        echo "<h1>$texte</h1>";
    }

}

// $objet = new Montrait;  // ERREUR PHP CAR MonTrait N'EST PAS UNE CLASSE
// Fatal error: Uncaught Error: Cannot instantiate trait MonTrait

trait MonTrait2
{
    // PROPRIETES

    // METHODES
    function afficherContenu($texte)
    {
        echo "<p>$texte</p>";
    }

}

// $objet = new Montrait;  // ERREUR PHP CAR MonTrait N'EST PAS UNE CLASSE
// Fatal error: Uncaught Error: Cannot instantiate trait MonTrait

class MaClasse
{
    // COMPOSER AVEC DES TRAITS
    use MonTrait, MonTrait2;    
}

$objet = new MaClasse;
$objet->afficherTitre("coucou");    
// POSSIBLE AVEC LA COMPOSITION AVEC MonTrait
$objet->afficherContenu("ca marche aussi");    
// POSSIBLE AVEC LA COMPOSITION AVEC MonTrait2
