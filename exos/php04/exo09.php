<?php
/*
## EXO9

    CREER UN FICHIER PAR EXERCICE
    exo09.php

    CREER UNE FONCTION QUI PREND EN PARAMETRE UN TABLEAU ASSOCIATIF
    ET QUI AFFICHE UN MENU EN HTML

    EXEMPLE:
    creerMenu([ 
        "accueil" => "index.php", 
        "galerie" => "galerie.php", 
        "contact" => "contact.php" 
        ]);

    ET QUI PRODUIRA LE CODE HTML
    <nav>
        <a href="index.php">accueil</a>
        <a href="galerie.php">galerie</a>
        <a href="contact.php">contact</a>
    </nav>

*/

function creerMenu ($tableau)
{
    foreach ($tableau as $cle => $valeur) {

        echo
        <<<x
            <a href="$valeur">$cle</a>

        x;
    }
}


creerMenu([
    // "cle"  => "valeur"
    "accueil" => "index.php",
    "galerie" => "galerie.php",
    "contact" => "contact.php"
]);
