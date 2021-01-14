<?php

/*
## EXO8

    CREER UN FICHIER PAR EXERCICE
    exo08.php

    CREER UNE FONCTION QUI PREND EN PARAMETRE UN TABLEAU ORDONNE
    DE CHEMINS D'IMAGE $tabImage
    ET QUI AFFICHE UNE LISTE D'IMAGES EN HTML

    EXEMPLE:
    creerGalerie([ "assets/img/photo1.jpg", "assets/img/photo2.jpg", "assets/img/photo3.jpg" ]);

    ET QUI PRODUIRA LE CODE HTML
    <img src="assets/img/photo1.jpg">
    <img src="assets/img/photo2.jpg">
    <img src="assets/img/photo3.jpg">

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

*/

function creerGalerie ($link)
{
    foreach ($link as $value) 
    {
        // echo '<img src="' . $value . '" alt="">' . "<br>";
        echo
        <<<x
        <img src="$value" alt=""><br>
        x;
    }
    
}

$link = array(
    "https://loremflickr.com/320/240", 
    "https://loremflickr.com/320/240", 
    "https://loremflickr.com/320/240"
);

creerGalerie($link);

?>
