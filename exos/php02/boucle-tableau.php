<?php

$tableau = [ "a", "b", "c" ];
// TABLEAU ORDONNE A DES INDICES 0, 1, 2

echo "<hr>";
// AVEC UNE BOUCLE, ON PEUT INCREMENTER UN COMPTEUR ET L'UTILISER COMME INDICE
$compteur = 0;
while ($compteur < count($tableau))
{
    echo "<h1>le compteur vaut $compteur</h1>";     // 0, 1, 2
    $element = $tableau[$compteur];
    echo "<h1>la valeur est $element</h1>";

    $compteur++;
}


echo "<hr>";
for ($compteur = 0; $compteur < count($tableau); $compteur++)
{
    echo "<h1>le compteur vaut $compteur</h1>";     // 0, 1, 2
    $element = $tableau[$compteur];
    echo "<h1>la valeur est $element</h1>";

}

echo "<hr>";
foreach ($tableau as $compteur => $element)
{
    echo "<h1>le compteur vaut $compteur</h1>";     // 0, 1, 2
    echo "<h1>la valeur est $element</h1>";

}

?>