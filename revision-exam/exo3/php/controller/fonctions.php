<?php

function filtrer ($name)
{
    // Notice: Undefined index: email
    // https://www.php.net/manual/fr/migration70.new-features.php
    // opérateur null coalescent ??
    $resultat = $_POST[$name] ?? ""; // TEXTE VIDE PAR DEFAUT CONTRE HACK

    // strip_tags ENLEVER LES BALISES HTML ET PHP
    // https://www.php.net/manual/fr/function.strip-tags.php
    $resultat = strip_tags($resultat);
    
    // trim => ENLEVE LES ESPACES AU DEBUT ET A LA FIN
    // https://www.php.net/manual/fr/function.trim.php
    $resultat = trim($resultat);

    return $resultat;
}

function filtrerCamelCase ($name)
{
    $nom = filtrer($name);
    // EN PLUS ON RAJOUTE UN FILTRE SUPPLEMENTAIRE
    // POUR NE GARDER QUE LES LETTRES (minuscules ou MAJUSCULES) ET LES CHIFFRES
    // https://www.php.net/manual/fr/function.preg-replace.php
    // https://regex101.com/
    // astuce: supprimer c'est comme remplacer par du texte vide
    $nom = preg_replace("/[^a-zA-Z0-9]/", "", $nom);
    return $nom;
}

function envoyerEmail ($destinataire, $titre, $message)
{
    $headers =  'From: contact@monsite.fr' . "\r\n" .
    'Reply-To: no-reply@monsite.fr' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    @mail($destinataire, $titre, $message, $headers);
    // EN localhost ERREUR CAR PAS DE SERVEUR EMAIL
    // Warning : mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port"

}

