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

    jeudi 07/01

https://prod.liveshare.vsengsaas.visualstudio.com/join?8C7B237E03CE55476ED65AC8B15CBA1AC4F3

## Questions ??

    * COURS POO
    * CORRIGE EXAM INTER A FINIR
    * SYMFONY PLUS AVANCE
    * PROJETS EN EQUIPE
    * PROJET cms
    * ...

## COURS POO

### HERITAGE ENTRE 2 CLASSES

    https://www.php.net/manual/fr/language.oop5.inheritance.php

    LIMITATION: UNE CLASSE ENFANT NE PEUT HERITER QUE D'UN SEUL PARENT
    UNE CLASSE PARENTE PEUT AVOIR PLEIN DE CLASSES ENFANTS
    ET ON PEUT FAIRE UNE LIGNE AVEC DES PETIT-ENFANTS, etc...

    EN PRATIQUE: 
    DRY => MUTUALISER LE CODE DANS LES CLASSES PARENT POUR NE PAS LE DUPLIQUER


```php


// FRAMEWORK
class MaClasseParent
{
    // METHODES D'OBJET (SANS static)
    function afficherTitre ()
    {
        echo "<h1>titre1</h1>";
    }
}

// DEV
class MaClasseEnfant
    extends MaClasseParent
{

}

class MaClassePetitEnfant
    extends MaClasseEnfant
{

}

// DEV PEUT UTILISER LE CODE FOURNI PAR LE FRAMEWORK
$objetEnfant = new MaClasseEnfant;
$objetEnfant->afficherTitre();          // GRACE A L'HERITAGE DE CLASSE


```

### PROBLEMES ET POSSIBILITES DE L'HERITAGE

#### SURCHARGE DE METHODES (OVERRIDE)

```php

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
    function afficherTitre ()
    {
        echo "<h1>PARENT: titre1</h1>";
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

        // SI ON VEUT QUAND MEME APPELER LE CODE DANS LA CLASSE PARENTE
        parent::__construct();
    }

    // METHODES D'OBJET (SANS static)
    function afficherTitre ()
    {
        echo "<h1>ENFANT: titre1</h1>";
    }

}

$objetEnfant = new MaClasseEnfant;      // => PRIORITE A LA METHODE DE CLASSE ENFANT
//
$objetEnfant->afficherTitre();          // => PRIORITE A LA METHODE DE CLASSE ENFANT

```

### COMBINAISON ENTRE CLASSES PLUS BIZARRES...

#### CLASSES ABSTRAITES

    https://www.php.net/manual/fr/language.oop5.abstract.php

```php

// ON PEUT DEFINIR UNE CLASSE ABSTRAITE
// => AJOUTER abstract AVANT class
// => AJOUTER DES METHODES SANS {} MAIS EN AJOUTANT abstract AVANT function 
abstract class MaClasseAbstrait
{
    // METHODES
    function afficherTitre ()
    {

    }

    // METHODE ABSTRAITE
    abstract function afficherContenu ();   // PAS DE BLOC {}
}

// ON NE PEUT PLUS FAIRE new POUR CREER UN OBJET A PARTIR DE CETTE CLASSE
$objetAbstrait = new MaClasseAbstrait;
// => ERREUR PHP



```

### INTERFACES

    DOCUMENTATION:
    https://www.php.net/manual/fr/language.oop5.interfaces.php

```php

// ON PEUT DEFINIR DES INTERFACES AVEC LE MOT interface
// => DANS UNE INTERFACE, ON NE DECLARE QUE DES METHODES ABSTRAITES
// => PERMET DE DETAILLER LE SPECIFICATIONS (SPECS...)
// => PERMET DE TRAVAILLER EN EQUIPE ENTRE PLUSIEURS DEVS
interface MonInterface
{
    // METHODES ABSTRAITES
    function afficherTitre ($titre);   // PAS DE BLOC {}

    function afficherContenu ();   // PAS DE BLOC {}

    // ...
}

// LE DEV S'EN FOUT DES INTERFACES CAR IL N'Y A PAS DE CODE DEDANS ???
// A QUOI CA SERT ?
// => UN CONTRAT QUE LE DEV S'ENGAGE A RESPECTER

class MaClasse
    implements MonInterface
{
    function afficherTitre ($titre)
    {

    }

    function afficherContenu ()
    {

    }

}

$objet = new MaClasse;  // PHP VA VERIFIER SI VOUS AVEZ AJOUTE LE CODE DE CHAQUE METHODE ABSTRAITE


```

    ON PEUT IMPLEMENTER PLUSIEURS INTERFACES
    ET COMBINER AVEC DES HERITAGES DE CLASSE...

    PAUSE ET REPRISE A 11H15

### TRAITS

    https://www.php.net/manual/fr/language.oop5.traits.php






























