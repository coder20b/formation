<?php

$tableauAssociatif = [
    "cle1" => "valeur1",
    "cle2" => 123,
    "cle3" => true,
];

foreach ($tableauAssociatif as $cle => $valeur)
{
    // PHP REMPLIT LES VALEUR DES VARIABLES $cle ET $valeur
    // COOL. JE PEUX UTILISER CES VARIABLES...
    echo "<h1>la clé vaut $cle</h1>";     // "cle1", "cle2", "cle3"
    echo "<h1>la valeur est $valeur</h1>";

}

?>