<?php

// ETAPES
// VERIFIER SI L'IDENTIFIANT DU FORMULAIRE EST article-delete
// FILTRER LES INFOS DU FORMULAIRE article-delete
//      id
// VALIDER SI CHAQUE INFO EST CORRECTE
// COMPLETER LES INFOS MANQUANTES
// SUPPRIMER LA LIGNE DANS LA TABLE SQL

$formIdentifiant = filtrer("formIdentifiant");
// <input type="hidden" name="formIdentifiant" value="article">
if ($formIdentifiant == "delete")
{
    // <input name="id">
    // filtrer => SECURITE POUR ENLEVER LE CODE DANGEREUX
    $tabAsso = [
        "table"          => filtrerCamelCase("table"), // UN NOM DE TABLE SERA EN camelCase (lettres ou chiffres)
        "id"             => filtrer("id"),
    ];
    // ASTUCE: ON VA CREER LES VARIABLES A PARTIR DES CLES 
    extract($tabAsso);
    // extract CREE POUR MOI LES VARIABLES $id
    // https://www.php.net/manual/fr/function.extract.php

    // VALIDATION MINIMALISTE... A COMPLETER
    if ($id != "")
    {
        supprimerLigne($table, $id);

        // message de confirmation
        echo "votre ligne est supprimé";
    }
    else
    {
        // TENTATIVE DE HACK
        echo "merci de ne pas hacker mon site";
    }
}