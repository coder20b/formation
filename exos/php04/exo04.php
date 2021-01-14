<?php
/*
## EXO4

    CREER UN FICHIER PAR EXERCICE
    exo04.php
    
    CREER UNE FONCTION QUI CALCULE LE PLUS PETIT ENTRE 3 NOMBRES
    EN PARAMETRE, ON FOURNIRA LES 3 NOMBRES
    $nombre1
    $nombre2
    $nombre3

    ET ON TESTERA AVEC 
    $nombre1 = 10
    $nombre2 = 2
    $nombre3 = 7
    // RESULTAT ATTENDU 2

    ET ON TESTERA AVEC 
    $nombre1 = 1
    $nombre2 = 7
    $nombre3 = 19
    // RESULTAT ATTENDU 1

    ET ON TESTERA AVEC 
    $nombre1 = 12
    $nombre2 = 71
    $nombre3 = 9
    // RESULTAT ATTENDU 9

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

*/

function trouverPetit ($nombre1, $nombre2, $nombre3)
{
    if ( ($nombre1 < $nombre2) && ($nombre1 < $nombre3) ) {
        return $nombre1;
    }
    elseif ( ($nombre2 < $nombre1) && ($nombre2 < $nombre3) ) {
        return $nombre2;
    }
    else {
        return $nombre3;
    }
}

$petit = trouverPetit(10, 2, 7);

echo "<h1>le plus petit nombre est $petit</h1>";

?>