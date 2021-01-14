<?php

// ON PEUT DEFINIR DES INTERFACES AVEC LE MOT interface
// => DANS UNE INTERFACE, ON NE DECLARE QUE DES METHODES ABSTRAITES

// DEV 1 ET DEV 2 SE METTENT D'ACCORD SUR L'INTERFACE
interface MonInterface
{
    // METHODES ABSTRAITES
    function afficherTitre ($titre);   // PAS DE BLOC {}


}

interface MonInterface2
{
    // METHODES ABSTRAITES
    function afficherContenu ();   // PAS DE BLOC {}

}

// LE DEV S'EN FOUT DES INTERFACES CAR IL N'Y A PAS DE CODE DEDANS ???
// A QUOI CA SERT ?
// => UN CONTRAT QUE LE DEV S'ENGAGE A RESPECTER

// DEV 1 
class MaClasse
    implements MonInterface, MonInterface2
{
    function afficherTitre ($titre)
    {
        echo "<h2>$titre</h2>";
    }

    function afficherContenu ()
    {

    }

}


// DEV 2
$objet = new MaClasse;  // PHP VA VERIFIER SI VOUS AVEZ AJOUTE LE CODE DE CHAQUE METHODE ABSTRAITE
// Fatal error: Class MaClasse contains 2 abstract methods 
//  and must therefore be declared abstract 
//  or implement the remaining methods (MonInterface::afficherTitre, MonInterface::afficherContenu)

// GRACE A L'INTERFACE, 
$objet->afficherTitre("code réel...");  
// GRACE A L'INTERFACE, JE SAIS QU'IL FAUT APPELER LA METHODE AVEC UN PARAMETRE