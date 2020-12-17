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























