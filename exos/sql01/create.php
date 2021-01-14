<?php

// ON VA UTILISER PHP POUR CREER DU CODE SQL

// ON PEUT CREER UNE VARIABLE ET STOCKER DU CODE SQL COMME UN TEXTE


$nom                = "test1518";               // FOURNI PAR LE FORMULAIRE
$email              = "test1518@me";            // FOURNI PAR LE FORMULAIRE
$dateInscription    = "2020-11-25 15:18:27";    // PHP QUI VA LE FOURNIR

// CREATE: AJOUTER UNE NOUVELLE LIGNE
$requeteSQL = 
<<<x

INSERT INTO newsletter 
(nom, email, dateInscription) 
VALUES 
('$nom', '$email', '$dateInscription');

x;

// ENVOYER AU SERVEUR SQL MySQL/MariaDB

// PDO
// Php Data Object
// https://www.php.net/manual/fr/book.pdo.php
// https://www.php.net/manual/fr/pdo.construct.php

// INFOS DE CONNECTION ENTRE PHP ET SQL
// A CHANGER A CHAQUE PROJET
$user       = 'root';
$password   = '';     // SUR XAMPP
$database   = 'blog';
$hostSQL    = 'localhost';
$portSQL    = '3306';

// SUR IONOS
/*
Nom d'hôte
db5001228880.hosting-data.io

Port
3306
Nom d'utilisateur
dbu1245055

ET VOTRE MOT DE PASSE: WebForce3!
*/

// DSN Data Source Name
$mysql        = "mysql:dbname=$database;host=$hostSQL;port=$portSQL;charset=utf8";

try {
    // PROGRAMMATION ORIENTE OBJET
    // DataBase Handler => CONNEXION A MYSQL
    $dbh = new PDO($mysql, $user, $password);

    // TECHNIQUE EN 2 ETAPES PLUS SECURISEE
    // https://www.php.net/manual/fr/pdo.prepare.php
    // ON FOURNIT LA REQUETE SQL
    // Statement Handler => POUR GERER UNE REQUETE SQL
    // JE RANGE MA REQUETE DANS UN COLIS
    $sth = $dbh->prepare($requeteSQL);

    // https://www.php.net/manual/fr/pdostatement.execute.php
    // J'ENVOIE LE COLIS
    $sth->execute();

} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    // SI ON SE TROMPE DE DATABASE
    // Connexion échouée : SQLSTATE[HY000] [1049] Unknown database 'blogfjhgdfjkgh'
    // SI ON SE TROMPE DE MOT DE PASSE
    // Connexion échouée : SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES)
}













