<?php

// DECLARATION DE LA FONCTION
function calculerVolume ($longueur, $largeur, $hauteur)
{
    $resultat = $longueur * $largeur * $hauteur;
    return $resultat;
}

// APPELER LA FONCTION EN FOURNISSANT LES VALEURS AUX PARAMETRES
echo calculerVolume(4, 3, 2) . 'm3';

?>