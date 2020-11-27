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

// DEFINITION 


function afficherArticles() 
{
    // ON VA STOCKER LES INFOS DES ARTICLES DANS UNE TABLE SQL
    //  TOUJOURS LA DATABASE blog
    // CREER UNE TABLE SQL  article
    //  COMME COLONNES
    //      id                  INT             INDEX=primary   A_I (AUTO_INCREMENT)
    //      titre               VARCHAR(160)
    //      image               VARCHAR(160)
    //      contenu             TEXT
    //      datePublication     DATETIME
    //      ... 
    // ET AJOUTER QUELQUES LIGNES POUR LES ARTICLES... 

    // AJOUTER LE CODE PHP
    // RECUPERER LA LISTE DES ARTICLES
    // CREER LE CODE HTML POUR CHAQUE ARTICLE
    // REQUETE SQL:
    // SELECT * FROM `article`
    $tabLigne = lireTable("article", "datePublication DESC");

    // QUAND ON A UN TABLEAU ET ON VEUT TOUS LES ELEMENTS
    // => ON FAIT UNE BOUCLE
    foreach($tabLigne as $ligneAsso)
    {
        /*
        $titre = $ligneAsso["titre"];
        $image = $ligneAsso["image"];
        $contenu = $ligneAsso["contenu"];
        $datePublication = $ligneAsso["datePublication"];
        */
        // RACCOURCI SYMPA ;-p
        // https://www.php.net/manual/fr/function.extract.php
        // (ASTUCE: DONNER DES NOMS DE COLONNES SQL EN camelCase...)
        extract($ligneAsso);

        // ON AFFICHE LE CODE HTML
        echo
        <<<codehtml
        
        <article>
            <h3><a href="article.php">$titre</a></h3>
            <img src="$image" alt="article1">
            <p>$contenu</p>
            <p>publié le $datePublication</p>
        </article>

        codehtml;
    }
}

