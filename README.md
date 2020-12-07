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

    lundi 07/12

https://prod.liveshare.vsengsaas.visualstudio.com/join?207395E940E8A967A8B49EF5ECD636838090


## Blockly

    concurrent de Scrath par Google.
    Pour développer en mode puzzle et glisser/déposer.
    Avec générateur de code.

    https://developers.google.com/blockly

## Questions ?

## RESUME DES EPISODES PRECEDENTS

    CRUD
    => FONDAMENTAUX
    => CREER NOTRE PROPRE FRAMEWORK MVC

    TECHNIQUES MODERNES/AVANCEES    => PROJET CMS
    => ROUTEUR (EN PHP)
    => POO (EN PHP)
    => AJAX (EN JS ET PHP)
    => SQL RELATIONS ENTRE TABLES (SQL)

    CHOIX ENTRE LARAVEL OU SYMFONY ?
    => DECIDER AVANT MI DECEMBRE...

    MON CONSEIL => LARAVEL

    LARAVEL
    * FRAMEWORK MVC
    * PLUS POPULAIRE AU NIVEAU MONDIAL
    * PLUS SIMPLE A UTILISER
    * PLUS FACILE POUR LES DEBUTANTS
    * TECHNO PLUS MODERNES

    SYMFONY
    * FRAMEWORK MVC
    * PLUS POPULAIRE EN FRANCE (PARCE QUE L'EQUIPE DE DEV EST FRANCAISE...)
    * PLUS COMPLIQUE A UTILISER
    * PLUS DIFFICILE POUR LES DEBUTANTS
    * UN PEU A LA TRAINE SUR LES DERNIERES TECHNOS


    PROJET BLOG
    PROJET CMS

## ROUTEUR EN PHP

    SUR LE PROJET BLOG
    UNE PAGE => UN FICHIER PHP
    => PAS UTILISABLE SUR DES GROS PROJETS (1.000 PAGES...)

    => ON A BESOIN D'UNE TECHNIQUE QUI PERMET DE CREER DES PAGES SANS CREER DE FICHIER PHP
    => POINT D'ENTREE UNIQUE    index.php
    => CE SEUL FICHIER PHP VA CREER TOUTES LES PAGES DU SITE
    => FRONT CONTROLLER ET ROUTEUR

    => ON VA MODIFIER LE COMPORTEMENT DE APACHE
    => GRACE AU FICHIER .htaccess
    => SI LE NAVIGATEUR DEMANDE UNE URL QUI N'EXISTE PAS
        DIRE A APACHE DE DELEGUER LE TRAVAIL A PHP AVEC index.php


    UTILISE PAR LES FRAMEWORKS ET CMS (LARAVEL, SYMFONY, WORDPRESS, etc...)

    https://wordpress.org/support/article/htaccess/

    AJOUTER UN FICHIER .htaccess A LA RACINE DU SITE
    => DELEGUER LE TRAVAIL A PHP (RE-ECRITURE D'URL)
    AJOUTER DU CODE PHP POUR EXTRAIRE LES URI DE L'URL DEMANDEE PAR LE NAVIGATEUR

    ON CASSE LE LIEN ENTRE URL ET CHEMIN VERS UN DOSSIER OU UN FICHIER SUR NOTRE SERVEUR WEB
    => INTERESSANT POUR LA SECURITE
    => REFERENCEMENT 
        => ON PEUT FAIRE CROIRE A GOOGLE QU'ON A UN SITE AVEC UN NOMBRE INFINI DE PAGES
        => ATTENTION AU DUPLICATE CONTENT
        => IL FAUT GERER LES ERREURS 404 AVEC PHP MAINTENANT...

```
# CHANGER LE PARAMETRAGE D'APACHE

# https://wordpress.org/support/article/htaccess/
# BEGIN WordPress

# MODULE DE RE-ECRITURE D'URL (PAS UNE REDIRECTION...)
RewriteEngine On

# SUR UN VRAI SITE
# RewriteBase /

# SI DANS MON NAVIGATEUR
# http://localhost:8888/formation/projet-cms/
# NOUS DANS NOTRE CAS, ON A DES SOUS-DOSSIERS
# SEULE LIGNE A MODIFIER POUR NOUS ;-p
RewriteBase /formation/projet-cms/

# https://httpd.apache.org/docs/2.4/mod/mod_rewrite.html
# SI LE NAVIGATEUR DEMANDE COMME URL index.php ALORS ON UTILISE index.php
RewriteRule ^index\.php$ - [L]

# SI LE NAVIGATEUR DEMANDE UNE URL QUI NE CORRESPOND A UN FICHIER (-f)
RewriteCond %{REQUEST_FILENAME} !-f

# SI LE NAVIGATEUR DEMANDE UNE URL QUI NE CORRESPOND A UN DOSSIER (-d)
RewriteCond %{REQUEST_FILENAME} !-d

# ALORS APACHE DELEGUE LA REPONSE A index.php
RewriteRule . ./index.php [L]

# END WordPress

```

```php
<?php

function lireUri ()
{
    // PHP SE RETROUVE A GERER LE BOULOT D'APACHE
    // => CODE A RAJOUTER EN PHP POUR FAIRE LA MEME CHOSE
    // => PHP DOIT SAVOIR L'URL DEMANDEE PAR LE NAVIGATEUR
    // http://localhost:8888/formation/projet-cms/contact.php       => contact
    // http://localhost:8888/formation/projet-cms/galerie.php       => galerie
    // http://localhost:8888/formation/projet-cms/blog.php          => blog
    // ... 
    // ON DOIT DECOUPER L'URL POUR EXTRAIRE LE NOM DE LA PAGE A AFFICHER

    // POINT DE DEPART $_SERVER["REQUEST_URI"]
    // https://www.php.net/manual/fr/reserved.variables.server.php

    $uri = $_SERVER["REQUEST_URI"]; // PB: ON A AUSSI LES PARAMETRES GET... 
    // https://www.php.net/manual/fr/function.parse-url.php
    $tabUrl = parse_url($uri);  // CREE UN TABLEAU ASSOCIATIF AVEC LES PARTIE DE L'URL
    extract($tabUrl);  // CREE LES VARIABLES $path, ...

    // CAS SPECIAL A GERER
    // http://localhost:8888/formation/projet-cms/
    // DOIT ETRE TRADUIT PAR
    // http://localhost:8888/formation/projet-cms/index.php
    // => BRICOLAGE SIMPLE
    // SI L'URL FINIT PAR / ALORS JE COMPLETE AVEC index.php
    // https://www.php.net/manual/fr/function.substr
    if (substr($path, -1) == "/")
    {
        $path = $path . "index.php";
    }

    // https://www.php.net/manual/fr/function.pathinfo.php
    $tabChemin = pathinfo($path);
    extract($tabChemin);    // CREE LES VARIABLES $filename, ...

    return $filename;
}

```

    PAUSE ET REPRISE A 11H15...

## EXERCICE EN AUTONOMIE: READ SUR LA TABLE SQL page

    COMPLETER LE CODE DE MANIERE A POUVOIR CREER DES PAGES
    EN AJOUTANT DES LIGNES DANS LA TABLE SQL page (AVEC PHPMYADMIN EN ATTENDANT)
    ET ENSUITE AFFICHER AVEC LE NAVIGATEUR LA PAGE
        (LE TEMPLATE DEVRA AFFICHER LE TITRE, LE CONTENU ET L'IMAGE...)

    AUTONOMIE JUSQU'A 12H45...
    * SI VOUS AVEZ DES QUESTIONS, N'HESITEZ PAS...

    ET ENSUITE PAUSE DEJEUNER A 12H45...
    ET REPRISE A 13H50        
    BON APP ;-p

    * VERSION READ SUR TABLE SQL page

```php
<?php

// LA PAGE DEMANDEE N'EST PAS DANS LE TABLEAU DU ROUTEUR
// ON VA ESSAYER AVEC SQL
// ON VA CREER UNE DATABASE cms AVEC CHARSET utf8mb4_general_ci
//  ET DEDANS ON VA CREER UNE TABLE SQL page
//  AVEC COMME COLONNES
//  id          INT             INDEX=PRIMARY   A_I(AUTO_INCREMENT)
//  url         VARCHAR(160)
//  template    VARCHAR(160)
//  titre       VARCHAR(160)
//  contenu     TEXT
//  image       VARCHAR(160)
//  ...
// Create Read Update Delete
// => JE VEUX RETROUVER DANS LA TABLE SQL LA LIGNE 
//      DONT LA COLONNE url CORRESPOND A $urlDemandee
// => READ AVEC COMME CRITERE DE SELECTION LA COLONNE $urlDemandee
// => ON A NOTRE FONCTION lireLigne
// $tabLigne = lireLigne("page", "url", $urlDemandee);
// => EXTRAIRE $template DE LA COLONNE SQL template

// => ON A BESOIN D'UN ROUTEUR
$tabRouteur = [
    // CLE = URL            VALEUR = LES FICHIERS php/view
    "index"             => [ "header", "section-index",     "footer" ],     // ROUTE index
    "galerie"           => [ "header", "section-galerie",   "footer" ],     // ROUTE galerie
    "blog"              => [ "header", "section-blog",      "footer" ],     // ROUTE blog
    "contact"           => [ "header", "section-contact",   "footer" ],     // ROUTE contact
    "page-speciale"     => [ "template-page" ]
];

// A PARTIR DE L'URL DEMANDEE, JE VAIS CHERCHER LA LISTE DES FICHIERS php/view
$tabTemplate = $tabRouteur[$urlDemandee] ?? [];

if (empty($tabTemplate))
{

    require_once "php/model/fonctions-sql.php";
    $tabLigne = lireLigne("page", "url", $urlDemandee);
    foreach($tabLigne as $ligneAsso)    // NOTE: UN PEU INUTILE CAR UN SEUL ELEMENT DANS LE TABLEAU
    {
        extract($ligneAsso);            // ASTUCE: CREER LES VARIABLES A PARTIR DES NOMS DE COLONNES
        // => CREE $id, $url, $template, $titre, $contenu, $image
        $tabTemplate = [ $template ];
    }
}

```


## CODINGAME & ISOGRAD

    * CODING GAME
    https://www.codingame.com/start

    * BATTLEDEV, CONCOURS MEILLEUR DEV, etc...
    https://www.isograd.com/FR/solutionconcours.php

## READ SUR LA TABLE SQL page

    AUTONOMIE JUSQU'A 15H45
    * N'HESITEZ PAS A POSER DES QUESTIONS

## CREER UNE PAGE CRUD POUR LA TABLE SQL page

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

    * NE PAS HESITER A POSER DES QUESTIONS
    AUTONOMIE JUSQU'A 15H45
    ET ENSUITE PAUSE DE 15H45 A 16H
    ET POUR LE RESTE AUTONOMIE JUSQU'A LA FIN DE LA JOURNEE
    




