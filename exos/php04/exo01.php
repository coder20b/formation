<?php
/*
## EXO1

    CREER UN FICHIER PAR EXERCICE
    exo01.php

    CREER UNE FONCTION QUI CALCULE LE VOLUME D'UNE PIECE
    EN PARAMETRE ON FOURNIRA LES 3 DIMENSIONS
    $longueur
    $largeur 
    $hauteur

    ET ON TESTERA AVEC 
    $longueur = 4
    $largeur  = 3
    $hauteur  = 2
    // RESULTAT ATTENDU: 24m3

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

*/

// DECLARATION DE LA FONCTION
function calculerVolume ($longueur, $largeur, $hauteur)
{
    $resultat = $longueur * $largeur * $hauteur;
    return $resultat;
}

// APPELER LA FONCTION EN FOURNISSANT LES VALEURS AUX PARAMETRES
echo calculerVolume(4, 3, 2) . 'm3';

?>