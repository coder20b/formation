<?php

// EXTRAIRE LA PARTIE filename DANS L'URL
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



// CLASSE Form
class Form 
{
    // PROPRIETE DE CLASSE
    static $tabErreur = []; // tableau vide au départ
    // PARAMETRES POUR UPLOAD
    static $listeExtensionOk    = [ "jpg", "jpeg", "png", "gif", "webp", "svg" ];
    static $tailleMax           = 1024 * 1024 * 10;  // 10 Mo
    static $listeExtensionMini  = [ "jpg", "jpeg" ]; // , "png", "gif", "webp"

    // METHODE DE CLASSE
    static function estOK ()
    {
        // LE FORMULAIRE EST OK SI AUCUNE ERREUR N'A ETE STOCKEE
        $resultat = false;  // MODE PARANO
        if(count(Form::$tabErreur) == 0)
        {
            $resultat = true;
        }

        return $resultat;
    }

    static function filtrerEmail ($name)
    {
        $resultat = filtrer($name);
        if ($resultat == "")
        {
            Form::$tabErreur[] = "$name EST OBLIGATOIRE";
        }
        else if (false === filter_var($resultat, FILTER_VALIDATE_EMAIL))
        {
            // https://www.php.net/manual/fr/function.filter-var
            Form::$tabErreur[] = "$name EST UN EMAIL INCORRECT";
        }
        
        return $resultat;
    }

    static function filtrerEntier ($name)
    {
        $resultat = filtrer($name);
        if ($resultat == "")
        {
            Form::$tabErreur[] = "$name EST OBLIGATOIRE";
        }
        $resultat = intval($resultat);  // CONVERTIR EN ENTIER
        return $resultat;
    }

    static function filtrerTexte ($name)
    {
        $resultat = filtrer($name);
        if ($resultat == "")
        {
            Form::$tabErreur[] = "$name EST OBLIGATOIRE";
        }
        return $resultat;
    }

    static function filtrerUpload ($name)
    {
        $resultat = "";
        if ($_FILES[$name] ?? false)
        {
            $tabUpload = $_FILES[$name];
            extract($tabUpload);
            if ($error == 0)
            {
                $tabInfoFichier = pathinfo($name);
                extract($tabInfoFichier);
                $extension = strtolower($extension);    // CONVERTIT EN minuscules
                if (in_array($extension, Form::$listeExtensionOk)) 
                {
                    if ($size <= Form::$tailleMax)
                    {
                        $filename = strtolower(preg_replace("/[^a-zA-Z0-9-]/", "", $filename)); // A COMPLETER

                        $cheminFinal = "assets/upload/$filename.$extension"; 
                        // ON POURRAIT CHANGER LE NOM DU FICHIER (NE PAS GARDER LE NOM D'ORIGINE...)
                        // $cheminFinal = "assets/upload/logement_" . time() . ".$extension";

                        move_uploaded_file(
                            $tmp_name, 
                            $cheminFinal
                        );
                        // OK LE FICHIER EST DISPONIBLE
                        $resultat = $cheminFinal;

                        // SI LE FICHIER EST UNE IMAGE
                        if (in_array($extension, Form::$listeExtensionMini))
                        {
                            // ALORS JE CREE UNE MINIATURE AVEC LE MEME NOM MAIS DANS UN DOSSIER mini
                            $cheminMini = str_replace("/upload/", "/mini/", $cheminFinal);
                            // SI ON VEUT CHANGER LE NOM
                            // $cheminMini = "assets/mini/logement_" . time() . ".$extension";
                            Form::creerMini($cheminFinal, $cheminMini, 640);
                        }
                    }
                    else
                    {
                        // JE STOCKE LES ERREURS DANS LE TABLEAU
                        Form::$tabErreur[] = "ERREUR: FICHIER TROP VOLUMINEUX";
                    }
                }
                else
                {
                    Form::$tabErreur[] = "ERREUR: EXTENSION INTERDITE";
                }
            }
            else
            {
                Form::$tabErreur[] = "ERREUR: UPLOAD CORROMPU";
            }
                
            // POUR LES IMAGES
            // OPTIMISATION: PEUT ETRE CREER DES MINIATURES ???
            // PHP PEUT CREER DES IMAGES...
        }
        else
        {
            Form::$tabErreur[] = "ERREUR: FICHIER MANQUANT";
        }

        return $resultat;
    }

    static function creerMini ($fichierSource, $fichierCible, $largeurCible)
    {
        $imageSource = imagecreatefromjpeg($fichierSource);
    
        if ($imageSource !== false)
        {
            // OK ON A UNE IMAGE CHARGEE
            // ON VA EXTRAIRE LA LARGEUR ET LA HAUTEUR DE L'IMAGE SOURCE
            // https://www.php.net/manual/fr/function.imagesx.php
            // https://www.php.net/manual/fr/function.imagesy.php
            $largeurSource = imagesx($imageSource);     // exemple: 1000
            $hauteurSource = imagesy($imageSource);     // exemple: 2000
        
            $hauteurCible = $hauteurSource * $largeurCible / $largeurSource ; // exemple: 2000 * 300 / 1000 = 600
        
            // https://www.php.net/manual/fr/function.imagecreatetruecolor.php
            $imageCible = imagecreatetruecolor($largeurCible, $hauteurCible);   // image vide
        
            // https://www.php.net/manual/en/function.imagecopyresampled
            imagecopyresampled(
                $imageCible, $imageSource,
                0, 0,
                0, 0,
                $largeurCible, $hauteurCible,
                $largeurSource, $hauteurSource
            );
            // https://www.php.net/manual/en/function.imagejpeg.php
            imagejpeg($imageCible, $fichierCible);
        }
        else
        {
            // KO LE FICHIER N'EST PAS UNE IMAGE JPEG
        }
    }
    
}

function filtrer ($name)
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

function filtrerCamelCase ($name)
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

function envoyerEmail ($destinataire, $titre, $message)
{
    $headers =  'From: contact@monsite.fr' . "\r\n" .
    'Reply-To: no-reply@monsite.fr' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    @mail($destinataire, $titre, $message, $headers);
    // EN localhost ERREUR CAR PAS DE SERVEUR EMAIL
    // Warning : mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port"

}

