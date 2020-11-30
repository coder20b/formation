<?php

// ETAPES
// VERIFIER SI L'IDENTIFIANT DU FORMULAIRE EST article
// FILTRER LES INFOS DU FORMULAIRE article
//      titre
//      image
//      contenu
// VALIDER SI CHAQUE INFO EST CORRECTE
// COMPLETER LES INFOS MANQUANTES
//      datePublication
// AJOUTER LA LIGNE DANS LA TABLE SQL

$formIdentifiant = filtrer("formIdentifiant");
// <input type="hidden" name="formIdentifiant" value="article">
if ($formIdentifiant == "article")
{
    // <input name="titre">
    // filtrer => SECURITE POUR ENLEVER LE CODE DANGEREUX
    // ...on peut creer une fonction de confort creerDatetime()
    $tabAsso = [
        "titre"             => filtrer("titre"),
        "image"             => filtrer("image"),
        "contenu"           => filtrer("contenu"),
        "datePublication"   => date("Y-m-d H:i:s"),
    ];
    // ASTUCE: ON VA CREER LES VARIABLES A PARTIR DES CLES 
    extract($tabAsso);
    // extract CREE POUR MOI LES VARIABLES $titre, $image, $contenu, $datePublication
    // https://www.php.net/manual/fr/function.extract.php

    // VALIDATION MINIMALISTE... A COMPLETER
    if ( ($titre != "") && ($image != "") && ($contenu != "") )
    {
        insererLigne("article", $tabAsso);

        // message de confirmation
        echo "votre article est publié";
    }
    else
    {
        // TENTATIVE DE HACK
        echo "merci de ne pas hacker mon site";
    }
}