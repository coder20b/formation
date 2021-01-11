<?php

class CliCommande
{
    // METHODES STATIC
    static function afficherDate ()
    {
        echo date("H:i:s");
    }

    static function afficherJour ()
    {
        echo date("Y-m-d");
    }

    static function creerClasse ()
    {
        global $argv;
        $nomClasse = $argv[2] ?? "";  // LE NOM DE LA CLASSE EST PASSE EN PARAMETRE DE LA LIGNE DE COMMANDE

        if ($nomClasse != "")
        {
            // CETTE COMMANDE VA CREER LE CODE POUR UNE CLASSE
            $code = file_get_contents("php/controller/Vide.php");

            // FILTRER POUR CHANGER LE CODE DE Vide EN MaClasse
            $code = str_replace("Vide", "$nomClasse", $code);

            file_put_contents("php/controller/$nomClasse.php", $code);

        }

    }

    static function ajouterLigneSql ()
    {
        // CODE POUR INSERER DES LIGNES SQL...
    }
    
}