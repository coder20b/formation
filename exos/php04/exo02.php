<?php
/*
## EXO2

    CREER UN FICHIER PAR EXERCICE
    exo02.php
    
    CREER UNE FONCTION QUI CALCULE LA SURFACE DES 4 MURS
    EN PARAMETRE ON FOURNIRA LES 3 DIMENSIONS
    $longueur
    $largeur 
    $hauteur

    ET ON TESTERA AVEC 
    $longueur = 4
    $largeur  = 3
    $hauteur  = 2
    // RESULTAT ATTENDU: 28m2

    GRAND MUR = $longueur * $hauteur 
    PETIT MUR = $largeur * $hauteur

    SURFACE_4_MURS = 2 * ( GRAND_MUR + PETIT_MUR ) 

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

*/

// DEV 1: DEFINIR LA FONCTION
function calculerSurface ($longueur, $largeur, $hauteur)
{
    $surfaceGrandMur = $longueur * $hauteur;
    $surfacePetitMur = $largeur * $hauteur;
    $surfaceTotale   = ($surfaceGrandMur + $surfacePetitMur) * 2;
    
    return $surfaceTotale;
    // return 2 * $hauteur * ($longueur + $largeur);
}

// DEV 2: APPELER LA FONCTION
// ATTENTION L'ORDRE DES VALEURS EST IMPORTANT
$surfaceTotale = calculerSurface(4, 3, 2);

?>
<p>la surface totale des 4 murs est de <?php echo $surfaceTotale ?>m2</p>
