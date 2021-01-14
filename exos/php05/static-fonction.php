<?php

function afficherTexte ()
{
    $texte = "texte local"; // variable locale
    static $nombre = 0;     // variable locale static (ligne exécutée seulement au premier appel...)
                            // bizarre: la variable sera créé au premier appel de la fonction
                            // mais ne sera pas détruite

    echo "<h1>$texte $nombre</h1>";
    $nombre++;              // on incremente le nombre
    // COMME $nombre EST static, PHP NE DETRUIT PAS $nombre
}

afficherTexte();        // texte local 0
afficherTexte();        // texte local 1
afficherTexte();        // texte local 2

?>