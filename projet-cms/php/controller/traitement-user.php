<?php

$formIdentifiant = filtrer("formIdentifiant");
if ($formIdentifiant == "user-login")
{
    $tabAsso = [
        "email"             => Form::filtrerEmail("email"),
        "motDePasse"        => Form::filtrerTexte("motDePasse"),    // MOT DE PASSE ORIGINAL
    ];
    extract($tabAsso);  // CREE LA VARIABLE $email ET $motDePasse
    if ( Form::estOK() )
    {
        // IL FAUT VERIFIER SI LES INFOS FOURNIES PAR LE FORMULAIRE
        // CORRESPONDENT A UNE LIGNE DANS LA TABLE SQL user
        // CRITERE DE RECHERCHE => $email   => READ
        $tabLigne = lireLigne("user", "email", $email);
        foreach($tabLigne as $ligneAsso)        // INUTILE CAR ON A UN SEUL ELEMENT
        {
            // DEBUG
            // print_r($ligneAsso);

            // BRICOLAGE POUR NE PAS PERDRE LE MOT DE PASSE ORIGINAL
            $motDePasseOriginal = $motDePasse;
            extract($ligneAsso);    // => CREE LES VARIABLES $motDePasse => MOT DE PASSE HASHE

            // MAINTENANT IL FAUT CONFIRMER QUE LE MOT DE PASSE EST CORRECT
            // https://www.php.net/manual/fr/function.password-verify.php
            $motDePasseOK = password_verify($motDePasseOriginal, $motDePasse);  // true OU false
            if ($motDePasseOK)
            {
                // SCENARIO OK: LE VISITEUR A FOURNI UN EMAIL QUI EXISTE ET LE BON MOT DE PASSE
                echo
                <<<x
                    bienvenue sur le site $pseudo. 
                x;
    
            }
            else
            {
                // SCENARIO KO: LE VISITEUR A FOURNI UN EMAIL QUI EXISTE MAIS UN MAUVAIS MOT DE PASSE
                echo "DESOLE MOT DE PASSE INCORRECT";
            }
        }

    }
    else
    {
        echo "merci de ne pas hacker mon site";
    }
}


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

    // AJOUTER DES VERIFICATIONS SUPPLEMENTAIRES
    // BLOQUER LES DOUBLONS (pseudo ET email)
    // AMELIORER LE FILTRE DES EMAILS POUR TOUT PASSER EN minuscules

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

    // AJOUTER DES VERIFICATIONS SUPPLEMENTAIRES
    // BLOQUER LES DOUBLONS (pseudo ET email) PLUS COMPLIQUE...
    // AMELIORER LE FILTRE DES EMAILS POUR TOUT PASSER EN minuscules

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
