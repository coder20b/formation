<?php

class Dev2
{
    function afficherSection ($thematique)
    {
        if ($thematique == "AVIS CLIENTS")
        {
            // ON VA DELEGUER A UN 3E DEV LE CODE DU FORMULAIRE DE CONTACT
            $stagiaire = new Stagiaire;
            $stagiaire->afficherAvisClients();
        }
        elseif ($thematique == "FORMULAIRE DE CONTACT")
        {
            // ON VA DELEGUER A UN 3E DEV LE CODE DU FORMULAIRE DE CONTACT
            $dev3 = new Dev3;
            $dev3->afficherFormulaireContact();
        }
        else 
        {
            echo 
            <<<x
            <section>
                <h3>$thematique</h3>
            </section>
            x;
    
        }
    }


}
