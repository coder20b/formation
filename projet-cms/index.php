<?php

// CHARGE MES FONCTIONS
require_once "php/model/fonctions-sql.php";
require_once "php/view/fonctions-affichage.php";
require_once "php/controller/fonctions.php";

// FICHIER DE CONFIGURATION A PART
// AMELIORATION POUR MISE EN LIGNE 
// => PERMET DE GARDER LES INFOS DE CONNEXION A PART POUR CHAQUE HEBERGEMENT
require_once "../config-cms.php";

// A PARTIR D'ICI JE PEUX APPELER TOUTES MES FONCTIONS

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


    $tabLigne = lireLigne("page", "url", $urlDemandee);
    foreach($tabLigne as $ligneAsso)    // NOTE: UN PEU INUTILE CAR UN SEUL ELEMENT DANS LE TABLEAU
    {
        extract($ligneAsso);            // ASTUCE: CREER LES VARIABLES A PARTIR DES NOMS DE COLONNES
        // => CREE $id, $url, $template, $titre, $contenu, $image
        $tabTemplate = [ $template ];
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
                [url] => produits
                [template] => template-page
                [titre] => produits
                [contenu] => la description de mes produits
                [image] => assets/img/produits.jpg
            )

    )
    */
}



// ON CHARGE LE CODE DES FICHIERS php/view
foreach($tabTemplate as $fichierView)
{
    require_once "php/view/$fichierView.php";
}

