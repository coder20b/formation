<?php

class TraitementAnnonce
{
    // COMPOSITION
    use TraitDelete;        // PERMET D'UTILISER LE DELETE GENERAL

    static function create ()
    {
        $formIdentifiant = Controller::filtrer("formIdentifiant");
        if ($formIdentifiant == "annonce")
        {
            $tabAsso = [
                "user_id"           => Form::filtrerTexte("user_id"),
                "titre"             => Form::filtrerTexte("titre"),
                "description"       => Form::filtrerTexte("description"),
                "datePublication"   => date("Y-m-d H:i:s"),
            ];
        
            extract($tabAsso);
            if ( Form::estOK() )
            {
                Model::insererLigne("annonce", $tabAsso);  // SQL VA CREER UN NOUVEL id POUR LA LIGNE
                $id = Model::lireNouvelId();    // ICI INUTILE
        
                echo
                <<<x
                votre annonce est créée. 
                x;
            }
            else
            {
                echo "merci de ne pas hacker mon site";
            }
        }
        
    }

    static function update ()
    {
        $formIdentifiant = Controller::filtrer("formIdentifiant");
        if ($formIdentifiant == "annonce-update")
        {
            // COMMENT GERER LE MOT DE PASSE QUI EST OPTIONNEL ?
            $tabAsso = [
                "user_id"           => Form::filtrerTexte("user_id"),
                "titre"             => Form::filtrerTexte("titre"),
                "description"       => Form::filtrerTexte("description"),
                "datePublication"   => date("Y-m-d H:i:s"),
            ];
            $id = Controller::filtrer("id");        // ON GERE $id A PART CAR IL NE CHANGE PAS
            extract($tabAsso);
        
            // AJOUTER DES VERIFICATIONS SUPPLEMENTAIRES
            // BLOQUER LES DOUBLONS (pseudo ET email) PLUS COMPLIQUE...
            // AMELIORER LE FILTRE DES EMAILS POUR TOUT PASSER EN minuscules
        
            if ( Form::estOK() )
            {
                // SI LE MOT DE PASSE EST FOURNI 
                // ALORS ON DOIT LE HASHER AVANT DE LE STOCKER... 
        
                Model::modifierLigne("annonce", $id, $tabAsso);
                echo "votre annonce est modifiée";
            }
            else
            {
                echo "merci de ne pas hacker mon site";
            }
        }
        
    }

    static function apiCreateUpdateDelete ()
    {
        self::create();
        self::update();
        self::delete();
    }

}

