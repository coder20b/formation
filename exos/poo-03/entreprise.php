<?php

class Salarie
{
    // METHODE GENERALE (PAR DEFAUT)
    function travailler ()
    {
        echo "<h2>JE FAIS MON BOULOT</h2>";
    }
}

class Developpeur
    extends Salarie
{
    // METHODE PLUS DETAILLEE
    function travailler ()
    {
        parent::travailler();               // GRACE A L'HERITAGE
        echo "<h2>JE CODE DU PHP</h2>";
    }

}

class Graphiste
    extends Salarie
{
    function travailler ()
    {
        echo "<h2>JE CODE DU CSS</h2>";
    }

}

class Designer
    extends Salarie
{
    function travailler ()
    {
        echo "<h2>JE CREE AVEC ILLUSTRATOR</h2>";
    }

}

class Toto
{
    function travailler ()
    {
        echo "<h2>JE FAIS LE CAFE</h2>";
    }

}

$tabSalarie = [
    new Developpeur,
    new Graphiste,
    new Designer,
    new Toto,
];

// ON A UN CODE COMMUN ET COMPACT
// MAIS DIFFICILE A REMONTER
foreach($tabSalarie as $salarie)
{
    $salarie->travailler();
}





