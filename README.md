# formation

Formation Dev Fullstack (Front + Back)

Stack = Pile
=> Pile des technologies mises en oeuvre sur un projet
=> HTML, CSS, JS, PHP, SQL  => FullStack
=> HTML + CSS + JS          => Front
=> PHP + SQL                => Back

## github

    Repository Github:

https://github.com/coder20b/formation

## liveshare

    mercredi 16/12
    
https://prod.liveshare.vsengsaas.visualstudio.com/join?23A905B5C21C1E11B815124F66A95A973127

## Questions ??

## PROGRAMMATION ORIENTE OBJET (POO)

### EN PRATIQUE

ON A BESOIN DE BOITES POUR RANGER NOTRE CODE
=>  FONCTIONS   => PROGRAMMATION FONCTIONNELLE  => 10.000 LIGNES DE CODE
=>  CLASSES     => PROGRAMMATION ORIENTEE OBJET => 1.000.000 LIGNES DE CODE

UN DEV PAR AN       => AUTOUR DE 100.000 LIGNES DE CODE
UNE EQUIPE DE DEV   => PLUSIEURS CENTAINES DE MILLIERS DE CODE PAR AN

=> DEPUIS LES ANNEES 90
=> LA PROGRAMMATION ORIENTE OBJET EST DEVENUE LE STANDARD 
    POUR LES PROJETS EN EQUIPE ET EN ENTREPRISE


### APPROCHE PHILOSOPHIQUE

FONCTIONS   => UTILISER UN VERBE POUR NOMMER LA FONCTION

```php
<?php

function afficherTitre ($texte)
{
    echo "<h1>$texte</h1>";
}

afficherTitre("mon site");

// FUNCTION     PARAMETRE
// VERBE        COMPLEMENT
// => ON APPELLE AUSSI LA PROGRAMMATION FONCTIONNELLE AVEC LE MOT
//              PROGRAMMATION IMPERATIVE


```

    AVEC LES CLASSES

```php
<?php

class Model
{
    static function envoyerRequeteSql ($requete)
    {
        // ...
    }
}

Model::envoyerRequeteSql("SELECT * FROM user");
// CLASSE   FUNCTION     PARAMETRE
// SUJET    VERBE        COMPLEMENT
// => COMME EN LANGAGE NATUREL

```

    PROMESSES ET ESPOIR DE LA POO
    * ECRIRE DU CODE LISIBLE (SUJET VERBE COMPLEMENT)
    * SUR UN PROJET ON COMMENCE PAR LA REDACTION DU CAHIER DES CHARGES AVEC LE CLIENT
        LE CLIENT DECRIT SES BESOINS POUR SON PROJET
        => CE DOCUMENT EST FRANCAIS (EN LANGAGE NATUREL COMPREHENSIBLE PAR UN ETRE HUMAIN)
        => SUJET VERBE COMPLEMENT

        => EXEMPLE:
        LA PAGE D'ACCUEIL DOIT AFFICHER UN CAROUSEL
        LA PAGE CONTACT DOIT INTEGRER UN FORMULAIRE DE CONTACT
        ...

    ON A DES OUTILS QUI PEUVENT AIDER A PRODUIRE DU CODE DEPUIS LE LANGAGE NATUREL
    => AVEC LA POO C'EST PLUS FACILE
    => UML (Unified Modelling Language)
        outils comme Rational Rose (IBM...)
    => AUJOURD'HUI (LOW CODE OU NO CODE...)

```php

Page::afficher("accueil", "carousel");
Page::integrer("contact", "formulaire");


```

## EN PHP

    ON PEUT CREER DES CLASSES 
    * POUR RANGER NOS FONCTIONS
    => ON APPELLE METHODE UNE FONCTION RANGEE DANS UNE CLASSE

    * POUR RANGER NOS VARIABLES
    => ON APPELLE PROPRIETE/ATTRIBUT UNE VARIABLE RANGEE DANS UNE CLASSE

```php
<?php

// TRADITION: LE NOM D'UNE CLASSE COMMENCE PAR UNE MAJUSCULE ET EST EN CamelCase
class Model
{
    // PROPRIETES
    static $prop1;

    // METHODES
    static function faireTravail ()
    {

    }

}

class Form
{

}

```

## COMPARAISON AVEC LE MONDE REEL

CLASSE      METIER
METHODES    COMPETENCES OU SAVOIR FAIRE DU METIER

```php

// METIER DEVELOPPEUR
// SAVOIR FAIRE: coder, lireTuto, creerCharteGraphique
class Developpeur
{
    // METHODES
    function coder ()
    {

    }

    function lireTuto ()
    {

    }

    function creerCharteGraphique ()
    {

    }

}

// METIER CHIRURGIEN
// SAVOIR FAIRE: operer, diagnostiquer, discuter

class Chirurgien
{
    // METHODES
    function operer ($organe, $typeOperation)
    {

    }

    function diagnostiquer ($patient, $symptomes)
    {

    }

    function discuter ($patient)
    {

    }

}

```

## ET OU SONT LES OBJETS DANS TOUT CA ???

    UNE FOIS QU'ON A CREE UNE CLASSE
    => ON PEUT ENSUITE CREER UN OBJET DEPUIS LA CLASSE
    => INSTANCIATION D'OBJET

```php

// ETAPE 1: ON DECLARE LA CLASSE
// METIER DEVELOPPEUR
// SAVOIR FAIRE: coder, lireTuto, creerCharteGraphique
class Developpeur
{
    // METHODES D'OBJET (PAS DE MOT static AU DEBUT)
    // IL FAIT PASSER PAR UN OBJET POUR APPELER LA METHODE D'OBJET
    function coder ()
    {

    }

    function lireTuto ()
    {

    }

    function creerCharteGraphique ()
    {

    }

}

// ETAPE 2
// ON INSTANCIE UN OBJET DEPUIS LA CLASSE
// => UN OBJET EST UNE VALEUR
// => ON STOCKE UN OBJET DANS UNE VARIABLE
// ON UTILISE LE MOT SPECIAL new ET ON AJOUTE LE NOM DE LA CLASSE APRES
// (OPERATEUR D'INSTANCIATION)
$georges = new Developpeur; // ON CREE UN OBJET A PARTIR DE LA CLASSE Developpeur

// ETAPE 3
// EN ENFIN ON PEUT APPELER LA METHODE D'OBJET EN PASSANT PAR L'OBJET
$georges->coder();


// COMPARAISON AVEC LE MONDE REEL
// UN OBJET EST UN PROFESSIONNEL QUI EXERCE LE METIER DE LA CLASSE

```

    UNE ENTREPRISE EST ORGANISEE EN SERVICES 
    (TECHNIQUE, RESSOURCES HUMAINES, COMPTABILITE, DIRECTION, etc...)
    ET DANS CHAQUE SERVICE, IL Y A DES EMPLOYES

    ENTREPRISE          APPLICATION
    SERVICE             CLASSE          => A DES RESPONSABILITES
    EMPLOYE             OBJET           => FONT LE TRAVAIL


## PREMIER CONSTAT

    LA POO ALOURDIT LE CODE... ON EST PERDANT POURQUOI ON FAIT CA ???

## EN PHP: OPTIMISER LES PERFORMANCES AVEC LE CHARGEMENT AUTOMATIQUE DE CLASSE

    PAS DISPONIBLE EN PROGRAMMATION FONCTIONNELLE
    => 1ER AVANTAGE EN POO AVEC PHP

    EN PROGRAMMATION FONCTIONNELLE
    => ON CREE DES BIBLIOTHEQUES DE FONCTIONS
    => ET POUR SE SIMPLIFIER LA VIE ON CHARGE TOUTES LES FONCTIONS
    => MAIS ON NE VA APPELER QU'UNE TOUTE PETITE PARTIE
    => PAS EFFICACE SURTOUT SUR DES GROS PROJETS

    EN POO AVEC PHP
    => IL Y A UN MECANISME DE CHARGEMENT AUTOMATIQUE DE CODE
    => VRAIMENT COOL POUR LE DEV (ON A PLUS BESOIN DE GERER LES require_once)
    => VRAIMENT COOL POUR LES PERFORMANCES (PHP NE CHARGE QUE LE CODE NECESSAIRE)

```php
<?php

// require_once "php/model/Model.php";
// require_once "php/view/View.php";
// ... 

// FONCTION DE CALLBACK => PHP QUI VA APPELER CETTE FONCTION AUTOMATIQUEMENT
function chargerFichier ($nomClasse)
{
    $tabFichier = glob("php/*/$nomClasse.php");
    foreach($tabFichier as $fichier)    // INUTILE CAR UN SEUL FICHIER
    {
        // DEBUG
        echo "<h3>JE CHARGE LE CODE DANS $fichier</h3>";
        require_once $fichier;
    }
}
// chargerFichier("Model");
// chargerFichier("View");

// PHP VA AUTOMATIQUEMENT APPELER LA FONCTION chargerFichier QUAND IL A BESOIN D'UNE CLASSE
// https://www.php.net/manual/fr/function.spl-autoload-register.php
spl_autoload_register("chargerFichier");

$objetModel = new Model;            // PHP APPELLE LA FONCTION DE CALLBACK chargerFichier("Model")
$objetModel->envoyerRequete();

$objetView = new View;              // PHP APPELLE LA FONCTION DE CALLBACK chargerFichier("View")
$objetView->afficherTitre();


```

    PAUSE ET REPRISE 11H20


## PROPRIETES D'OBJET

    SI static ON PASSE Classe::methode
    https://www.php.net/manual/fr/language.oop5.paamayim-nekudotayim.php


    ON A new POUR CREER UN OBJET A PARTIR DE LA CLASSE (INSTANCIATION)
    $objet = new MaClasse;

    SI PAS static ON UTILISE L'OPERATEUR D'ACCES ->

    ET DANS UNE METHODE D'OBJET ON PEUT $this QUI DONNE PAR QUEL OBJET ON A APPELE LA METHODE

```php
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


```

## METHODES MAGIQUES : CONSTRUCTEUR

    ATTENTION EN PHP8: SIMPLIFICATION PRATIQUE
    https://www.php.net/releases/8.0/en.php#constructor-property-promotion

```php

    // LA CLASSE PDO EST FOURNIE PAR PHP
    Model::$dbh = new PDO($mysql, $user, $password);   // CONNEXION ENTRE PHP ET MySQL
    // ON CREE UN OBJET A PARTIR DE LA CLASSE PDO
    // ET ON PASSE DES PARAMETRES AU CONSTRUCTEUR

    // LA CLASSE WP_Query EST FOURNIE PAR WORDPRESS
    $my_query = new WP_Query('category_name=jeux-video');
    // ON CREE UN OBJET A PARTIR DE LA CLASSE WP_QUery
    // ET ON PASSE UN PARAMETRE AU CONSTRUCTEUR

```

```php
<?php

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


    // METHODES D'OBJET
    function afficherInfos ()
    {
        // $this EST COMME UNE VARIABLE QUI CONTIENT L'OBJET PAR LEQUEL ON A APPELE LA METHODE
        echo "<hr>";
        echo "<h3>MON NOM EST " . $this->nom . "</h3>";
        echo "<h3>MON ADRESSE EST " . $this->adresse . "</h3>";
        echo "<h3>ON COMMENCE A " . Eleve::$horaires[0] ."</h3>";

    }

    // PROPRIETES D'OBJET 
    // => INDIVIDUELLES 
    // => CREES POUR CHAQUE OBJET
    public $nom     = "";
    public $prenom  = "";
    public $adresse = "";

    // METHODE MAGIQUE: CONSTRUCTEUR __construct
    // CALLBACK => PHP QUI VA APPELER CETTE METHODE AUTOMATIQUEMENT
    function __construct ($nom, $adresse)
    {
        $this->nom = $nom;              // ON RANGE LES VALEURS DANS LES PROPRIETES       
        $this->adresse = $adresse;
    }
}
/*
$georges            = new Eleve;
$georges->nom       = "Clooney";
$georges->adresse   = "Aix";

$julie              = new Eleve;
$julie->nom         = "Depardieu";
$julie->adresse     = "Toulon";
*/

$georges = new Eleve("Clooney", "Aix");         // PHP VA APPELER __construct("Clooney", "Aix")
$julie   = new Eleve("Depardieu", "Toulon");

?>
```

    PAUSE DEJEUNER ET REPRISE A 13H45







































