<?php

// ETAPE 1: DECLARATION DE LA CLASSE ET DES METHODES
// => CODE EN ATTENTE
class MaClasse
{
    // METHODES
    // DANS UNE CLASSE: TOUTES LES METHODES ONT UN NOM DIFFERENT

    // METHODE MAGIQUE OPTIONNELLE: CONSTRUCTEUR
    // COMME UN CALLBACK    => PHP VA APPELER AUTOMATIQUEMENT CETTE METHODE
    function __construct ()
    {
        // DEBUG
        echo "<h1>CONSTRUCTEUR ACTIVE</h1>";
    }

    // METHODE MAGIQUE OPTIONNELLE: DESTRUCTEUR
    // COMME UN CALLBACK    => PHP VA APPELER AUTOMATIQUEMENT CETTE METHODE QUAND IL DETRUIT L'OBJET
    function __destruct ()
    {
        // DEBUG
        echo "<h1>DESTRUCTEUR ACTIVE</h1>";
    }

    function afficherTexte ()
    {
        // ...
        echo "<h1>afficherTexte</h1>";
    }

}

echo "<hr>";
// ETAPE 2: CREER UN OBJET DEPUIS LA CLASSE
$objetMaClasse = new MaClasse;  // PHP APPELLE AUTOMATIQUEMENT LA METHODE __construct
echo "<hr>";

// ETAPE 3: APPELER LA METHODE EN PASSANT PAR L'OBJET
$objetMaClasse->afficherTexte();

// ASSEZ RARE MAIS POSSIBLE DE DETRUIRE SOI MEME UNE VARIABLE
// https://www.php.net/manual/fr/function.unset.php
unset($objetMaClasse);          
// PHP VA APPELER AUTOMATIQUEMENT $objetMaClasse->__destruct


$objet2 = new MaClasse;         // PHP APPELLE AUTOMATIQUEMENT LA METHODE __construct
// A LA FIN DU PROGRAMME
// PHP FAIT DU MENAGE: 
// PHP DETRUIT LES VARIABLES (ET DONC LES VALEURS ET DONC LES OBJETS...)
// PHP VA AUTOMATIQUEMENT APPELER 
// $objetMaClasse->__destruct();
// $objet2->__destruct();
