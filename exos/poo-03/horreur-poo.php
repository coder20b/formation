<?php

class MaClasseParent
{
    function afficherInterface2()
    {
        echo "<h1>code pour MonInterface2</h1>";
    }

}

interface MonInterface
{
    function afficherInterface();
}

interface MonInterface2
{
    function afficherInterface2();

}

trait MonTrait
{
    function afficherInterface()
    {
        echo "<h1>code pour MonInterface</h1>";
    }

}

class MaClasse
    extends MaClasseParent
    implements MonInterface, MonInterface2
{
    use MonTrait;

    // PROPRIETES D'OBJET

    // METHODES D'OBJET
    function afficherInterface2()
    {
        echo "<h1>code pour MonInterface2 SURCHARGE ENFANT</h1>";
    }

    // PROPRIETES DE CLASSE (AVEC static)
    // METHODES DE CLASSE (avec static)

}

$objet = new MaClasse;
$objet->afficherInterface();
$objet->afficherInterface2();