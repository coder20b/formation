<?php

// VARIABLE GLOBALE
$texte = "UN TEXTE GLOBAL";

// ETAPE 1
// CODE EN ATTENTE
function afficher ()
{
    global $texte;              // DECLARATION EXPLICITE AVEC global
                                // OK, ON PEUT UTILISER UNE VARIABLE GLOBALE

    echo "<h1>$texte</h1>";     // ERREUR CAR ON NE PEUT PAS DIRECTEMENT UTILISER UNE VARIABLE GLOBALE
    // Notice: Undefined variable: texte in C:\xampp\htdocs\formation\php05\globale.php on line 10
}

// ETAPE 2
// APPELER LA FONCTION POUR ACTIVER
afficher();

