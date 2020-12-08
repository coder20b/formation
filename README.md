# formation

Formation Dev Fullstack (Front + Back)

Stack = Pile
=> Pile des technologies mises en oeuvre sur un projet
=> HTML, CSS, JS, PHP, SQL  => FullStack
=> HTML + CSS + JS          => Front
=> PHP + SQL                => Back

## github

Repository Github:

https://github.com/coder20b/formation

## liveshare

    mardi 08/12

https://prod.liveshare.vsengsaas.visualstudio.com/join?E61DA3AEE1E01B52FC0139CF27FF5777AD2B

## Questions ?

## RESUME DE L'EPISODE PRECEDENT

    PROJET CMS
    => TECHNIQUE GUICHET UNIQUE
    => CENTRALISE TOUTES LES REQUETES PHP DU NAVIGATEUR VERS index.php
    => CONFIG APACHE .htaccess DANS LEQUEL ON A ECRIT DES REGLES DE RE-ECRITURES D'URL (REWRITE RULES)
    => LES FRAMEWORKS ET CMS UTILISENT CETTE TECHNIQUE

    COMBINAISON TEMPLATES PHP x TABLE SQL page
    => OUVRE LA VOIE POUR CREER DES SITES DE MILLIONS DE PAGES SI ON VEUT

## PROGRAMME POUR LA JOURNEE

    * + NOUVEAUTE DE PHP
    * + NOUVEAUTE DE JS
    * CONTINUER LE PROJET CMS
    * REVISION CRUD

## COMPARAISON FRAMEWORK PHP

https://kinsta.com/fr/blog/frameworks-php/


## CRUD TABLE SQL page


    AJOUTER UNE PAGE admin.php
    POUR PROPOSER UN CRUD SUR LA TABLE SQL page

    //  ON VA CREER UNE DATABASE cms AVEC CHARSET utf8mb4_general_ci
    //  ET DEDANS ON VA CREER UNE TABLE SQL page
    //  AVEC COMME COLONNES
    //  id                  INT             INDEX=PRIMARY   A_I(AUTO_INCREMENT)
    //  url                 VARCHAR(160)
    //  template            VARCHAR(160)
    //  titre               VARCHAR(160)
    //  contenu             TEXT
    //  categorie           VARCHAR(160)
    //  image               VARCHAR(160)
    //  datePublication     DATETIME
    //  ...



    PAUSE ET REPRISE A 11H20...

## PROBLEME UX SUR UPDATE ET UPLOAD


    QUAND ON AFFICHE LE FORMULAIRE D'UPDATE D'UNE PAGE
    ON PROPOSE UN CHAMP image POUR UPLOADER UNE NOUVELLE PHOTO
    => MAIS CE CHAMP DEVRAIT ETRE OPTIONNEL ET PAS OBLIGATOIRE
    => L'UTILISATEUR DEVRAIT POUVOIR LA MEME PHOTO SANS AVOIR A RE-UPLOADER LE FICHIER UNE 2e FOIS...

    ACTUELLEMENT, ON EST OBLIGE DE RE-UPLOADER LA MEME IMAGE
    => PAS PERFORMANT ET PAS USER FRIENDLY DU TOUT...


## PAGE CRUD SUR LA TABLE user

    EN AUTONOMIE
    CREER UNE PAGE admin-user.php
    
    ET SI PLUS DE TEMPS, AVANCER SUR LA TABLE user
    => CREER LA TABLE SQL user
    => ET CODER UNE PAGE CRUD SUR LA TABLE SQL user

    TABLE SQL user
    id                  INT             INDEX=PRIMARY   A_I
    pseudo              VARCHAR(160)
    email               VARCHAR(160)
    motDePasse          VARCHAR(160)
    dateCreation        DATETIME


    PAUSE DEJEUNER ET REPRISE A 13H45


## BOUCLES SUR LA TABLE page EN FILTRANT SUR LA COLONNE categorie

    ON PEUT COMPOSER LE CONTENU DES NOS PAGES EN CREANT DES BOUCLES

```php

<section class="blog">
    <h2>PAGE BLOG</h2>
<?php
// ON VA SELECTIONNER DANS LA TABLE page
// LES LIGNES QUI ONT LA categorie = 'blog'
// ET ON VA LES AFFICHER DANS UNE LISTE D'ARTICLE
$tabLigne = lireLigne("page", "categorie", "blog", "datePublication DESC");
foreach($tabLigne as $ligneAsso)
{
    extract($ligneAsso);
    $imageMini = str_replace("/upload/", "/mini/", $image);
    echo 
    <<<x
    <article>
        <h3><a href="$url.php">$titre</a></h3>
        <p>$contenu</p>
        <img src="$imageMini" alt="$titre">
    </article>

    x;
}
?>
</section>

```

    PAUSE ET REPRISE A 16H...
    ET ENSUITE JE VOUS LAISSE LA MAIN...

    








































