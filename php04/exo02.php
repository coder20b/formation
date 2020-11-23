<?php

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
