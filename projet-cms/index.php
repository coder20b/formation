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


$urlDemandee = lireUri();

// echo "PHP DOIT CREER LA PAGE $urlDemandee";
// POUR CREER UNE PAGE ON ASSEMBLES LES FICHIERS DANS LE DOSSIER php/view
// SI URL DEMANDEE index
// ALORS ON COMPOSE AVEC  header, section-index, footer
// SI URL DEMANDEE galerie
// ALORS ON COMPOSE AVEC  header, section-galerie, footer
// SI URL DEMANDEE contact
// ALORS ON COMPOSE AVEC  header, section-contact, footer

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
}



// ON CHARGE LE CODE DES FICHIERS php/view
foreach($tabTemplate as $fichierView)
{
    require_once "php/view/$fichierView.php";
}

