<?php

// PLEIN DE FONCTIONS SUR LA MANIPULATION D'IMAGES...
// https://www.php.net/manual/fr/function.imagecreatefromjpeg

// SI ON VEUT CREER UNE MINIATURE
// CHARGER LE FICHIER SOURCE QUI CONTIENT L'IMAGE SOURCE EN MEMOIRE PHP
// PREPARER L'IMAGE CIBLE VIDE EN MEMOIRE PHP
// COPIER L'IMAGE SOURCE PHP DANS L'IMAGE CIBLE PHP AVEC LE REDIMENSIONNEMENT
// ENREGISTRER L'IMAGE CIBLE DANS SON FICHIER


function creerMini ($fichierSource, $fichierCible, $largeurCible)
{
    $imageSource = imagecreatefromjpeg($fichierSource);

    if ($imageSource !== false)
    {
        // OK ON A UNE IMAGE CHARGEE
        // ON VA EXTRAIRE LA LARGEUR ET LA HAUTEUR DE L'IMAGE SOURCE
        // https://www.php.net/manual/fr/function.imagesx.php
        // https://www.php.net/manual/fr/function.imagesy.php
        $largeurSource = imagesx($imageSource);     // exemple: 1000
        $hauteurSource = imagesy($imageSource);     // exemple: 2000
    
        $hauteurCible = $hauteurSource * $largeurCible / $largeurSource ; // exemple: 2000 * 300 / 1000 = 600
    
        // https://www.php.net/manual/fr/function.imagecreatetruecolor.php
        $imageCible = imagecreatetruecolor($largeurCible, $hauteurCible);   // image vide
    
        // https://www.php.net/manual/en/function.imagecopyresampled
        imagecopyresampled(
            $imageCible, $imageSource,
            0, 0,
            0, 0,
            $largeurCible, $hauteurCible,
            $largeurSource, $hauteurSource
        );
        // https://www.php.net/manual/en/function.imagejpeg.php
        imagejpeg($imageCible, $fichierCible);
    }
    else
    {
        // KO LE FICHIER N'EST PAS UNE IMAGE JPEG
    }
}

creerMini("assets/upload/photo3.jpg", "assets/mini/photo3.jpg", 160);


