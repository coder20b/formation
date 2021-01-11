<?php

trait TraitDelete
{
    static function delete ()
    {
        $formIdentifiant = Controller::filtrer("formIdentifiant");
        // <input type="hidden" name="formIdentifiant" value="article">
        if ($formIdentifiant == "delete")
        {
            // <input name="id">
            // filtrer => SECURITE POUR ENLEVER LE CODE DANGEREUX
            $tabAsso = [
                "table"          => Controller::filtrerCamelCase("table"), // UN NOM DE TABLE SERA EN camelCase (lettres ou chiffres)
                "id"             => Controller::filtrer("id"),
            ];
            // ASTUCE: ON VA CREER LES VARIABLES A PARTIR DES CLES 
            extract($tabAsso);
            // extract CREE POUR MOI LES VARIABLES $id
            // https://www.php.net/manual/fr/function.extract.php
        
            // VALIDATION MINIMALISTE... A COMPLETER
            if ($id != "")
            {
                Model::supprimerLigne($table, $id);
        
                // message de confirmation
                echo "votre ligne est supprimé";
            }
            else
            {
                // TENTATIVE DE HACK
                echo "merci de ne pas hacker mon site";
            }
        }
    }

}