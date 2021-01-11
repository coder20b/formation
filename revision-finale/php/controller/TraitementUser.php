<?php

class TraitementUser
{
    // COMPOSITION
    use TraitDelete;        // PERMET D'UTILISER LE DELETE GENERAL

    static function create ()
    {
        $formIdentifiant = Controller::filtrer("formIdentifiant");
        if ($formIdentifiant == "user")
        {
            $tabAsso = [
                "pseudo"            => Form::filtrerTexte("pseudo"),
                "email"             => Form::filtrerEmail("email"),
                "dateInscription"   => date("Y-m-d H:i:s"),
            ];
        
            extract($tabAsso);
            if ( Form::estOK() )
            {
                Model::insererLigne("user", $tabAsso);  // SQL VA CREER UN NOUVEL id POUR LA LIGNE
                $id = Model::lireNouvelId();    // ICI INUTILE
        
                echo
                <<<x
                votre user est créé. 
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
        if ($formIdentifiant == "user-update")
        {
            // COMMENT GERER LE MOT DE PASSE QUI EST OPTIONNEL ?
            $tabAsso = [
                "pseudo"            => Form::filtrerTexte("pseudo"),
                "email"             => Form::filtrerEmail("email"),
                "dateInscription"   => date("Y-m-d H:i:s"),
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
        
                Model::modifierLigne("user", $id, $tabAsso);
                echo "votre user est modifié";
            }
            else
            {
                echo "merci de ne pas hacker mon site";
            }
        }
        
    }

    static function apiCreateUpdateDelete ()
    {
        TraitementUser::create();
        TraitementUser::update();
        TraitementUser::delete();
    }

}

