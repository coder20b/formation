<?php

function trouverPetit ($nombre1, $nombre2, $nombre3)
{
    if ( ($nombre1 < $nombre2) && ($nombre1 < $nombre3) ) {
        return $nombre1;
    }
    elseif ( ($nombre2 < $nombre1) && ($nombre2 < $nombre3) ) {
        return $nombre2;
    }
    else {
        return $nombre3;
    }
}

$petit = trouverPetit(10, 2, 7);

echo "<h1>le plus petit nombre est $petit</h1>";

?>