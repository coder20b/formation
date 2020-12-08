<?php

$formIdentifiant = filtrer("formIdentifiant");
if ($formIdentifiant == "user")
{
    $tabAsso = [
        "pseudo"            => Form::filtrerTexte("pseudo"),
        "email"             => Form::filtrerEmail("email"),
        "motDePasse"        => Form::filtrerTexte("motDePasse"),
        "dateCreation"      => date("Y-m-d H:i:s"),
    ];
    extract($tabAsso);
    if ( Form::estOK() )
    {
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
    $tabAsso = [
        "pseudo"            => Form::filtrerTexte("pseudo"),
        "email"             => Form::filtrerEmail("email"),
        "motDePasse"        => Form::filtrerTexte("motDePasse"),
        "dateCreation"      => date("Y-m-d H:i:s"),
    ];
    $id = filtrer("id");        // ON GERE $id A PART CAR IL NE CHANGE PAS
    extract($tabAsso);
    if ( Form::estOK() )
    {
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
