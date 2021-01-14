<?php

class MaClasseA
{
    // DEBUT DE LA CLASSE

    // PROPRIETES public OU protected OU private
    public      $nom    = "";
    protected   $age    = 0;
    private     $secret = "1234";

    // POSSIBLE AUSSI SUR LES METHODES
    public function fairePublic ()
    {

    }

    protected function faireProtected ()        // UTILISABLE PAR LES CLASSES ENFANT
    {

    }

    private function fairePrivate ()            // PAS UTILISABLE PAR LES CLASSES ENFANT
    {

    }

    // FIN DE LA CLASSE
}

class MonEnfant
    extends MaClasseA   // HERITAGE => ON HERITE DES PROPRIETES public ET protected
{
    function afficherInfos ()
    {
        echo $this->nom;    // OK CAR public
    }

    function afficherAge ()
    {
        echo $this->age;    // OK car protected
    }

    function afficherSecret ()
    {
        echo $this->secret;     // ERREUR car private
    }
}


// A L'EXTERIEUR DE LA CLASSE MaClasseA
// ON PEUT ACCEDER AUX PROPRIETES public MAIS PAS protected OU private

$objetMaClasseA = new MaClasseA;
$objetMaClasseA->nom =  "coucou";   // ECRITURE: POSSIBLE CAR public

echo $objetMaClasseA->nom;          // LECTURE: POSSIBLE CAR public


echo "<hr>";

$objetEnfant = new MonEnfant;
$objetEnfant->nom = "NOM ENFANT";
$objetEnfant->afficherInfos();

echo "<hr>";
// $objetEnfant->age = 10;      // ERREUR CAR protected
$objetEnfant->afficherAge();


echo "<hr>";
$objetEnfant->afficherSecret();     // ERREUR Notice: Undefined property: MonEnfant::$secret

// SI ON AVAIT CHOISI protected
// Fatal error: Uncaught Error: Cannot access protected property 

// SI ON AVAIT CHOISI private
// Fatal error: Uncaught Error: Cannot access private property MaClasseA::$nom

