<?php

// DEBUG
echo "JE SUIS INDEX.PHP";

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
    extract($tabUrl	);  // CREE LES VARIABLES $path, ...

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


$uriDemandee = lireUri();

echo "<hr>PHP DOIT CREER LA PAGE $uriDemandee";