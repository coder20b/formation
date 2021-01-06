<?php
// AUTEUR: LONG HAI
// DATE: %DATE%

// LA CLASSE Controller
class Controller 
{
    // PROPRIETES

    // METHODE
    // ON DECLENCHE LE CONSTRUCTEUR QUAND ON FAIT new Controller
    function __construct ()
    {

    }

    // EXTRAIRE LA PARTIE filename DANS L'URL
    static function lireUri ()
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

    static function filtrer ($name)
    {
        // Notice: Undefined index: email
        $resultat = $_POST[$name] ?? ""; // TEXTE VIDE PAR DEFAUT CONTRE HACK
    
        // strip_tags ENLEVER LES BALISES HTML ET PHP
        // https://www.php.net/manual/fr/function.strip-tags.php
        $resultat = strip_tags($resultat);
        
        // trim => ENLEVE LES ESPACES AU DEBUT ET A LA FIN
        // https://www.php.net/manual/fr/function.trim.php
        $resultat = trim($resultat);
    
        return $resultat;
    }

    static function filtrerCamelCase ($name)
    {
        $nom = filtrer($name);
        // EN PLUS ON RAJOUTE UN FILTRE SUPPLEMENTAIRE
        // POUR NE GARDER QUE LES LETTRES (minuscules ou MAJUSCULES) ET LES CHIFFRES
        // https://www.php.net/manual/fr/function.preg-replace.php
        // https://regex101.com/
        // astuce: supprimer c'est comme remplacer par du texte vide
        $nom = preg_replace("/[^a-zA-Z0-9]/", "", $nom);
        return $nom;
    }

    static function envoyerEmail ($destinataire, $titre, $message)
    {
        $headers =  'From: contact@monsite.fr' . "\r\n" .
        'Reply-To: no-reply@monsite.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        @mail($destinataire, $titre, $message, $headers);
        // EN localhost ERREUR CAR PAS DE SERVEUR EMAIL
        // Warning : mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port"

    }


}