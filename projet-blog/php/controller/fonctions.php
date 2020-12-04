<?php

// CLASSE Form
class Form 
{
    // PROPRIETE DE CLASSE
    static $tabErreur = []; // tableau vide au départ
    // PARAMETRES POUR UPLOAD
    static $listeExtensionOk    = [ "jpg", "jpeg", "png", "gif", "webp", "svg" ];
    static $tailleMax           = 1024 * 1024 * 10;  // 10 Mo

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
                        move_uploaded_file(
                            $tmp_name, 
                            $cheminFinal
                        );
                        // OK LE FICHIER EST DISPONIBLE
                        $resultat = $cheminFinal;
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

