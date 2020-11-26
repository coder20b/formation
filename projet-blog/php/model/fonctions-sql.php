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
    
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

}

// OPTIONNELLE: ON PEUT NE PAS AJOUTER LA BALISE FERMANTE PHP
