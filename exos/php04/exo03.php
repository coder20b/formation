<?php
/*
## EXO3

    CREER UN FICHIER PAR EXERCICE
    exo03.php

    CREER UNE FONCTION QUI CALCULE LE PLUS PETIT (OU EGAL) ENTRE 2 NOMBRES
    EN PARAMETRE, ON FOURNIRA LES 2 NOMBRES
    $nombre1
    $nombre2

    ET ON TESTERA AVEC 
    $nombre1 = 10
    $nombre2 = 20
    // RESULTAT ATTENDU 10

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

*/

function trouverPetit ($nombre1, $nombre2)
{
    if ($nombre1 < $nombre2) {
        return $nombre1;
    }
    else {
        return $nombre2;
    }
}

$petit = trouverPetit(10, 20);

echo "<h1>le plus petit nombre est $petit</h1>";

// ASTUCE: LA FONCTION min DE PHP FAIT CE TRAVAIL DEJA POUR NOUS
// https://www.php.net/manual/fr/function.min.php


?>