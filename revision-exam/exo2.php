<?php

/*
Exercice 2 : « On part en voyage »
Créer une fonction permettant de convertir un montant en euros vers un montant en dollars
américains.
Cette fonction prendra deux paramètres :
● Le montant de type int ou float
● La devise de sortie (uniquement EUR ou USD).
Si le second paramètre est “USD”, le résultat de la fonction sera, par exemple :
1 euro = 1.085965 dollars américains
Il faut effectuer les vérifications nécessaires afin de valider les paramètres.

*/

// int => NOMBRE ENTIER
// float => DECIMAL (NOMBRE FLOTTANT)

function convertir ($montantEntree, $devise)
{
    $resultatSortie = 0;
    if ($devise == "USD")
    {
        // SCENARIO 1: EURO VERS DOLLAR
        // 1 euro = 1.085965 dollars américains
        $resultatSortie = 1.085965 * $montantEntree;
    }
    else {
        // SCENARIO 2: DOLLAR VERS EURO
        // 1 dollar = 0.95746 euros
        $resultatSortie = 0.95746 * $montantEntree;
    }
    return $resultatSortie;
}

echo "<h1>dollar vers euro</h1>";
// ON CONVERTIT 1000 DOLLARS EN EUROS
echo convertir(1000, "EUR");

echo "<h1>euro vers dollar</h1>";
// ON CONVERTIT 100.50 EUROS EN DOLLARS
echo convertir(100.50, "USD");

