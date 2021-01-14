<?php
/*
## EXO6

    CREER UN FICHIER PAR EXERCICE
    exo06.php
    
    CREER UNE FONCTION QUI CALCULE LA SOMME DES VALEURS DANS UN TABLEAU DE NOMBRES
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE NOMBRES
    $tabNombre

    ET ON TESTERA AVEC 
    $tabNombre = [ 12, 3, 45, 1, 100, 35 ];
    // RESULTAT ATTENDU 196

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

*/

// ETAPE 1
function somme ($tab)
{
    $resultat = 0;                       // ASTUCE: INITIALISER LA VALEUR A ZERO
    foreach($tab as $current) 
    {
        $resultat += $current;           // ON INCREMENTE LE TOTAL
    }
    return $resultat;                    // IL FAUT ATTENDRE LA FIN DE LA BOUCLE
}


// ETAPE 2
$testSomme = [ 12, 3, 45, 1, 100, 35 ];
echo somme($testSomme);


?>