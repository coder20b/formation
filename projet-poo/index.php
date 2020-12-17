<?php
/*
    EXEMPLE DE CAHIER DES CHARGES:
    * IL FAUT QUE CE SOIT JOLI
    * IL FAUT QUE LE SITE FONCTIONNE TOUT SEUL
    * A QUOI SERT LE SITE ?
        POUR ATTIRER UNE CLIENTELE ET AUGMENTER CHIFFRE AFFAIRES
    * IL FAUT GAGNER EN VISIBILITE
    * IL FAUT QUE LES VISITEURS PUISSENT CONTACTER LE CLIENT
            nom
            email
            thematique (mincir, entretenir, renforcement, autres)
    * BUDGET
    * PLANNING
    * PERSONA DU CLIENT ?
    *   COACH SPORTIF
    * PERSONA(S) VISITEUR(S)
    *   MINCIR
    *   ENTRETENIR
    *   RENFORCEMENT PERFORMANCES MUSCULAIRES
    * AFFICHER DES AVIS CLIENTS SATISFAITS
            michel
            noelle
            toussaint
            alexandra
    EN POO
        Classe                  SUJET
            Methode             VERBE
                Paramètres      COMPLEMENT

*/
// ON FAIT LE PROJET EN POO

// FONCTION DE CALLBACK => PHP QUI VA APPELER CETTE FONCTION AUTOMATIQUEMENT
function chargerFichier ($nomClasse)
{
    $tabFichier = glob("php/*/$nomClasse.php");
    foreach($tabFichier as $fichier)    // INUTILE CAR UN SEUL FICHIER
    {
        // DEBUG
        // echo "<h3>JE CHARGE LE CODE DANS $fichier</h3>";
        require_once $fichier;
    }
}

// PHP VA AUTOMATIQUEMENT APPELER LA FONCTION chargerFichier QUAND IL A BESOIN D'UNE CLASSE
// https://www.php.net/manual/fr/function.spl-autoload-register.php
spl_autoload_register("chargerFichier");

$projet = new Projet;
$projet->afficherOnePage();
