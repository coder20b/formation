<section>
    <h2>TITRE DE LA SECTION GALERIE</h2>
    <article>
        <h3>GALERIE PHOTO</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis dolor iste illo similique nesciunt sunt aspernatur, excepturi, quos officia, cumque tenetur vel possimus! Dolores, ut placeat! Ab a quisquam quis?</p>
        <div class="galerie">
            <img src="./assets/img/article1.jpg" alt="article1">
            <img src="./assets/img/article2.jpg" alt="article2">
            <img src="./assets/img/article3.jpg" alt="article3">
        </div>
    </article>

    <article>
        <h3>GALERIE PHOTO AVEC PHP</h3>
        <p>AJOUTER LE CODE PHP POUR PRODUIRE LE MEME CODE HTML</p>
        <div class="galerie">
<?php

// DETECTER LES REPETITIONS DANS LE CODE HTML
// => BOUCLE AVEC PHP
// => CE QUI EST IDENTIQUE VA DANS LA BOUCLE
// => CE QUI CHANGE VA DANS LE TABLEAU
// => ON COMBINE LE TABLEAU ET LA BOUCLE PRODUIRE LE RESULTAT

$image = [
    "./assets/img/article1.jpg",
    "./assets/img/article2.jpg",
    "./assets/img/article3.jpg",
];

foreach($image as $compteur => $element)
{
    echo 
    <<<html
    <img src="$element" alt="$element">

    html;
}


?>
        </div>
    </article>


</section>