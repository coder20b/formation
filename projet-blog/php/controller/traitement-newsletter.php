<?php
// 2 SCENARIOS
// SCENARIO 1: LE VISITEUR VIENT D'ARRIVER
// SCENARIO 2: LE VISITEUR VIENT DE REMPLIR LE FORMULAIRE
if (count($_POST) == 0)
{
    // SCENARIO 1
    echo "<p>merci de remplir le formulaire.</p>";
}
else
{
    // SCENARIO 2
    // AJOUTER LE CODE POUR ENREGISTRER LES INFOS
    // => ENREGISTRER LES INFOS DANS UN FICHIER newsletter.txt

    require_once "php/controller/fonctions.php";

    // CREER UNE FONCTION POUR FILTRER LES INFOS DE FORMULAIRES
    // RECUPERER LES INFOS
    // <input name="email">
    $email  = filtrer("email");    
    // <input name="nom">
    $nom    = filtrer("nom");

    // https://www.php.net/manual/fr/function.date-default-timezone-set.php
    date_default_timezone_set('Europe/Paris');
    $dateInscription = date("Y-m-d H:i:s"); // FORMAT DATETIME POUR SQL

    // ON NE FAIT LE RESTE DU CODE QUE SI LES INFOS NE SONT PAS VIDES
    if (($email != "") && ($nom != ""))
    {
        // COMPLETER LES INFOS
        // https://www.php.net/manual/fr/function.date.php
        $date = date("Y-m-d H:i:s");    // 2020-11-24 14:34:12

        // ----------- NOUVEAU CODE AVEC SQL ---------
        $tabAsso = [
            "nom"               => $nom,
            "email"             => $email,
            "dateInscription"   => $dateInscription,
        ];
        $requeteSQL = 
        <<<x
        
        INSERT INTO newsletter 
        (nom, email, dateInscription) 
        VALUES 
        (:nom, :email, :dateInscription);
        
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
            $sth = $dbh->prepare($requeteSQL);          // ON FOURNIT NOTRE REQUETE SQL PREPAREE (AVEC LES TOKENS)
            $sth->execute($tabAsso);                    // ON EXECUTE NOTRE REQUETE SQL (AVEC LE TABLEAU ASSO ET LES VALEURS)
        
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        
        // ----------- ANCIEN CODE -----------
        $message =
        <<<x
        $nom,$email,$date

        x;

        file_put_contents("php/model/newsletter.csv", $message, FILE_APPEND);

        $headers =  'From: contact@monsite.fr' . "\r\n" .
        'Reply-To: no-reply@monsite.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        @mail("test@applh.com", "nouveau inscrit", $message, $headers);

        echo "<p>nous vous envoyons un mail de newsletter rapidement.</p>";

    }
    else 
    {
        // SCENARIO HACK
        echo "<h1>MERCI DE NE PAS HACKER MON SITE</h1>";
    }

}

?>