<?php

// NOTRE CODE POUR DBAL
// DEVRAIT FOURNI DE BASE AU DEVELOPPEUR

// ON VA CREER UNE CLASSE
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

// ETAPE 1: DEFINITION
function envoyerRequeteSql ($requeteSQL, $tabAsso)
{
    // CONNEXION AVEC LA DATABASE MySQL
    $user       = Model::$user;
    $password   = Model::$password;             // SUR XAMPP
    $hostSQL    = Model::$hostSQL;              // 127.0.0.1
    $portSQL    = Model::$portSQL;
    $database   = Model::$database;             // LE SEUL A CHANGER EN LOCAL A CHAQUE PROJET
    
    $mysql        = "mysql:host=$hostSQL;port=$portSQL;dbname=$database;charset=utf8";
    
    try {
        // ON VA SEULEMENT GARDER UNE SEULE CONNEXION AVEC MySQL
        // POUR LE MOMENT $dbh EST UNE VARIABLE LOCALE
        // => CREE ET DETRUITE A CHAQUE APPEL DE LA FONCTION
        // => ON VA UTILISER UNE PROPRIETE DE CLASSE
        if (Model::$dbh == null) {
            // ON N'A PAS ENCORE OUVERT DE CONNEXION
            // ON VA CREER UNE CONNEXION
            Model::$dbh = new PDO($mysql, $user, $password);   // CONNEXION ENTRE PHP ET MySQL
            // MAINTENANT QU'ON A UNE CONNEXION Model::$dbh != null
        }

        $sth = Model::$dbh->prepare($requeteSQL);          // ON FOURNIT NOTRE REQUETE SQL PREPAREE (AVEC LES TOKENS)
        $sth->execute($tabAsso);                    // ON EXECUTE NOTRE REQUETE SQL (AVEC LE TABLEAU ASSO ET LES VALEURS)
    

        // DEBUG
        Model::stockerRequete($sth);

        // POUR LA LECTURE: ON A BESOIN D'ETAPES SUPPLEMENTAIRES
        // QUI VONT CONTINUER A UTILISER $sth 
        // => ON FAIT UN return EN SORTIE
        return $sth;

    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

}

// ON FOURNIT 
// EN PREMIER PARAMETRE LE NOM DE LA TABLE
// EN 2E PARAMETRE LE TABLEAU ASSO AVEC LES COLONNES ET LES VALEURS A AJOUTER
// PROTECTION CONTRE LES INJECTIONS SQL
// => MISE EN QUARANTAINE DES INFOS EXTERIEURES DANS UN TABLEAU ASSOCIATIF
function insererLigne ($table, $tabAsso)
{
    $listeColonne = "";
    $listeToken   = "";
    foreach($tabAsso as $cle => $valeur)
    {
        $listeColonne .= ",$cle";
        $listeToken   .= ",:$cle";
    }
    // astuce, on vire la virgule en trop
    // https://www.php.net/manual/fr/function.trim.php
    $listeColonne = trim($listeColonne, ",");
    $listeToken   = trim($listeToken, ",");

    $requeteSQL = 
    <<<x
    
    INSERT INTO $table 
    ($listeColonne) 
    VALUES 
    ($listeToken);
    
    x;
        
    // ETAPE 2: APPEL DE LA FONCTION
    $resultat = envoyerRequeteSql($requeteSQL, $tabAsso);
    return $resultat;
}

// SELECT * FROM `article` WHERE id = 4
function lireLigne ($table, $colonne, $valeurFiltre)
{
    $requeteSQL =
    <<<x
    
    SELECT * FROM $table
    WHERE $colonne = '$valeurFiltre'

    x;

    $resultat = envoyerRequeteSql($requeteSQL, []);
    $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);  // ON VA OBTENIR UN TABLEAU DE TABLEAUX ASSOCIATIFS

    return $tabLigne;       // RESULTAT ON RENVOIE LE TABLEAU DE LIGNES SELECTIONNEES

}

function lireTable ($table, $tri)
{
    $requeteSQL =
    <<<x
    SELECT * FROM $table
    ORDER BY $tri

    x;
    // COOL JE VAIS REUTILISER MA FONCTION envoyerRequeteSql
    $resultat = envoyerRequeteSql($requeteSQL, []);
    // https://www.php.net/manual/fr/pdostatement.fetchall.php
    // EN JS    objet.methode()
    // EN PHP   $objet->methode()
    $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);  // ON VA OBTENIR UN TABLEAU DE TABLEAUX ASSOCIATIFS
    return $tabLigne;       // RESULTAT ON RENVOIE LE TABLEAU DE LIGNES SELECTIONNEES
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
            [titre] => article 1
            [image] => assets/img/article1.jpg
            [contenu] => contenu article 1
            [datePublication] => 2020-11-27 10:19:28
        )

    [1] => Array
        (
            [id] => 2
            [titre] => article 2
            [image] => assets/img/article2.jpg
            [contenu] => contenu article 2
            [datePublication] => 2020-11-27 10:20:17
        )

    [2] => Array
        (
            [id] => 3
            [titre] => article 3
            [image] => assets/img/article3.jpg
            [contenu] => contenu article 3
            [datePublication] => 2020-11-27 10:20:48
        )

)
    */


function supprimerLigne($table, $id)
{
    // CREER LA REQUETE SQL
    // https://sql.sh/cours/delete
    // ATTENTION: NE PAS OUBLIER LA CLAUSE WHERE 
    // POUR SELECTIONNER SEULEMENT LA LIGNE A SUPPRIMER
    $requeteSQL =
    <<<x
    DELETE FROM `$table`
    WHERE id = :id
    x;

    // ENVOYER LA REQUETE SQL
    $resultat = envoyerRequeteSql($requeteSQL, [ "id" => $id ]);
    return $resultat;
}


function modifierLigne ($table, $id, $tabAsso)
{
    $id = intval($id);  // SECURITE

    $listeColonne = "";
    foreach($tabAsso as $colonne => $valeur)
    {
        $listeColonne .= ", $colonne = :$colonne";
    }    
    // on a une virgule en trop
    // https://www.php.net/manual/fr/function.trim.php
    $listeColonne = trim($listeColonne, ",");   // on enleve la virgule en trop

    // CREER LA REQUETE SQL
    // https://sql.sh/cours/update
    // ATTENTION: NE PAS OUBLIER LA CLAUSE WHERE 
    // POUR SELECTIONNER SEULEMENT LA LIGNE A MODIFIER
    $requeteSQL =
    <<<x
    
    UPDATE $table
    SET
        $listeColonne
    WHERE
        id = $id    
    x;

    // ENVOYER LA REQUETE
    $resultat = envoyerRequeteSql($requeteSQL, $tabAsso);
    return $resultat;
}



// OPTIONNEL: ON PEUT NE PAS AJOUTER LA BALISE FERMANTE PHP
