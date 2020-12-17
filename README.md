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

    jeudi 17/12

https://prod.liveshare.vsengsaas.visualstudio.com/join?B1BDBF0124A83DC98AEC49C340EBEC45CFA8


## Questions ??

## RESUME DE L'EPISODE PRECEDENT

    POO:    Programmation Orienté-Objet
    => TECHNIQUES DE PROGRAMMATION
    => CREE POUR LES PROJETS EN EQUIPE EN ENTREPRISE
    => CREE POUR GERER LES GRANDS VOLUMES DE CODE

    BOITES EN PLUS POUR RANGER SON CODE

```php

// ETAPE 1: DECLARATION
class MaClasse1
{
    // PROPRIETES D'OBJET
    public $nom = "";       // UNE PROPRIETE D'OBJET EXISTE TANT QUE SON OBJET EXISTE

    // METHODES
    function faireTravail ()
    {
        // ICI QUE LE DEV ECRIT SON CODE
        $resultat = 0;  // VARIABLE LOCALE
    }

    function afficherResultat ()
    {
        // ICI QUE LE DEV ECRIT SON CODE
    }
}

// ETAPE 2: CREATION/INSTANCIATION D'UN OBJET
$objetMaClasse1 = new MaClasse1;    // UN OBJET EST UNE VALEUR

class MaClasse2
{
    // METHODES
    function faireRequete ()
    {
        // ICI QUE LE DEV ECRIT SON CODE
    }
}

// METIER Chauffeur
// COMPETENCES/SAVOIR-FAIRE:    conduire, controler, eviterPietons
class Chauffeur
{
    // PROPRIETES D'OBJET (INDIVIDUEL A CHAQUE OBJET)
    public $nom = "";

    // METHODES D'OBJET
    function conduire ()
    {

    }

    function controler ()
    {

    }

    function eviterPietons ()
    {

    }
}

// OBJET EST UNE PERSONNE QUI EXERCE LE METIER
$alfred = new Chauffeur;
$alfred->nom = "Wilfried";      // CHAQUE OBJET PEUT AVOIR UN NOM DIFFERENT

$alfred->conduire();
$alfred->controler();

$uber = new Chauffeur;
$uber->nom = "Moussa";          // CHAQUE OBJET PEUT AVOIR UN NOM DIFFERENT
$uber->conduire();

// PROGRAMMATION PAR CLASSE (static)
class VoitureAutonome
{
    // METHODE DE CLASSE STATIC
    static function conduire ()
    {

    }
}

VoitureAutonome::conduire();

```

## METHODES MAGIQUES

    DOCUMENTATION POO:
    https://www.php.net/manual/fr/language.oop5.php

    DOCUMENTATION METHODES MAGIQUES:
    https://www.php.net/manual/fr/language.oop5.magic.php

```php

class MaClasse
{
    // METHODES
    function afficherTexte ()
    {
        // ...
    }

    // METHODE MAGIQUE OPTIONNELLE: CONSTRUCTEUR
    // COMME UN CALLBACK    => PHP VA APPELER AUTOMATIQUEMENT CETTE METHODE
    function __construct ()
    {

    }
}

$objetMaClasse = new MaClasse;  // PHP APPELLE AUTOMATIQUEMENT LA METHODE __construct


```

### DESTRUCTEUR

```php
<?php

class Page 
{

    // METHODES
    function __construct ()
    {
        echo "<h1>CODE DU HEADER DE MA PAGE</h1>";
    }

    function __destruct ()
    {
        echo "<h1>CODE DU FOOTER DE MA PAGE</h1>";
    }

    function afficherMain ()
    {
        echo "<h1>CODE DU MAIN DE MA PAGE</h1>";
    }

}

$objetPage = new Page;          // => __construct() => CREER LE CODE DU HEADER
$objetPage->afficherMain();     //                  => CREER LE CODE DU MAIN
                                // => __destruct()  => CREER LE CODE DU FOOTER

```

    PAUSE ET REPRISE A 11H...

### METHODE MAGIQUE __toString

    https://www.php.net/manual/fr/language.oop5.magic.php#object.tostring

    AVEC PHP ON CONCATENE BEAUCOUP DE TEXTE POUR CREER DU HTML...

    UN OBJET PEUT SE DEGUISER EN TEXTE AVEC CETTE METHODE MAGIQUE __toString

```php

class Main
{

    // METHODE 
    function __toString ()
    {
        $texteQuiRemplaceObjet = "<h1>CODE DU MAIN</h1>";
        return $texteQuiRemplaceObjet;
    }

}

$objetMain = new Main;

echo 
<<<x
<h1>CODE DU HEADER</h1>
$objetMain
<h1>CODE DU FOOTER</h1>
x;


```

## HERITAGE ENTRE CLASSES

    DOCUMENTATION
    https://www.php.net/manual/fr/language.oop5.inheritance.php

    DRY: DON'T REPEAT YOURSELF
    => EVITER D'AVOIR DU CODE DUPLIQUE
    => COMMENT CENTRALISER LE CODE A UN SEUL ENDROIT ?

    * ON DOIT RESPECTER LES PRINCIPES DE LA POO
    => UNE METHODE EST RANGEE DANS UNE CLASSE

    => ON RANGE NOTRE CODE DANS UNE CLASSE
    => IL FAUT MAINTENANT POUVOIR RELIER LES CLASSES ENTRE ELLES

```php

class Centrale
{
    // PROPRIETES D'OBJET
    // VISIBILITE public OU protected OU private
    public $nom = "";

    // METHODES
    function afficherCoucou ()
    {
        echo "<h1>coucou</h1>";
    }

}

class MaClasseA
    extends Centrale        // HERITAGE: MaClasseA EST UNE CLASSE ENFANT DE LA CLASSE PARENTE Centrale
{
    // PROPRIETES

}

class MaClasseB
    extends Centrale       // HERITAGE: MaClasseB EST UNE CLASSE ENFANT DE LA CLASSE PARENTE Centrale
{
    // PROPRIETES

}

$objetMaClasseA = new MaClasseA;
// ON PEUT APPELER UNE METHODE QUI EST DANS LA CLASSE PARENTE
$objetMaClasseA->afficherCoucou();  


```


## VISIBILITE DES PROPRIETES ET DES METHODES

### public LE PLUS SIMPLE ET OUVERT

```php

class MaClasseA
{
    // PROPRIETES public
    public $nom = "";
}

$objetMaClasseA = new MaClasseA;
$objetMaClasseA->nom =  "coucou";   // POSSIBLE CAR public

```

### public OU protected OU private

    public      LECTURE+ECRITURE PAR TOUT LE MONDE
    protected   LECTURE+ECRITURE POUR LES CLASSES ENFANTS
    private     LECTURE+ECRITURE SEULEMENT DANS LES METHODES DE LA CLASSE


```php
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


```

## METHODES GETTERS ET SETTERS


    RECOMMENDATION OFFICIELLE DANS LA POO...
    IL NE FAUT JAMAIS CREER DES PROPRIETES EN VISIBILITE public
    => protected OU private

    => C'EST HORRIBLE CAR CA RAJOUTE PLEIN DE CODE
            ET AU FINAL ON A RIEN GAGNE EN SECURITE
    => EXPLICATION: ON POURRAIT RAJOUTER DE LA SECURITE EN CAS DE BESOIN

    => MALHEUREUSEMENT (PLUS DE 20 ANNEES DE PROGRAMMATION EN POO...)
    => DANS 99% DES CAS, ON NE RAJOUTE JAMAIS DE SECURITE
    => C'EST COMPLETEMENT INEFFICACE :-/
        (CERTAINS COMPILATEURS DEFONT LES GETTERS ET SETTERS POUR REGAGNER EN PERFORMANCE...)

    => C'EST TELLEMENT LOURD QUE LES IDE PROPOSENT DES GENERATEURS DE GETTERS ET SETTERS...

    => SYMFONY UTILISE LES GETTERS ET LES SETTERS...

```php

class User
{
    // PROPRIETES
    // ...
    protected $pseudo = "";
    protected $email  = "";

    // GETTERS (LECTURE)
    public function getPseudo ()
    {
        return $this->pseudo;
    }

    public function getEmail ()
    {
        return $this->email;
    }

    // SETTERS (ECRITURE)
    public function setPseudo ($nouvelleValeur)
    {
        $this->pseudo = $nouvelleValeur;
    }

    public function setEmail ($nouvelleValeur)
    {
        $this->email = $nouvelleValeur;
    }

}

$admin = new User;
// $admin->email = "hello@mail.me";   // ERREUR CAR protected

```

### AUTONOMIE ET ENSUITE PAUSE DEJEUNER ET REPRISE A 13H50

    N'HESITEZ PAS A POSER DES QUESTIONS...


## QUESTIONS ??

## ACTIVITES POUR CET APRES-MIDI...

    * EXEMPLE DE PROJET ONE PAGE EN METHODO POO...

    * PROJET CMS
        SECURITE INSCRIPTION (DOUBLONS...)
        SECURITE ADMIN

    * AUTRES IDEES ???

## METHODO POO

    METHODO AGILE
    => ON VA Y ALLER PROGRESSIVEMENT 
    => EN EFFET LE CLIENT NE SAIT PAS DES LE DEPART TOUS SES BESOINS.

    PARTIR DU PLUS LARGE ET ENSUITE ENTRER DANS LES DETAILS PROGRESSIVEMENT.

    EQUIPE DEV
    CLIENT      => VEUT UN SITE ONE PAGE

    * DEFINIR LES BESOINS DU CLIENT (RDV AVEC LE CHEF DE PROJET...)
    * => REDACTION DU CAHIER DES CHARGES
            DOCUMENT ECRIT EN FRANCAIS (LE CLIENT NE COMPREND PAS LE CODE...)

    EXEMPLE DE CAHIER DES CHARGES:
    * IL FAUT QUE CE SOIT JOLI
    * IL FAUT QUE LE SITE FONCTIONNE TOUT SEUL
    * A QUOI SERT LE SITE ?
        POUR ATTIRER UNE CLIENTELE ET AUGMENTER CHIFFRE AFFAIRES
    * IL FAUT GAGNER EN VISIBILITE
    * IL FAUT QUE LES VISITEURS PUISSENT CONTACTER LE CLIENT
    * BUDGET
    * PLANNING
    * PERSONA DU CLIENT ?
    *   COACH SPORTIF
    * PERSONA(S) VISITEUR(S)
    *   MINCIR
    *   ENTRETENIR
    *   RENFORCEMENT PERFORMANCES MUSCULAIRES
    * AFFICHER DES AVIS CLIENTS SATISFAITS

    EN POO
        Classe                  SUJET
            Methode             VERBE
                Paramètres      COMPLEMENT

## AUTONOMIE JUSQU'A LA PAUSE DE 15H45

    * REVOIR LA PARTIE COURS
    * REVOIR LA PARTIE PROJET POO

    PAUSE ET REPRISE A 16H...

    * AUTONOMIE POUR LE RESTE DE LA JOURNEE ?
    * AVANCER SUR LE PROJET CMS ?
    * AVANCER SUR LES PROJETS EN EQUIPE ?
    * ...


## COOKIES

    INFOS STOCKEES DANS LE NAVIGATEUR
    MAIS QUI AUSSI PARTAGEES AVEC LE SERVEUR

    => ON PEUT GERER DES COOKIES AUTANT COTE FRONT (JS) QUE COTE BACK (PHP)

    => LES COOKIES VONT ETRE ECHANGES AUTOMATIQUEMENT POUR TOUTES LES REQUETES
    
























































