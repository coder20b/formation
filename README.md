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

    mercredi 06/01

https://prod.liveshare.vsengsaas.visualstudio.com/join?0F70A95450844C7612AF4ED50D2EFFDC5C17


## Questions ??


## RESUME DE L'EPISODE PRECEDENT

    AVEC SYMFONY, ON PEUT UTILISER PHP EN LIGNE DE COMMANDE
    => AVEC LE TERMINAL
        (CLI    Command Line Interface)

    php bin/console make:controller
        => POUR CREER DES PAGES POUR LE VISITEUR

    php bin/console make:entity
    php bin/console make:migration
    php bin/console doctrine:migrations:migrate
    php bin/console make:crud
        => POUR CREER LES TABLES SQL ET LES PAGES CRUD (ADMIN)

    php bin/console make:user
    php bin/console make:auth
    php bin/console make:registration-form
        => POUR CREER LA SECURITE ET PROTEGER LA PARTIE ADMIN

    QUAND ON INSTALLE PHP, ON A LE MODE POUR SERVEUR WEB (AVEC LE NAVIGATEUR)
    MAIS ON A AUSSI UN PROGRAMME EN LIGNE DE COMMANDE

    POUR CONNAITRE LA VERSION CLI (QUI PEUT ETRE DIFFERENTE DE LA VERSION SERVEUR WEB...)
    ENTRER LA LIGNE DE COMMANDE php -v

    PS C:\xampp\htdocs\symfony> php -v
    PHP 7.4.6 (cli) (built: May 12 2020 11:38:54) ( ZTS Visual C++ 2017 x64 )
    Copyright (c) The PHP Group
    Zend Engine v3.4.0, Copyright (c) Zend Technologies


## CHECKPOINT AVEC SYMFONY

    PLEIN DE SOUS-DOSSIERS
    PLEIN DE FICHIERS A DROITE ET A GAUCHE
    POUR CODER UNE FONCTIONNALITE
    => ON SE RETROUVE A MODIFIER DU CODE DANS PLEIN D'ENDROITS DIFFERENTS
    => DIFFICILE POUR UN DEBUTANT

    SYMFONY FAIT DE LA POO AU MAXIMUM
    => CODE PLUS LOURD
    => PLEIN DE CLASSES DIFFERENTES ET DE METHODES DIFFERENTES

    TEMPLATE SE FAIT AVEC TWIG
    => AJOUTE UN LANGAGE EN PLUS A APPRENDRE...
    
## PHP EN LIGNE DE COMMANDE (CLI)

    ON PEUT CREER UN FICHIER QUI CONTIENT DU CODE PHP
    ET LE LANCER EN LIGNE DE COMMANDE

    php php/console

    POUR LANCER LE CODE PHP DANS php/console

```php
<?php

// AVEC LE FICHIER .htaccess
// ON NE PEUT ACTIVER CE CODE AVEC LE NAVIGATEUR

// SI ON NE MET PAS DE SUFFIXE AU NOM DU FICHIER
// CA MARCHE MAIS VSCODE EST PERDU
// ET ON PEUT FORCER LE LANGAGE AVEC VSCODE

echo "MA LIGNE DE COMMANDE";

```

## EXEMPLE DE PROGRAMME console

```php
#!/usr/bin/env php
<?php

// AVEC LE FICHIER .htaccess
// ON NE PEUT ACTIVER CE CODE AVEC LE NAVIGATEUR

// SI ON NE MET PAS DE SUFFIXE AU NOM DU FICHIER
// CA MARCHE MAIS VSCODE EST PERDU
// ET ON PEUT FORCER LE LANGAGE AVEC VSCODE

echo "MA LIGNE DE COMMANDE\n";

// PHP EST CAPABLE DE FAIRE PLEIN DE CHOSES COTE SERVEUR
// PHP PEUT
//      LIRE ET CREER DES FICHIERS
//      ENVOYER DES EMAILS
//      ENVOYER DES REQUETES SQL
//      CREER DES IMAGES
//      ... 
// => PHP PEUT FAIRE PLEIN DE CHOSES
//      ET EST INSTALLE SUR UN SERVEUR WEB
//      => IL PEUT COMMUNIQUER AVEC D'AUTRES SERVEURS WEB
// => TRES PUISSANT 
// => PHP NE SAIT PAS TOUT FAIRE MAIS PEUT DEMANDER A D'AUTRES PROGRAMMES DE FAIRE LE TRAVAIL A SA PLACE
// (AUSSI POSSIBLE AVEC UN CONCURRENT COMME python ou nodejs...)

// https://www.php.net/manual/fr/reserved.variables.argv.php
print_r($argv);

/*
php php/console make:controller coucou
MA LIGNE DE COMMANDE
Array
(
    [0] => php/console
    [1] => make:controller
    [2] => coucou
)

*/

// CHARGEMENT AUTOMATIQUE DE CLASSE
// FONCTION DE CALLBACK => PHP QUI VA APPELER CETTE FONCTION AUTOMATIQUEMENT
function chargerFichier ($nomClasse)
{
    $tabFichier = glob("php/*/$nomClasse.php");
    foreach($tabFichier as $fichier)    // INUTILE CAR UN SEUL FICHIER
    {
        // DEBUG
        // echo "<h3>JE CHARGE LE CODE DANS $fichier</h3>";
        require_once $fichier;
    }
}

// PHP VA AUTOMATIQUEMENT APPELER LA FONCTION chargerFichier QUAND IL A BESOIN D'UNE CLASSE
// https://www.php.net/manual/fr/function.spl-autoload-register.php
spl_autoload_register("chargerFichier");


// ON DOIT POUVOIR APPELER LA METHODE STATIC
// CliCommande::afficherDate();
$parametre = $argv[1] ?? "";

echo "ON VEUT LANCER LE CODE $parametre\n";

// ON PEUT LANCER DU CODE PHP DYNAMIQUE
// https://www.php.net/manual/fr/function.is-callable.php
if (is_callable($parametre))
{
    // LE TEXTE DANS $parametre EST UN CODE PHP EXECUTABLE
    // ALORS ON PEUT L'EXECUTER DYNAMIQUEMENT
    $parametre();
}



```

### EXEMPLE DE CLASSE CLI

    POUR FAIRE SIMPLE, ON PEUT CREER DES METHODES STATIC

```php
<?php

class CliCommande
{
    // METHODES STATIC
    static function afficherDate ()
    {
        echo date("H:i:s");
    }

    static function afficherJour ()
    {
        echo date("Y-m-d");
    }

    static function creerClasse ()
    {
        global $argv;
        $nomClasse = $argv[2] ?? "";  // LE NOM DE LA CLASSE EST PASSE EN PARAMETRE DE LA LIGNE DE COMMANDE

        if ($nomClasse != "")
        {
            // CETTE COMMANDE VA CREER LE CODE POUR UNE CLASSE
            $code = file_get_contents("php/controller/Vide.php");

            // FILTRER POUR CHANGER LE CODE DE Vide EN MaClasse
            $code = str_replace("Vide", "$nomClasse", $code);

            file_put_contents("php/controller/$nomClasse.php", $code);

        }

    }

    static function ajouterLigneSql ()
    {
        // CODE POUR INSERER DES LIGNES SQL...
    }
    
}

```

### CREER SA COMMANDE AVEC SYMFONY POUR php bin/console

    UN PROJET PEUT RAJOUTER SES LIGNES DE COMMANDE...

    https://symfony.com/doc/current/console.html#creating-a-command



    PAUSE ET REPRISE A 11H...

## FIN DE MATINEE

    * GIT ET SYMFONY EN EQUIPE
    * AVANCER PLUS LOIN AVEC SYMFONY
    * COURS POO (implements...)
    * ...

## GIT ET SYMFONY

    SYMFONY EST DEJA PARAMETRE POUR ETRE UTILISE AVEC GIT
    => IL Y A DES FICHIERS .gitignore

    POUR ACTIVER GIT DANS NOTRE DOSSIER symfony
    => ENTRER LA COMMANDE git init
    => CREE LE DOSSIER (CACHE) .git

    COMME SYMFONY A DES FICHIERS .gitignore
    => GIT NE VA PAS SUIVRE TOUS LES DOSSIERS / FICHIERS...

    ASTUCE:
    AJOUTER LE DOSSIER /migrations/ DANS .gitignore

```

# ON VA LAISSER DE COTE LE DOSSIER migrations
/migrations/

```

## SYMFONY ET GITHUB

    SUR github.com CREER UN REPO VIDE (SANS FICHIER README.md)
    ET ENSUITE LE CONNECTER AU DOSSIER symfony SUR NOTRE ORDI

```

git remote add origin https://github.com/coder20b/symfony.git
git branch -M main
git push -u origin main

```

    CONNECTE LE DOSSIER AVEC LE REPOSITORY

    (AJOUTE AUTOMATIQUEMENT CE CODE DANS .git/config)

```
[remote "origin"]
	url = https://github.com/coder20b/symfony.git
	fetch = +refs/heads/*:refs/remotes/origin/*
[branch "main"]
	remote = origin
	merge = refs/heads/main
```

## PARAMETRAGE GIT USER ET EMAIL

    https://git-scm.com/book/fr/v2/D%C3%A9marrage-rapide-Param%C3%A9trage-%C3%A0-la-premi%C3%A8re-utilisation-de-Git


    git config --global user.name "prénom NOM"
    git config --global user.email test@tonmail.com


## SYMFONY ET GIT EN EQUIPE...

    UNE PERSONNE DANS L'EQUIPE A UNE INSTALLATION DE SYMFONY EN ETAT DE MARCHE
    ET LE CONNECTE A UN REPO GITHUB.COM

    ENSUITE CETTE PERSONNE VA AJOUTER LES AUTRES MEMBRES DE L'EQUIPE DANS LE REPOSITORY
    ...

    ENSUITE LES AUTRES MEMBRES DE L'EQUIPE VONT CLONER LE REPOSITORY SUR LEUR ORDI

    git clone https://github.com/coder20b/symfony.git

    => DOMMAGE, LE CLONE NE FOURNIT UNE INSTALLATION COMPLETE
    => LES AUTRES MEMBRES DE L'EQUIPE VONT DEVOIR COMPLETER L'INSTALLATION

    LANCER LA COMMANDE DANS LE DOSSIER symfony
    composer install

    => RE-TELECHARGE LE DOSSIER vendor/

    => SI ON A COPIE LA DATABASE ALORS TOUT REMARCHE COMME AVANT ;-p
        (SINON IL FAUT FAIRE UN EXPORT/IMPORT DE LA DATABASE SQL...) 


## GIT ET LES BRANCHES

### UTILISATION HISTORIQUE POUR LA CORRECTION DE BUG

    HISTORIQUEMENT LES BRANCHES SERVENT A FAIRE DES CORRECTIONS DE BUG
    RELEASES        => VERSIONS PUBLIQUES EN VENTE

    LOGICIEL V1     => VENDRE A DES UTILISATEURS
                    => SI IL Y A DES BUGS SUR LA V1
                    => ON VA CREER UNE BRANCHE DEPUIS LA V1.0
                            BRANCHE V1.1
                            => PERMET DE CORRIGER LE BUG A PARTIR DE L'ANCIENNE VERSION V1.0

    LOGICIEL V2     => EN DEV... master


### UTILISATION POUR LE DEV OPEN SOURCE

    UTILISATION EN DEV... POUR LES DEV CONFIRMES
    => ON PEUT RAJOUTER DU CODE DE DEV SUR UNE BRANCHE
    => ON EST ISOLE/SEPARE DE LA VERSION master

    => MAUVAIS COTE: ACCUMULE BEAUCOUP DE CODE MODIFIE
    => ET IL FAUT A UN MOMENT LE FUSIONNER AVEC LE master
    => IL Y A SOUVENT BEAUCOUP DE CONFLITS 
            => DIFFICILE A RESOUDRE POUR UN DEV DEBUTANT

    AVEC GITHUB.COM
    => QUAND ON FAIT UN PROJET OPEN SOURCE
    => VOUS NE DONNEZ PAS LES DROITS DE MODIF A N'IMPORTE QUI...
    
    => SI UN CONTRIBUTEUR DEV VAUT FAIRE DU CODE SUR LE PROJET
    => IL CREE UNE BRANCHE POUR AJOUTER SON CODE
    => IL PROPOSE SA BRANCHE A FUSIONNER DANS LE PROJET master
    => PULL REQUEST
    => LE PROPRIETAIRE PEUT ACCEPTER LE PULL REQUEST 
            => FUSION/MERGE DU CODE DE LA BRANCHE DANS LA BRANCHE master


    SITUATION DE CRISE...
    UN DEV DEBUTANT CASSE LE PROJET A CHAQUE PUSH SUR LE master
    => POUR EVITER LE BLOCAGE DE TOUTE L'EQUIPE
    => CREER UNE BRANCHE POUR CE DEVELOPPEUR
            => PUSH SUR SA BRANCHE 
            => ISOLE DU RESTE DU PROJET
            => A LA FIN, IL FAUDRA RECUPERER SON CODE...
            => GENERALEMENT A EVITER POUR LES DEBUTANTS...
                    CAR ON ACCUMULE LES PROBLEMES...

    PAUSE DEJEUNER ET REPRISE A 13H45...


## ACTIVITES POUR CET APRES MIDI

    LE CODE DE MON PROJET symfony EST DANS LE REPOSITORY GITHUB symfony...

    https://github.com/coder20b/symfony

    AUTONOMIE EN EQUIPE POUR LA MISE EN PLACE DU GIT DU PROJET...

    CHECKPOINT TOUTES LES 30 MINUTES...
    CHECKPOINT A 14H30...
    CHECKPOINT A 15H00...
    CHECKPOINT A 15H30...

    NE PAS HESITER A POSER DES QUESTIONS...

    SI VOUS AVEZ CREE LE REPOSITORY POUR LE PROJET, 
    => ME DONNER L'URL DU REPOSITORY SUR GITHUB POUR QUE JE LE NOTE

## EQUIPE A

    Kevin
    Christel
    Elphège
    Céline

## EQUIPE B

        IDEE DE PROJET:
        MARKETPLACE DES COMMERCES DE QUARTIER

    Benjamin
    Olivier
    Tony
    Maeva

## EQUIPE C

        IDEE DE PROJET:
        REFONTE DE SITE AVEC BDD
        https://byrsa.tech/

    Alexandre
    Mehdi
    Bilel
    Arsenio

## EQUIPE D

        IDEE DE PROJET:
        APPLICATION MOBILE

    Joseph
    Maxime
    Moussa
    Marc

## EQUIPE E

    Flora
    Steph
    Quentin












