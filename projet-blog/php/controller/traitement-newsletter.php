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

       require_once "php/model/fonctions-sql.php";

        $tabAsso = [
            "nom"               => $nom,
            "email"             => $email,
            "dateInscription"   => $dateInscription,
        ];
        insererLigne("newsletter", $tabAsso);
       
        $message =
        <<<x
        $nom,$email,$date

        x;

        envoyerEmail("test@applh.com", "nouveau inscrit", $message);

        echo "<p>nous vous envoyons un mail de newsletter rapidement.</p>";

    }
    else 
    {
        // SCENARIO HACK
        echo "<h1>MERCI DE NE PAS HACKER MON SITE</h1>";
    }

}

?>