<?php

// EN PRATIQUE:
// ON PEUT REPARTIR LE TRAVAIL DANS UNE EQUIPE SUR PLUSIEURS DEVS
// ET UN DEV PEUT AVERTIR QUE SA CLASSE EST PARTIELLE 
// ET QU'IL FAUDRA COMPLETER LE CODE POUR L'UTILISER SUR UN PROJET

// ON PEUT DEFINIR UNE CLASSE ABSTRAITE
// => AJOUTER abstract AVANT class
// => AJOUTER DES METHODES SANS {} MAIS EN AJOUTANT abstract AVANT function 

// ATTENTION: COMPLETER CE CODE AVANT DE L'UTILISER
abstract class MaClasseAbstrait
{
    // METHODES
    function afficherTitre ($texte)
    {
        echo "<h1>$texte</h1>";
    }

    // METHODE ABSTRAITE
    abstract function afficherContenu ();   // PAS DE BLOC {}
}

// ON NE PEUT PLUS FAIRE new POUR CREER UN OBJET A PARTIR DE CETTE CLASSE
// $objetAbstrait = new MaClasseAbstrait;
// => ERREUR PHP
// Fatal error: Uncaught Error: Cannot instantiate abstract class MaClasseAbstrait

// COMMENT JE PEUX ACTIVER LE CODE DE afficherTitre ??
// => JE DOIS CREER UNE CLASSE ENFANT ET CETTE CLASSE ENFANT SURCHARGE LA METHODE ABSTRAITE

class MaClasseEnfant
    extends MaClasseAbstrait
{
    // JE SURCHARGE LA METHODE ABSTRAITE EN FOURNISSANT LE BLOC {}
    function afficherContenu ()
    {

    }

}

$objetEnfant = new MaClasseEnfant;
$objetEnfant->afficherTitre("coucou");






