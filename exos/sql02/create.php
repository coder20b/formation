<?php

$nom                = "test1010";               // FOURNI PAR LE FORMULAIRE
$email              = "test1010@me";            // FOURNI PAR LE FORMULAIRE
$dateInscription    = "2020-11-25 10:10:27";    // PHP QUI VA LE FOURNIR

$requeteSQL = 
<<<x

INSERT INTO newsletter 
(nom, email, dateInscription) 
VALUES 
('$nom', '$email', '$dateInscription');

x;

// CONNEXION AVEC LA DATABASE MySQL
$user       = 'root';
$password   = '';           // SUR XAMPP
$hostSQL    = 'localhost';  // 127.0.0.1
$portSQL    = '3306';
$database   = 'blog';       // LE SEUL A CHANGER EN LOCAL A CHAQUE PROJET

$mysql        = "mysql:host=$hostSQL;port=$portSQL;dbname=$database;charset=utf8";

try {
    $dbh = new PDO($mysql, $user, $password);   // CONNEXION ENTRE PHP ET MySQL
    $sth = $dbh->prepare($requeteSQL);          // ON FOURNIT NOTRE REQUETE SQL
    $sth->execute();                            // ON EXECUTE NOTRE REQUETE SQL

} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

