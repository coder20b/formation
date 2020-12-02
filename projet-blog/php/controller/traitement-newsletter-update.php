<?php

$formIdentifiant = filtrer("formIdentifiant");
if ($formIdentifiant == "newsletter-update")
{
    $tabAsso = [
        "email"             => filtrer("email"),
        "nom"               => filtrer("nom"),
        "dateInscription"   => date("Y-m-d H:i:s"),
    ];
    $id = filtrer("id");        // ON GERE $id A PART CAR IL NE CHANGE PAS
    extract($tabAsso);
    if ( ($id != "") && ($email != "") && ($nom != "") )
    {
        modifierLigne("newsletter", $id, $tabAsso);
        echo "votre inscription est modifiée";
    }
    else
    {
        echo "merci de ne pas hacker mon site";
    }
}