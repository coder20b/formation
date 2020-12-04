<?php
// 2 SCENARIOS
// SCENARIO 1: LE VISITEUR VIENT D'ARRIVER
// SCENARIO 2: LE VISITEUR VIENT DE REMPLIR LE FORMULAIRE
// <input type="hidden" name="formIdentifiant">
$formIndentifiant = filtrer("formIdentifiant");

// SCENARIO CREATE

// ON N'ACTIVE LE CODE DU TRAITEMENT QUE SI L'IDENTIFIANT DU FORMULAIRE EST "newsletter"
if ($formIndentifiant == "newsletter")
{
    // SCENARIO 2
    // AJOUTER LE CODE POUR ENREGISTRER LES INFOS
    // => ENREGISTRER LES INFOS DANS UN FICHIER newsletter.txt

    // CREER UNE FONCTION POUR FILTRER LES INFOS DE FORMULAIRES
    // RECUPERER LES INFOS
    // <input name="email">
    $email  = Form::filtrerEmail("email");    
    // <input name="nom">
    $nom    = Form::filtrerTexte("nom");

    // https://www.php.net/manual/fr/function.date-default-timezone-set.php
    date_default_timezone_set('Europe/Paris');
    $dateInscription = date("Y-m-d H:i:s"); // FORMAT DATETIME POUR SQL

    // ON NE FAIT LE RESTE DU CODE QUE SI LES INFOS NE SONT PAS VIDES
    if (Form::estOK())
    {
        // COMPLETER LES INFOS
        // https://www.php.net/manual/fr/function.date.php
        $date = date("Y-m-d H:i:s");    // 2020-11-24 14:34:12

        $tabAsso = [
            "nom"               => $nom,
            "email"             => $email,
            "dateInscription"   => $dateInscription,
        ];
        insererLigne("newsletter", $tabAsso);
       
        $message =
        <<<x
        $nom,$email,$date

        x;

        envoyerEmail("test@applh.com", "nouveau inscrit", $message);

        echo "<p>nous vous envoyons un mail de newsletter rapidement.</p>";

    }
    else 
    {
        // SCENARIO HACK
        echo "<h1>MERCI DE NE PAS HACKER MON SITE</h1>";
    }

}

// SCENARIO UPDATE

// require_once "php/controller/traitement-newsletter-update.php";
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

// DELETE GENERAL
require_once "php/controller/traitement-delete.php";
