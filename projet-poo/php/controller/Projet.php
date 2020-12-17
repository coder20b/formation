<?php

class Projet
{
    // METHODES
    function afficherOnePage ()
    {
        // echo "<h1>TRAVAUX EN COURS...</h1>";
        $dev1 = new Dev1;
        $dev2 = new Dev2;

        $dev1->afficherHeader();

        $dev2->afficherSection("MINCIR");
        $dev2->afficherSection("ENTRETENIR");
        $dev2->afficherSection("RENFORCEMENT PERFORMANCES MUSCULAIRES");
        $dev2->afficherSection("AVIS CLIENTS");
        $dev2->afficherSection("FORMULAIRE DE CONTACT");

        $dev1->afficherFooter();
    }

}
