<?php

class index
{
    // FONCTION DE CALLBACK => PHP QUI VA APPELER CETTE FONCTION AUTOMATIQUEMENT
    static function chargerFichier ($nomClasse)
    {
        $tabFichier = glob("php/*/$nomClasse.php");
        foreach($tabFichier as $fichier)    // INUTILE CAR UN SEUL FICHIER
        {
            require_once $fichier;
        }
    }

    static function run ()
    {
        spl_autoload_register("index::chargerFichier");

        // ATTENTION: NE PAS OUBLIER DE CHANGER LA DATABASE
        Model::$database = "revision_finale";   // ON PEUT CONFIGURER LA DATABASE QU'ON VEUT POUR LE PROJET 
        // => ON A BESOIN D'UN ROUTEUR
        $tabRouteur = [
            // CLE = URL            VALEUR = LES FICHIERS php/view
            "index"              => [ "header", "sectionIndex",         "footer" ],     // ROUTE 
            "admin-user"         => [ "header", "sectionAdminUser",     "footer" ],     // ROUTE 
            "admin-annonce"      => [ "header", "sectionAdminAnnonce",  "footer" ],     // ROUTE 
        ];

        // A PARTIR D'ICI JE PEUX APPELER TOUTES MES FONCTIONS
        $urlDemandee = Controller::lireUri();

        // A PARTIR DE L'URL DEMANDEE, JE VAIS CHERCHER LA LISTE DES FICHIERS php/view
        $tabTemplate = $tabRouteur[$urlDemandee] ?? [];

        if (empty($tabTemplate))
        {
            $tabLigne = Model::lireLigne("page", "url", $urlDemandee);
            foreach($tabLigne as $ligneAsso)    // NOTE: UN PEU INUTILE CAR UN SEUL ELEMENT DANS LE TABLEAU
            {
                extract($ligneAsso);            // ASTUCE: CREER LES VARIABLES A PARTIR DES NOMS DE COLONNES
                // => CREE $id, $url, $template, $titre, $contenu, $image
                $tabTemplate = [ $template ];
            }
        }

        // ON CHARGE LE CODE DES FICHIERS php/view
        foreach($tabTemplate as $fichierView)
        {
            $methodeTemplate = "Template::$fichierView";
            if (is_callable($methodeTemplate))
            {
                $methodeTemplate();
            }
        }

    }
}


// ON APPELLE NOTRE METHODE POUR LANCER LE PROGRAMME
index::run();


