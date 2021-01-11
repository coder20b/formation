<?php

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
        $resultat = Controller::filtrer($name);
        // PASSER LES CARACTERES EN MINUSCULES
        // https://www.php.net/manual/fr/function.strtolower.php
        $resultat = strtolower($resultat);
        
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
        $resultat = Controller::filtrer($name);
        if ($resultat == "")
        {
            Form::$tabErreur[] = "$name EST OBLIGATOIRE";
        }
        $resultat = intval($resultat);  // CONVERTIR EN ENTIER
        return $resultat;
    }

    static function filtrerTexte ($name)
    {
        $resultat = Controller::filtrer($name);
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
    

    static function verifierDispo ($nomTable, $colonne, $valeurCherche)
    {
        $nbLigne = Model::compterLigne($nomTable, $colonne, $valeurCherche);
        if ($nbLigne > 0) // DEJA PRIS
        {
            Form::$tabErreur[] = "ERREUR: $colonne DEJA PRIS AVEC $valeurCherche";
        }
    }
}
