<?php

class TraitementCategorie
{
    // COMPOSITION
    use TraitDelete;        // PERMET D'UTILISER LE DELETE GENERAL

    static function create ()
    {
        $formIdentifiant = Controller::filtrer("formIdentifiant");
        if ($formIdentifiant == "categorie")
        {
            $tabAsso = [
                "label"            => Form::filtrerTexte("label"),
            ];
        
            extract($tabAsso);
            if ( Form::estOK() )
            {
                Model::insererLigne("categorie", $tabAsso);  // SQL VA CREER UN NOUVEL id POUR LA LIGNE
                $id = Model::lireNouvelId();    // ICI INUTILE
        
                echo
                <<<x
                votre categorie est créée. 
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
        if ($formIdentifiant == "categorie-update")
        {
            // COMMENT GERER LE MOT DE PASSE QUI EST OPTIONNEL ?
            $tabAsso = [
                "label"            => Form::filtrerTexte("label"),
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
        
                Model::modifierLigne("categorie", $id, $tabAsso);
                echo "votre categorie est modifiée";
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

