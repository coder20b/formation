<?php

$formIdentifiant = filtrer("formIdentifiant");
if ($formIdentifiant == "user")
{
    $tabAsso = [
        "pseudo"            => Form::filtrerTexte("pseudo"),
        "email"             => Form::filtrerEmail("email"),
        "motDePasse"        => Form::filtrerTexte("motDePasse"),    // MOT DE PASSE ORIGINAL
        "dateCreation"      => date("Y-m-d H:i:s"),
    ];
    extract($tabAsso);  // CREE LA VARIABLE $motDePasse
    if ( Form::estOK() )
    {
        // AVANT DE STOCKER LES INFOS DU USER
        // SECURITE: ON HASHE LE MOT DE PASSE
        // https://www.php.net/manual/fr/function.password-hash.php
        // UN GRAIN DE SEL EST AJOUTE POUR CHANGER LE HASH POUR 2 MOTS DE PASSE IDENTIQUE
        $motDePasseHashe = password_hash($motDePasse, PASSWORD_DEFAULT);
        $tabAsso["motDePasse"] = $motDePasseHashe;

        insererLigne("user", $tabAsso);  // SQL VA CREER UN NOUVEL id POUR LA LIGNE
        $id = Model::lireNouvelId();    // ICI INUTILE

        echo
        <<<x
        votre compte est créé. 
        x;
    }
    else
    {
        echo "merci de ne pas hacker mon site";
    }
}

$formIdentifiant = filtrer("formIdentifiant");
if ($formIdentifiant == "user-update")
{
    // COMMENT GERER LE MOT DE PASSE QUI EST OPTIONNEL ?
    $tabAsso = [
        "pseudo"            => Form::filtrerTexte("pseudo"),
        "email"             => Form::filtrerEmail("email"),
        "dateCreation"      => date("Y-m-d H:i:s"),
    ];
    $id = filtrer("id");        // ON GERE $id A PART CAR IL NE CHANGE PAS
    extract($tabAsso);
    if ( Form::estOK() )
    {
        // SI LE MOT DE PASSE EST FOURNI 
        // ALORS ON DOIT LE HASHER AVANT DE LE STOCKER... 

        modifierLigne("user", $id, $tabAsso);
        echo "votre user est modifié";
    }
    else
    {
        echo "merci de ne pas hacker mon site";
    }
}

// DELETE GENERAL
require_once "php/controller/traitement-delete.php";
