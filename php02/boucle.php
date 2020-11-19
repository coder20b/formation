<?php


$compteur = 0;
while ($compteur < 5)
{
    // TANT QUE LE TEST $compteur < 100 EST VRAI
    // REPETER LE BLOC DE CODE
    // ...
    echo "<h1>LE COMPTEUR VAUT $compteur</h1>";

    // INCREMENTER LE COMPTEUR
    // PIEGE: NE PAS OUBLIER SINON BOUCLE INFINIE
    $compteur++;

    // ICI PHP REPART SUR LA LIGNE while
}

echo "<h1>FIN DE LA BOUCLE</h1>";

// ECRITURE PLUS COMPACTE
for ($compteur = 0; $compteur < 5; $compteur++)
{
    // TANT QUE LE TEST $compteur < 100 EST VRAI
    // REPETER LE BLOC DE CODE
    // ...
    // ...
    echo "<h1>LE COMPTEUR VAUT $compteur</h1>";
}

?>
