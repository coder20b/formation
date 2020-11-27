# formation

Formation Dev Fullstack

## github

Repository Github:

https://github.com/coder20b/formation

## liveshare

    vendredi 27/11

https://prod.liveshare.vsengsaas.visualstudio.com/join?D915E1B40D50C35FB61EE0A8F250AEB53650

## Questions ?

    RGPD et COOKIES ET DROITS DE L'UTILISATEUR:
https://www.lemondeinformatique.fr/actualites/lire-rgpd-carrefour-sanctionne-par-la-cnil-avec-des-amendes-de-3-meteuro-81161.html


## RESUME DE L'EPISODE PRECEDENT

    PROGRAMMATION FONCTIONNELLE
    => CREER DES FONCTIONS ET A RANGER SON CODE DANS DES FONCTIONS
    => CREATION DE SA BIBLIOTHEQUE
    => CREATION DE VOTRE CAPITAL DE CODE
    => REUTILISATION DE PROJET EN PROJET
    => TOUT LE CODE DE VOTRE VIE DE DEVELOPPEUR => QUELQUES Go DE DONNEES...

    BIBLIOTHEQUE DE FONCTIONS
    + ORGANISATION DU CODE EN FICHIERS ET EN DOSSIERS
    => CREER UN FRAMEWORK
    => SI ON SUIT LE DESIGN PATTERN MVC
    => CREER UN FRAMEWORK MVC

    FRAMEWORK
    + BACK OFFICE (ADMIN)
    => CREER UN CMS

## CRUD

    CREATE  => FORMULAIRES DE CREATION
                    newsletter
                    contact
                    ...

    READ    => AFFICHAGE DES INFORMATIONS 
                STOCKEES DANS SQL
                VERS UNE PAGE WEB

## READ SUR UNE TABLE SQL

```php
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
```


## EXERCICE: CREER LA PAGE admin.php

    * SCENARIO READ SUR LA TABLE SQL article
    AJOUTER L'AFFICHAGE DES ARTICLES SUR LA PAGE blog.php

    * SCENARIO CREATE SUR TABLE SQL article

    CREER UNE PAGE admin.php
    QUI VA PROPOSER LE FORMULAIRE 
    POUR AJOUTER UN NOUVEL ARTICLE DANS LA TABLE article

    PAUSE ET REPRISE A 11H15...

























