<?php

// class EN ANGLAIS => groupe EN FRANCAIS
class Model
{
    // PROPRIETES DE CLASSE static
    // => COLLECTIF COMMUN A L'ENSEMBLE DE LA CLASSE
    static $connexionMysql = null;

    // METHODES DE CLASSE static
    static function envoyerRequete ($requete)
    {

    }

    // => INDIVIDUEL
    // => POUR CHAQUE OBJET
    // PROPRIETES D'OBJETS (VISIBILITE public, protected ou private)
    // => SINON Parse error: syntax error, unexpected '$requete'
    public $requete = "";

    // METHODES D'OBJETS (SANS static)
    function insererNouvelleLigne ($nomTable, $tabAsso)
    {

    }

}

// ON PREND COMME EXEMPLE VOTRE FORMATION
// COMMUN A LA FORMATION : PAREIL POUR TOUS LES ELEVES ?
// * programme
// * profs
// * horaires
// * ... 
// CHAQUE ELEVE A DES PROPRIETES INDIVIDUELLES
// * nom
// * prenom
// * adresse
// ... 

class Eleve
{
    // PROPRIETES COLLECTIVES
    static public $programme = "POO";
    static public $profs     = [ "amar", "achref" ];
    static public $horaires  = [ "09H30", "17H30" ];

    // METHODE DE CLASSE static
    static function afficherHoraires ()
    {
        echo "<h3>la classe commence à " . Eleve::$horaires[0] . "</h3>";
    }

    // PROPRIETES D'OBJET 
    // => INDIVIDUELLES 
    // => CREES POUR CHAQUE OBJET
    public $nom     = "";
    public $prenom  = "";
    public $adresse = "";

    // METHODES D'OBJET
    function afficherInfos ()
    {
        // $this EST COMME UNE VARIABLE QUI CONTIENT L'OBJET PAR LEQUEL ON A APPELE LA METHODE
        echo "<hr>";
        echo "<h3>MON NOM EST " . $this->nom . "</h3>";
        echo "<h3>MON ADRESSE EST " . $this->adresse . "</h3>";
        echo "<h3>ON COMMENCE A " . Eleve::$horaires[0] ."</h3>";

    }
}

Eleve::afficherHoraires();

// SYMFONY VA PREFERER UTILISER UN OBJET POUR STOCKER LES INFOS...
$georges            = new Eleve;
$georges->nom       = "Clooney";
$georges->adresse   = "Aix";

// EQUIVALENT EN TABLEAU ASSOCIATIF
$tabGeorges = [
    "nom"       => "Clooney",
    "adresse"   => "Aix",
];

$julie              = new Eleve;
$julie->nom         = "Depardieu";
$julie->adresse     = "Toulon";

$tabJulie = [
    "nom"       => "Depardieu",
    "adresse"   => "Toulon",  
];

Eleve::$horaires = [ "10H00", "18H00" ];    // POUR L'ENSEMBLE DES ELEVES

$georges->afficherInfos();  // PHP FAIT $this = $georges
$julie->afficherInfos();    // PHP FAIT $this = $julie

Eleve::$horaires = [ "09H00", "18H00" ];    // POUR L'ENSEMBLE DES ELEVES

$georges->afficherInfos();
$julie->afficherInfos();














