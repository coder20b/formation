<?php

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
        require_once "php/model/fonctions-sql.php";
        $tabAsso = [
            "nom"               => $nom,
            "email"             => $email,
            "message"           => $message,
            "dateMessage"       => $dateMessage,
        ];
        insererLigne("contact", $tabAsso);        

        $mail = 
        <<<texte
        message reçu sur le site.
        
        nom: $nom
        email: $email
        message:
        $message
        ------
    
        texte;
    
        envoyerEmail("test@applh.com", "nouveau message", $mail);
            
        // AFFICHER UN MESSAGE DE CONFIRMATION
        echo "<h4>Nous avons bien reçu votre message. Nous vous répondrons dans les meilleurs délais</h4>";
    
    }
    else
    {
        echo "<h1>merci de ne pas hacker mon site</h1>";
    }


}

?>