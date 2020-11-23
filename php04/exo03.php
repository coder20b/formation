<?php

function trouverPetit ($nombre1, $nombre2)
{
    if ($nombre1 < $nombre2) {
        return $nombre1;
    }
    else {
        return $nombre2;
    }
}

$petit = trouverPetit(10, 20);

echo "<h1>le plus petit nombre est $petit</h1>";

// ASTUCE: LA FONCTION min DE PHP FAIT CE TRAVAIL DEJA POUR NOUS
// https://www.php.net/manual/fr/function.min.php


?>