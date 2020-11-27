<?php

// ETAPE 1: DEFINITION
function envoyerRequeteSql ($requeteSQL, $tabAsso)
{
    // CONNEXION AVEC LA DATABASE MySQL
    $user       = 'root';
    $password   = '';           // SUR XAMPP
    $hostSQL    = 'localhost';  // 127.0.0.1
    $portSQL    = '3306';
    $database   = 'blog';       // LE SEUL A CHANGER EN LOCAL A CHAQUE PROJET
    
    $mysql        = "mysql:host=$hostSQL;port=$portSQL;dbname=$database;charset=utf8";
    
    try {
        $dbh = new PDO($mysql, $user, $password);   // CONNEXION ENTRE PHP ET MySQL
        $sth = $dbh->prepare($requeteSQL);          // ON FOURNIT NOTRE REQUETE SQL PREPAREE (AVEC LES TOKENS)
        $sth->execute($tabAsso);                    // ON EXECUTE NOTRE REQUETE SQL (AVEC LE TABLEAU ASSO ET LES VALEURS)
    
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
    envoyerRequeteSql($requeteSQL, $tabAsso);

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


// OPTIONNEL: ON PEUT NE PAS AJOUTER LA BALISE FERMANTE PHP
