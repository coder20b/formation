<?php

$formIdentifiant = filtrer("formIdentifiant");
if ($formIdentifiant == "page")
{
    $tabAsso = [
        "url"               => Form::filtrerTexte("url"),
        "template"          => Form::filtrerTexte("template"),
        "titre"             => Form::filtrerTexte("titre"),
        "contenu"           => Form::filtrerTexte("contenu"),
        "categorie"         => Form::filtrerTexte("categorie"),
        "image"             => Form::filtrerUpload("image"),    // ON OBTIENT LE CHEMIN DU FICHIER
        "datePublication"   => date("Y-m-d H:i:s"),
    ];
    extract($tabAsso);
    if ( Form::estOK() )
    {
        insererLigne("page", $tabAsso);  // SQL VA CREER UN NOUVEL id POUR LA LIGNE
        $id = Model::lireNouvelId();    // ICI INUTILE

        echo
        <<<x
        votre page est publiée. 
        <a href="$url.php">cliquer ici pour aller sur la page</a>
        x;
    }
    else
    {
        echo "merci de ne pas hacker mon site";
    }
}

$formIdentifiant = filtrer("formIdentifiant");
if ($formIdentifiant == "page-update")
{
    $tabAsso = [
        "url"               => Form::filtrerTexte("url"),
        "template"          => Form::filtrerTexte("template"),
        "titre"             => Form::filtrerTexte("titre"),
        "contenu"           => Form::filtrerTexte("contenu"),
        "categorie"         => Form::filtrerTexte("categorie"),
        "image"             => Form::filtrerUpload("image"),    // ON OBTIENT LE CHEMIN DU FICHIER
        "datePublication"   => date("Y-m-d H:i:s"),
    ];
    $id = filtrer("id");        // ON GERE $id A PART CAR IL NE CHANGE PAS
    extract($tabAsso);
    if ( Form::estOK() )
    {
        modifierLigne("page", $id, $tabAsso);
        echo "votre page est modifiée";
    }
    else
    {
        echo "merci de ne pas hacker mon site";
    }
}

// DELETE GENERAL
require_once "php/controller/traitement-delete.php";
