<?php
/*
## EXO5

    CREER UN FICHIER PAR EXERCICE
    exo05.php
    
    CREER UNE FONCTION QUI TROUVE LA PLUS PETITE VALEUR DANS UN TABLEAU DE NOMBRES
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE NOMBRES
    $tabNombre

    ET ON TESTERA AVEC 
    $tabNombre = [ 12, 3, 45, 1, 100, 35 ];
    // RESULTAT ATTENDU 1

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

*/

// ETAPE 1
function minimum ($tab)
{
    $min = $tab[0];                 // ASTUCE: INITIALISER LA VALEUR AU PREMIER ELEMENT
    foreach($tab as $current) 
    {
        if ($min > $current) {
            $min = $current;        // ON MET A JOUR LA VALEUR MINIMALE
        }
    }
    return $min;                    // IL FAUT ATTENDRE LA FIN DE LA BOUCLE
}


// ETAPE 2
$testMin = [ 120, 100, 43, 56 ];
echo minimum($testMin);

















?>