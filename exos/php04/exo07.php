<?php
/*
## EXO7

    CREER UN FICHIER PAR EXERCICE
    exo07.php

    CREER UNE FONCTION QUI RENVOIE 
    UN TEXTE CONCATENANT LES VALEURS D'UN TABLEAU DE LETTRES
    EN SEPARANT CHAQUE LETTRE AVEC UNE VIRGULE
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE LETTRES
    $tabLettre

    ET ON TESTERA AVEC 
    $tabLettre = [ "a", "b", "c", "d" ];
    // RESULTAT ATTENDU "a,b,c,d"
    // ATTENTION: PAS DE VIRGULE AU DEBUT OU A LA FIN

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

    EN PHP:
    implode FAIT LA CONCATENATION POUR NOUS ;-p
    https://www.php.net/manual/fr/function.implode.php

*/

function concatener ($lettres)
{
    $resultat = $lettres[0];    // premier element
    // à partir du 2è élément, on peut rajouter une virgule avant
    for($i=1; $i < count($lettres); $i++) {
        $resultat .= "," . $lettres[$i];        
    }
    return $resultat;
}

$tabLettre = [ "a", "b", "c", "d" ];
echo concatener($tabLettre);

?>


