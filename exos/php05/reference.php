<?php

// pointeur ou référence
$b = & $a;

$texte = "a";
$texte2 = $texte;

echo $texte2;       // "a"
$texte = "b";
echo $texte;        // "b"
echo $texte2;       // "a"

$texte3 = & $texte;
echo $texte3;       // "b"
$texte = "c";
echo $texte;        // "c"
echo $texte3;       // "c"

$texte3 = "d";
echo $texte;        // "d"
