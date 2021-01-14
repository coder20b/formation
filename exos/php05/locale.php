<?php

// ETAPE 1: DECLARATION
function calculerResultat ()
{
    $resultat = 20;   // VARIABLE LOCALE PHP CREE CETTE VARIABLE A CHAQUE APPEL DE FONCTION
  
    // ...

    // ICI A LA FIN DE L'APPEL DE LA FONCTION PHP DETRUIT $nombre
}

function calculerSomme ()
{
    $resultat = 10;   // VARIABLE LOCALE PHP CREE CETTE VARIABLE A CHAQUE APPEL DE FONCTION
  
    // ...

    // ICI A LA FIN DE L'APPEL DE LA FONCTION PHP DETRUIT $nombre
    return $resultat; // RENVOIE LA VALEUR MEMORISEE DANS LA VARIABLE LOCALE
}

// AVANT UN APPEL
echo $nombre;   // ERREUR $nombre N'EXISTE PAS ICI
// Notice: Undefined variable: nombre in C:\xampp\htdocs\formation\php05\locale.php on line 24
// APPEL 1
calculerResultat();     // CREATION ET DESTRUCTION DE $nombre

// APRES UN APPEL
echo $nombre;   // ERREUR $nombre N'EXISTE PAS ICI
// Notice: Undefined variable: nombre in C:\xampp\htdocs\formation\php05\locale.php on line 30
// APPEL 2
calculerResultat();     // CREATION ET DESTRUCTION DE $nombre

?>