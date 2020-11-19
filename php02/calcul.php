<?php
// ON PEUT COMBINER AVEC DES PARENTHESES
$prixHT = 200;
$tva    = 20;

$prixTTC = $prixHT * (100 + $tva) / 100;
// $prixTTC = $prixHT * (1 + $tva / 100);

$promo = 50;    // PROMO DE 50%

$prixFinal = $prixTTC - ($promo / 100) * $prixTTC;
// $prixFinal = $prixTTC * (1 - ($promo / 100));

echo "<h1>PRIX TTC: $prixTTC euros</h1>";

echo "<h1>PROMO: $promo %</h1>";
echo "<h1>PRIX FINAL: $prixFinal euros</h1>";

?>