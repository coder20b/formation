<?php

// DEBUG
// print_r VA AFFICHER LE CONTENU D'UN TABLEAU
// $_GET $_POST $_REQUEST SONT DES TABLEAUX ASSOCIATIFS QUI SONT CREES PAR PHP
// ET QUI SONT REMPLIS PAR PHP AUSSI

// echo "<h3>TABLEAU GET</h3>";
// print_r($_GET);

// echo "<h3>TABLEAU POST</h3>";
// print_r($_POST);

// echo "<h3>TABLEAU REQUEST</h3>";
// print_r($_REQUEST);

// 2 SCENARIOS
if (count($_POST) == 0) // 0 ELEMENT => TABLEAU VIDE
{
    // SCENARIO 1: J'ARRIVE SUR LA PAGE
    // DEBUG
    echo "<h4>merci de remplir le formulaire</h4>";
}
else
{
    // SCENARIO 2: 
    // LE VISITEUR A REMPLI LE FORMULAIRE 
    // ET A CLIQUE SUR LE BOUTON POUR L'ENVOYER
    // JE RECOIS LES INFOS DU FORMULAIRE

    // IL FAUT TRAITER LES INFOS DU FORMULAIRE
    // ENVOYER LES INFOS PAR MAIL
    // https://www.php.net/manual/fr/function.mail.php
    require_once "php/controller/fonctions.php";

    $nom         = filtrer("nom");
    $email       = filtrer("email");
    $message     = filtrer("message");
    $dateMessage = date("Y-m-d H:i:s"); // FORMAT DATETIME POUR SQL

    if ( ($nom != "") && ($email != "") && ($message != "") )
    {
        // PROTECTION CONTRE LES INJECTIONS SQL
        // => MISE EN QUARANTAINE DES INFOS EXTERIEURES DANS UN TABLEAU ASSOCIATIF
        $tabAsso = [
            "nom"               => $nom,
            "email"             => $email,
            "message"           => $message,
            "dateMessage"       => $dateMessage,
        ];
        
        $requeteSQL = 
        <<<x
        
        INSERT INTO contact 
        (nom, email, message, dateMessage) 
        VALUES 
        (:nom, :email, :message, :dateMessage);
        
        x;
        
        require_once "php/model/fonctions-sql.php";
        // ETAPE 2: APPEL DE LA FONCTION
        envoyerRequeteSql($requeteSQL, $tabAsso);

        $mail = 
        <<<texte
        message reçu sur le site.
        
        nom: $nom
        email: $email
        message:
        $message
        ------
    
        texte;
    
        $headers =  'From: contact@monsite.fr' . "\r\n" .
                    'Reply-To: no-reply@monsite.fr' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
    
        @mail("test@applh.com", "nouveau message", $mail, $headers);
    
        // EN localhost ERREUR CAR PAS DE SERVEUR EMAIL
        // Warning : mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port"
        
        // AFFICHER UN MESSAGE DE CONFIRMATION
        echo "<h4>Nous avons bien reçu votre message. Nous vous répondrons dans les meilleurs délais</h4>";
    
    }
    else
    {
        echo "<h1>merci de ne pas hacker mon site</h1>";
    }


}

?>