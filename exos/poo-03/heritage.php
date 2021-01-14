<?php

// FRAMEWORK
class MaClasseParent
{
    // METHODE MAGIQUE => CONSTRUCTEUR
    // APPELEE AUTOMATIQUEMENT PAR PHP QUAND ON FAIT new MaClasseParent
    function __construct ()
    {
        echo "<h3>constructeur MaClasseParent</h3>";
    }

    // METHODES D'OBJET (SANS static)
    function afficherTitre ($texte)
    {
        echo "<h1>MaClasseParent $texte</h1>";
    }
}

// DEV
class MaClasseEnfant
    extends MaClasseParent
{
    // METHODE MAGIQUE => CONSTRUCTEUR
    // APPELEE AUTOMATIQUEMENT PAR PHP QUAND ON FAIT new MaClasseParent
    function __construct ()
    {
        echo "<h3>constructeur MaClasseEnfant</h3>";
        parent::__construct();
     }

     // METHODES D'OBJET (SANS static)
    function afficherTitre ($texte)
    {
        echo "<h1>MaClasseEnfant $texte</h1>";
    }

}

class MaClassePetitEnfant
    extends MaClasseEnfant
{
    // METHODE MAGIQUE => CONSTRUCTEUR
    // APPELEE AUTOMATIQUEMENT PAR PHP QUAND ON FAIT new MaClasseParent
    function __construct ()
    {
        echo "<h3>constructeur MaClassePetitEnfant</h3>";
        // ON VEUT QUAND MEME APPELER LE CONSTRUCTEUR DU PARENT
        parent::__construct();
    }

}

// DEV PEUT UTILISER LE CODE FOURNI PAR LE FRAMEWORK
$objetParent = new MaClasseParent;              // DECLENCHE __construct
$objetParent->afficherTitre("parent");          // MaClasseParent::afficherTitre

$objetEnfant = new MaClasseEnfant;              // DECLENCHE __construct
$objetEnfant->afficherTitre("enfant");          // MaClasseEnfant::afficherTitre

$objetPetitEnfant = new MaClassePetitEnfant;            // DECLENCHE __construct
$objetPetitEnfant->afficherTitre("petit enfant");       // GRACE A L'HERITAGE DE CLASSE
                                                        // MaClasseEnfant::afficherTitre


$tabObjet = [ $objetParent, $objetEnfant, $objetPetitEnfant ];
foreach($tabObjet as $objet)
{
    // ON ECRIT UN CODE UNIQUE 
    // MAIS LA METHODE APPELEE EST RELIEE A L'OBJET
    $objet->afficherTitre("titre");
}
