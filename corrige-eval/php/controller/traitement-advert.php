<?php

$formIdentifiant = Controller::filtrer("formIdentifiant");
if ($formIdentifiant == "advert")
{
    $tabAsso = [
        "title"        => Form::filtrerTexte("title"),
        "description"  => Form::filtrerTexte("description"),
        "postal_code"  => Form::filtrerTexte("postal_code"),
        "city"         => Form::filtrerTexte("city"),
        "type"         => Form::filtrerTexte("type"),
        "price"        => Form::filtrerTexte("price"),
    ];
    extract($tabAsso);
    if ( Form::estOK() )
    {
        Model::insererLigne("advert", $tabAsso);  // SQL VA CREER UN NOUVEL id POUR LA LIGNE
        $id = Model::lireNouvelId();    // ICI INUTILE

        echo
        <<<x
        votre annonce est publiée. 
        x;
    }
    else
    {
        echo "merci de ne pas hacker mon site";
    }
}
