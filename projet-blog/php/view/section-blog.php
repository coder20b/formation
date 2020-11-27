
<section class="blog">
    <h2>AFFICHAGE DES ARTICLES DU BLOG AVEC PHP</h2>
<?php 
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
    $requeteSQL =
    <<<x
    SELECT * FROM article
    x;
    // COOL JE VAIS REUTILISER MA FONCTION envoyerRequeteSql
    $resultat = envoyerRequeteSql($requeteSQL, []);
    // https://www.php.net/manual/fr/pdostatement.fetchall.php
    // EN JS    objet.methode()
    // EN PHP   $objet->methode()
    $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);  // ON VA OBTENIR UN TABLEAU DE TABLEAUX ASSOCIATIFS

    // QUAND ON A UN TABLEAU ET ON VEUT TOUS LES ELEMENTS
    // => ON FAIT UNE BOUCLE
    foreach($tabLigne as $ligneAsso)
    {
        $titre = $ligneAsso["titre"];
        $image = $ligneAsso["image"];
        $contenu = $ligneAsso["contenu"];
        $datePublication = $ligneAsso["datePublication"];

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



    // DEBUG
    // echo "<pre>";
    // print_r($tabLigne);
    // echo "</pre>";
    /*
Array
(
    [0] => Array
        (
            [id] => 1
            [titre] => article 1
            [image] => assets/img/article1.jpg
            [contenu] => contenu article 1
            [datePublication] => 2020-11-27 10:19:28
        )

    [1] => Array
        (
            [id] => 2
            [titre] => article 2
            [image] => assets/img/article2.jpg
            [contenu] => contenu article 2
            [datePublication] => 2020-11-27 10:20:17
        )

    [2] => Array
        (
            [id] => 3
            [titre] => article 3
            [image] => assets/img/article3.jpg
            [contenu] => contenu article 3
            [datePublication] => 2020-11-27 10:20:48
        )

)
    */
}

afficherArticles();
?>
</section>

<section class="blog">
    <h2>AFFICHAGE DES ARTICLES DU BLOG</h2>

    <article>
        <h3><a href="article.php">TITRE ARTICLE 1</a></h3>
        <img src="assets/img/article1.jpg" alt="article1">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam distinctio repellendus aperiam dolorum dolor repellat maxime, exercitationem perferendis sapiente fugiat aut itaque, omnis obcaecati reprehenderit necessitatibus, ullam quo illo eum?</p>
        <p>publié le 17/11/2020</p>
    </article>

    <article>
        <h3><a href="article.php">TITRE ARTICLE 2</a></h3>
        <img src="assets/img/article2.jpg" alt="article2">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam distinctio repellendus aperiam dolorum dolor repellat maxime, exercitationem perferendis sapiente fugiat aut itaque, omnis obcaecati reprehenderit necessitatibus, ullam quo illo eum?</p>
        <p>publié le 17/11/2020</p>
    </article>

    <article>
        <h3><a href="article.php">TITRE ARTICLE 3</a></h3>
        <img src="assets/img/article3.jpg" alt="article3">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam distinctio repellendus aperiam dolorum dolor repellat maxime, exercitationem perferendis sapiente fugiat aut itaque, omnis obcaecati reprehenderit necessitatibus, ullam quo illo eum?</p>
        <p>publié le 17/11/2020</p>
    </article>

</section>