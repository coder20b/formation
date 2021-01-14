<?php

// => PROGRAMMATION ORIENTE OBJET
class Model
{
    // PROPRIETES DE CLASSE
    // UNE VARIABLE RANGEE DANS UNE CLASSE
    static $nombre = 0;
}

// PHP
// VARIABLES LOCALES AUX FONCTIONS
function afficherTexte ()
{
    // $texte EST UNE VARIABLE LOCALE A LA FONCTION afficherTexte
    $texte = "<h1>coucou</h1>";
    echo $texte;

    $nombre = 0;                // PHP RECREE LA VARIABLE LOCALE
    echo "<h1>$nombre</h1>";

    $nombre++;  // $nombre = 1
    // PHP ARRIVE A LA FIN DE LA FONCTION 
    // PHP DETRUIT $nombre

    echo "<h1>propriété " . Model::$nombre . "</h1>";
    Model::$nombre++;   // Model::$nombre = 1
    // AVANTAGE: LA PROPRIETE EXISTE EN DEHORS DE LA FONCTION
}

afficherTexte();    // PHP CREE ET DETRUIT LES VARIABLES LOCALES
afficherTexte();    // PHP CREE ET DETRUIT LES VARIABLES LOCALES

// echo $texte;    // ERREUR: LA VARIABLE $texte N'EXISTE PAS EN DEHORS DE L'APPEL DE LA FONCTION
// Notice: Undefined variable: texte 


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