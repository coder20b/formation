<?php

// ETAPES
// VERIFIER SI L'IDENTIFIANT DU FORMULAIRE EST article-update
// FILTRER LES INFOS DU FORMULAIRE article-update
//      titre
//      image
//      contenu
//      id
// VALIDER SI CHAQUE INFO EST CORRECTE
// COMPLETER LES INFOS MANQUANTES
//      datePublication
// AJOUTER LA LIGNE DANS LA TABLE SQL

$formIdentifiant = filtrer("formIdentifiant");
// <input type="hidden" name="formIdentifiant" value="article">
if ($formIdentifiant == "article-update")
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
    $id = filtrer("id");        // ON GERE $id A PART CAR IL NE CHANGE PAS
                                // MAIS IL FOURNIT LA LIGNE SELECTIONNEE
    // ASTUCE: ON VA CREER LES VARIABLES A PARTIR DES CLES 
    extract($tabAsso);
    // extract CREE POUR MOI LES VARIABLES $titre, $image, $contenu, $datePublication
    // https://www.php.net/manual/fr/function.extract.php

    // VALIDATION MINIMALISTE... A COMPLETER
    if ( ($id != "") && ($titre != "") && ($image != "") && ($contenu != "") )
    {
        modifierLigne("article", $id, $tabAsso);

        // message de confirmation
        echo "votre article est publié";
    }
    else
    {
        // TENTATIVE DE HACK
        echo "merci de ne pas hacker mon site";
    }
}