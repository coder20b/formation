<?php

class Model
{
    // PROPRIETES DE CLASSE (static)
    // UNE PROPRIETE EST UNE VARIABLE RANGEE DANS UNE CLASSE

    static $dbh = null;
    static $tabRequete = [];

    static $user       = 'root';
    static $password   = '';           // SUR XAMPP
    static $hostSQL    = 'localhost';  // 127.0.0.1
    static $portSQL    = '3306';
    static $database   = '';       // LE SEUL A CHANGER EN LOCAL A CHAQUE PROJET

    // METHODES DE CLASSE (static)
    // UNE METHODE EST UNE FONCTION RANGEE DANS UNE CLASSE
    static function stockerRequete ($sth)
    {
        // MAL FAIT: AFFICHE DIRECTEMENT AU LIEU DE PRODUIRE UN TEXTE
        // https://www.php.net/manual/fr/pdostatement.debugdumpparams.php
        // ASTUCE: ON VA DETOURNER L'AFFICHAGE POUR LE RECUPERER DANS UNE VARIABLE
        // https://www.php.net/manual/fr/function.ob-start.php
        ob_start();                 // COMMENCE A DETOURNER L'AFFICHAGE
        $sth->debugDumpParams();    // AFFICHAGE DETOURNE
        $texte = ob_get_clean();    // FIN DU DETOURNEMENT

        // ON VA MEMORISER LE TEXTE POUR L'AFFICHER PLUS TARD
        Model::$tabRequete[] = $texte;
    }

    // NOTE: NORMALEMENT CETTE METHODE DEVRAIT ETRE DANS LA PARTIE VIEW...
    static function afficherDebug ()
    {
        // DEBUG DES INFOS RECUES PAR LES FORMULAIRES
        $nbInfo = count($_REQUEST);
        echo "$nbInfo INFOS RECUES PAR LES FORMULAIRES\n";
        print_r($_REQUEST); // GET ET POST
        print_r($_FILES);   // FICHIERS UPLOADES
        echo "\n";

        // ON PEUT RECUPERER LES TEXTES STOCKES DANS LE TABLEAU
        // ON VA AFFICHER CHAQUE TEXTE STOCKE DANS LE TABLEAU
        // => BOUCLE AVEC foreach
        $nbRequete = count(Model::$tabRequete);
        echo "IL Y A EU $nbRequete REQUETES SQL POUR CETTE PAGE\n";
        foreach(Model::$tabRequete as $indice => $requete)
        {
            echo 
            <<<x
            ------- requete SQL $indice -------
            $requete

            x;

        }        
    }

    static function compterLigne($table)
    {
        // https://sql.sh/fonctions/agregation/count
        // PRATIQUE SI ON VEUT JUSTE COMPTER LE NOMBRE DE LIGNE
        $requeteSQL = 
        <<<x
        SELECT count(*) FROM $table;
        x;

        $resultat = envoyerRequeteSql($requeteSQL, []);
        // RACCOURCI: POUR OBTENIR LE RESULTAT DIRECTEMENT
        // https://www.php.net/manual/fr/pdostatement.fetchcolumn.php
        $nbLigne = $resultat->fetchColumn();
        return $nbLigne;
    }

    // PERMET DE RETROUVER L'id QUE SQL VIENT DE CREER POUR LA NOUVELLE LIGNE
    static function lireNouvelId ()
    {
        // https://www.php.net/manual/fr/pdo.lastinsertid.php
        $nouvelId = Model::$dbh->lastInsertId();
        return $nouvelId;
    }
} 
