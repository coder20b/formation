<?php
// DETECTER LES REPETITIONS DANS LE CODE HTML
// => BOUCLE AVEC PHP
// => CE QUI EST IDENTIQUE VA DANS LA BOUCLE
// => CE QUI CHANGE VA DANS LE TABLEAU
// => ON COMBINE LE TABLEAU ET LA BOUCLE PRODUIRE LE RESULTAT

/*
$image = [
    "./assets/img/article1.jpg",
    "./assets/img/article2.jpg",
    "./assets/img/article3.jpg",
    "./assets/img/article4.jpg",
];
*/


// AFFICHE UNE GALERIE D'IMAGES
function afficherGalerie ($chemin)
{
    // LA FONCTION glob CONSTRUIT LE TABLEAU POUR MOI
    // $image = glob("./assets/img/*.jpg");
    // https://www.php.net/manual/fr/function.glob.php
    $image = glob($chemin, GLOB_BRACE);

    foreach($image as $compteur => $element)
    {
        echo 
        <<<x
        <img src="$element" alt="$element">

        x;
    }

}
