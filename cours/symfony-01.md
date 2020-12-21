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

    lundi 21/12
    nouveau lien liveshare

https://prod.liveshare.vsengsaas.visualstudio.com/join?A316A52279C954090ECFF7529AFD98FBE36B

## Questions ??


## PROGRAMME DE LUNDI ET MARDI

    * SQL:          RELATIONS ENTRE TABLES SQL
    * Symfony:      DEMARRER AUJOURD'HUI ?
    * Git:          COMMENCER A TRAVAILLER EN EQUIPE ?
    * CORRIGE EXAM: MARDI APRES-MIDI ?
    * COURS POO:    TOUJOURS DES CHOSES A AVANCER...
    * ...

    LUNDI MATIN     RELATIONS SQL
    LUNDI APREM     INSTALLATION SYMFONY (GIT ?)
    MARDI MATIN     DEMARRER UTILISATION SYMFONY
    MARDI APREM     GIT / CORRIGE EXAM

## SQL ET RELATIONS ENTRE TABLES

    PHASE DE MODELISATION
    => AVANT DE COMMENCER A CODER
    => SE POSER LES QUESTIONS QUELLES SONT LES INFORMATIONS QU'ON VA MANIPULER
    => ET COMMENT ON LES STOCKE DANS SQL ?
            DE COMBIEN DE TABLES SQL ON A BESOIN POUR GERER TOUTES LES INFORMATIONS ?

EXEMPLE:
    Table user
    Table page

    QUAND ON CREE UNE PAGE, ON NE MEMORISE QUEL UTILISATEUR A CREE LA PAGE ?!

    SI ON CREE UNE MARKETPLACE (LE BON COIN...)
    => IL Y AURA DES UTILISATEURS PUBLICS
    => QUAND UN VISITEUR VA CREER UNE ANNONCE
        ON A BESOIN DE MEMORISER QUI A CREE QUELLE ANNONCE ?

    Table user
    Table annonce

    => POUR UNE ANNONCE CREEE DANS LA TABLE annonce
        ON A BESOIN DE MEMORISER QUELLE LIGNE DANS LA TABLE user EST L'AUTEUR


    => RELATIONS ENTRE TABLES SQL
    => ON DIT QUE SQL EST UNE BASE DE DONNEES RELATIONNELLE

    ENTRE 2 TABLES, DANS SQL ON DISTINGUE 3 TYPES DE RELATIONS
    * ONE TO ONE
    * ONE TO MANY
    * MANY TO MANY

## RELATION ONE TO ONE

    EXEMPLE SITE ANNONCES
    Table annonce
        id
        titre
        description
        prix
        categorie
        marque
        etat
        couleur
        -- annonces voitures
        modele
        anneeFabrication
        dateMiseCirculation
        kilometrage
        carburant
        -- annonce vetements
        univers
        taille
        typeVetement


    => PROBLEME
    => SI ON CREE TOUTES LES COLONNES DANS UNE SEULE TABLE SQL
    => ON VA A VOIR DES TROUS DANS NOTRE TABLE
    =>  ANNONCE VOITURE AURA DES TROUS SUR LES COLONNES univers, taille et typeVetement
        ANNONCE VETEMENTS AURA DES TROUS SUR LES COLONNES model, anneeFabrication, etc...

    SI JE NE VEUX PAS DE TROUS
    => ON PEUT CREER 3 TABLES SQL
    => MAIS ALORS ON BESOIN DE RELIER LES TABLES annonce_voiture ET annonce_vetements
            AVEC annonce

    Table annonce
        id            INT          => CLE PRIMAIRE (PRIMARY_KEY)
        id_user       INT          => CLE ETRANGERE (FOREIGN KEY)
        titre
        description
        prix
        categorie
        marque
        etat
        couleur

    Table annonce_voiture
        id           INT           => CLE PRIMAIRE (PRIMARY_KEY)
        id_annonce   INT           => CLE ETRANGERE (FOREIGN KEY)
        modele
        anneeFabrication
        dateMiseCirculation
        kilometrage
        carburant

    Table annonce_vetement
        id           INT           => CLE PRIMAIRE (PRIMARY_KEY)
        id_annonce   INT           => CLE ETRANGERE (FOREIGN KEY)
        univers
        taille
        typeVetement



    POUR SAVOIR LE TYPE DE RELATION (CARDINALITE...)
    ON SE POSE 2 QUESTIONS 
    * POUR UNE LIGNE DE LA TABLE 1 COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE 2
    * POUR UNE LIGNE DE LA TABLE 2 COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE 1

    SI ON SE POSE LA QUESTION ENTRE annonce ET annonce_vetement
    * POUR UNE LIGNE DE annonce COMBIEN DE LIGNES SONT ASSOCIEES DANS annonce_vetement ?
        REPONSE 0 OU 1      => ONE
    * POUR UNE LIGNE DE annonce_vetement COMBIEN DE LIGNES SONT ASSOCIEES DANS annonce
        REPONSE 1           => ONE

    => RELATION ONE TO ONE
    => EN PRATIQUE: ON AJOUTE UNE COLONNE DE CLE ETRANGERE DANS LA TABLE COMPLEMENTAIRE

## RELATION ONE TO MANY

    EXEMPLE: POUR UNE ANNONCE, ON A BESOIN DE SAVOIR QUI A CREE CETTE ANNONCE
        Table annonce
        Table user

    POUR SAVOIR LE TYPE DE RELATION (CARDINALITE...)
    ON SE POSE 2 QUESTIONS 
    * POUR UNE LIGNE DE LA TABLE 1 COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE 2
    * POUR UNE LIGNE DE LA TABLE 2 COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE 1

    ON SE POSE 2 QUESTIONS 
    * POUR UNE LIGNE DE annonce COMBIEN DE LIGNES SONT ASSOCIEES DANS user ?
        UNE ANNONCE EST CREE PAR UN SEUL UTILISATEUR
        => ONE
    * POUR UNE LIGNE DE user COMBIEN DE LIGNES SONT ASSOCIEES DANS annonce ?
        UN UTILISATEUR PEUT NE PAS AVOIR D'ANNONCE          => 0
        UN UTILISATEUR PEUT CREER UNE PREMIERE ANNONCE      => 1
        UN UTILISATEUR PEUT CREER PLUSIEURS ANNONCES        => MANY

    RELATION ONE TO MANY
    => EN PRATIQUE: ON AJOUTE UNE COLONNE DE CLE ETRANGERE DANS LA TABLE MANY


## RELATION MANY TO MANY

    PAUSE ET REPRISE A 11H...

    Table annonce
    Table user

    ON SE POSE 2 QUESTIONS 
    * POUR UNE LIGNE DE LA TABLE 1 COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE 2
    * POUR UNE LIGNE DE LA TABLE 2 COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE 1

    ON SE POSE 2 QUESTIONS MAIS POUR LES FAVORIS CETTE FOIS
    * POUR UNE LIGNE DE annonce COMBIEN DE LIGNES SONT ASSOCIEES DANS user ?
        UNE ANNONCE PEUT ETRE MISE EN FAVORI PAR PLUSIEURS UTILISATEURS
        => REPONSE: MANY (0, 1 OU PLUS...)
    * POUR UNE LIGNE DE user COMBIEN DE LIGNES SONT ASSOCIEES DANS annonce ?
        UN UTILISATEUR PEUT MEMORISER PLUSIEURS ANNONCES EN FAVORI
        => REPONSE: MANY (0, 1 OU PLUS...)

    => RELATION MANY TO MANY
    => PLUS COMPLIQUE A GERER...
            IMPORTANT DE LE DETECTER RAPIDEMENT
            CAR LOURD A GERER DANS LES PROJETS... 
            (CONSOMME TEMPS ET DES RESSOURCES...)

    EN PRATIQUE:
        ON BRICOLE 2 x ONE TO MANY
        ON CREE UNE TABLE TECHNIQUE SUPPLEMENTAIRE

    EXEMPLE:    
        CREER UNE TABLE annonce_user
        id          INT     INDEX=PRIMARY   (CLE PRIMAIRE POUR LA TABLE annonce_user)
        id_annonce  INT                     (CLE ETRANGERE VERS LA TABLE annonce)
        id_user     INT                     (CLE ETRANGERE VERS LA TABLE user)


    ASTUCE:
        CONTRAINTES DE CLE ETRANGERES
        => SECURITE EN PLUS POUR LES COLONNES DE CLE ETRANGERES
        => AJOUTER A LA FIN DU DEV POUR AMELIORER LA SECURITE
            MAIS EVITER EN COURS DE DEV CAR CA AJOUTE DES CONTRAINTES SUR LE DEV EN EQUIPE


    ASTUCE POUR LA MODELISATION
        USE CASE
        SCENARIOS D'UTILISATION (PERSONA CLIENT ET VISITEURS...)
        SI ON CREE LES MAQUETTES (HTML ET CSS)
        => ON SAIT QUELLES INFORMATIONS ON DOIT AFFICHER SUR CHAQUE PAGE
        =>  TABLE SQL ET COLONNES
            ET AUSSI LES RELATIONS ENTRE TABLES SQL
        => MODELE CONCEPTUEL DES DONNEES (MCD)


## POUR LE TEMPS AVANT LA PAUSE DEJEUNER

    ACTIVITE PRATIQUE EN EQUIPE PROJET
        EQUIPE REFLECHIR A LA MODELISATION POUR VOTRE PROJET
        => ARRIVER A DETERMINER LES TABLES SQL
            ET LES RELATIONS ENTRE LES TABLES

    PAUSE DEJEUNER VERS 12H45...
    N'HESITEZ PAS A POSER DES QUESTIONS...

    ET REPRISE A 13H45...

## SYMFONY

    FRAMEWORK PHP+SQL
        MVC

    FRAMEWORK
    =>  BIBLIOTHEQUE DE CODE
    =>  + ORGANISATION EN DOSSIERS ET FICHIERS SPECIFIQUES

    CREE EN 2005 PAR FABIEN POTENCIER (FRANCE)

    https://openclassrooms.com/fr/courses/5489656-construisez-un-site-web-a-l-aide-du-framework-symfony-4

    ENTREPRISE (FONDE PAR FABIEN POTENCIER)
    https://sensiolabs.com/fr/

    REVENDU A SMILE EN 2019 (SOCIETE DE SERVICES SPECIALISE DANS OPEN SOURCE...)

    EN 2005, CONCURRENCE DE JAVA ET JSP (Java Server Pages)
    => FRAMEWORK PHP+SQL
    => AUSSI ROBUSTE ET MOINS CHER
    => SYMFONY

    JAVA EST "LA" REFERENCE DANS LES LANGAGES ORIENTE-OBJET
    => SYMFONY VA AUSSI FAIRE DE LA POO

## LES RELEASES DE SYMFONY


    https://symfony.com/releases

    SYMFONY 2 (2011)
    => VERSION QUI REND SYMFONY POPULAIRE
    => MAIS TROP COMPLIQUE (AU SECOURS IL Y A DES BUNDLES PARTOUT...)

    SYMFONY 3 (2015)
    => VERSION PLUS SIMPLE
    => ON CREE UN SEUL BUNDLE POUR LE PROJET
    => MAIS IL FAUT ADAPTER LE CODE D'UN PROJET SYMFONY 2

    SYMFONY 4 (2017)
    => VERSION PLUS SIMPLE ET PLUS LEGERE (INSTALLATION MINIMUM DEVIENT 1/3 D'UN SYMFONY 3)
    => (IL Y A TOUJOURS DES BUNDLES... MAIS ON N'EN PARLE PLUS...)
    => INSTALLATION ET CONFIGURATION SIMPLE (RECETTES/RECIPES)
    => MAIS IL FAUT ADAPTER LE CODE D'UN PROJET SYMFONY 3 POUR MIGRER VERS SYMFONY 4

    SYMFONY 5 (2019)
    => ENCORE PLUS SIMPLE MAIS SANS TROP DE NOUVEAUTES PAR RAPPORT SYMFONY 4
    => MIGRATION PLUS LIGHT SI ON EST SUR SYMFONY 4

    VERSION STABLE ACTUELLE => SYMFONY 5.2 (NOVEMBRE 2020)

    POUR LES ENTREPRISES QUI VEULENT MINIMISER LE NOMBRE DE MIGRATIONS
    => VERSIONS LTS (Long Term Support)
    => VERSION LTS ACTUELLE => 4.4  => 2023

    CONCURRENCE
    * LARAVEL   (PLUS POPULAIRE AU NIVEAU INTERNATIONAL)
    * SYMFONY   (PLUS POPULAIRE EN FRANCE...)
                    => SUPPORT, CONSEIL, CERTIFICATIONS
                    => CERTIFICATIONS (CHERES ET DIFFICILES...)
                            RECONNU POUR LES COMPETENCES POO

    SYMFONY
    => CIBLE PRINCIPALE: PROJET EN ENTREPRISE ET EN EQUIPE                                                

    LARAVEL
    => https://laravel.com/
    => CIBLE PRINCIPALE: PETIT ET MOYEN PROJET (FREELANCE ET PME)

    MAIS ILS ESSAIENT D'ETENDRE LEUR TERRITOIRES ET PART DE MARCHES...

    EXEMPLE DE PROJET: DAILYMOTION...
    https://www.yumpu.com/fr/document/read/35951612/symfony-et-dailymotion-une-migration-racussie



## DOCUMENTATION OFFICIELLE

    https://symfony.com/doc/current/index.html

    2019: FABIEN ECRIT UN BOUQUIN SUR SYMFONY 5
    TRADUIT EN PLUSIEURS LANGUES (DONT FRANCAIS...)
    https://symfony.com/doc/current/the-fast-track/fr/index.html


## SETUP

    https://symfony.com/doc/current/setup.html

    INSTALLATION DE COMPOSER

    TESTER
    OUVRIR UN TERMINAL DANS VSCODE (POWERSHELL...)
    ECRIRE LA LIGNE DE COMMANDE (ET ENSUITE FAIRE ENTREE)
    composer -v

    => SI VOUS VOYEZ LE LOGO ET LE RESTE 
    => OK COMPOSER EST INSTALLE...

    SUR WINDOWS
    https://getcomposer.org/download/
    IL Y A UN LIEN POUR LE .EXE
    https://getcomposer.org/Composer-Setup.exe
    => TELECHARGER ET LANCER LE PROGRAMME D'INSTALLATION

    => UNE FOIS L'INSTALLATION FINIE
    => REDEMARRER VSCODE ET REESSAYER composer -v
    => NORMALEMENT C'EST OK

## AUTRE INSTALLATION 

    SI MAC OU AUTRE
    OUVRIR UN TERMINAL 
    ET LANCER LA COMMANDE

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

    => TELECHARGE LE FICHIER composer-setup.php

    php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

    => Installer Verified

    php composer-setup.php

    => TELECHARGE UN FICHIER composer.phar

    php -r "unlink('composer-setup.php');"

    => EFFACE LE FICHIER composer-setup.php

    ET FINALEMENT TESTER

    php composer.phar -v

    => SI TOUT VA BIEN ON VOIT LE LOGO ;-p

    COMPOSER EST UN OUTIL DE GESTION DE PACKAGES DE CODE
    => POUR GERER DES BIBLIOTHEQUES DE CODE PLUS FACILEMENT DANS SES PROJETS PHP...

    SI composer DISPO (AVEC SETUP.EXE...)

    composer create-project symfony/website-skeleton symfony

    SI composer.phar

    php composer.phar create-project symfony/website-skeleton symfony


    SI TOUT VA BIEN
    => CA TELECHARGE PLEIN DE FICHIERS... ATTENDRE...
     ET A LA FIN ON DEVRAIT VOIR 

```
     Some files may have been created or updated to configure your new packages.
Please review, edit and commit them: these files are yours.

Some files may have been created or updated to configure your new packages.
Please review, edit and commit them: these files are yours.


 What's next? 


  * Run your application:
    1. Go to the project directory
    2. Create your code repository with the git init command
    3. Download the Symfony CLI at https://symfony.com/download to install a development web server

  * Read the documentation at https://symfony.com/doc


 What's next? 


  * You're ready to send emails.

  * If you want to send emails via a supported email provider, install
    the corresponding bridge.
    For instance, composer require mailgun-mailer for Mailgun.

  * If you want to send emails asynchronously:

    1. Install the messenger component by running composer require messenger;
    2. Add 'Symfony\Component\Mailer\Messenger\SendEmailMessage': amqp to the
       config/packages/messenger.yaml file under framework.messenger.routing
       and replace amqp with your transport name of choice.

  * Read the documentation at https://symfony.com/doc/master/mailer.html


 Database Configuration


  * Modify your DATABASE_URL config in .env

  * Configure the driver (mysql) and
    server_version (5.7) in config/packages/doctrine.yaml


 How to test?


  * Write test cases in the tests/ folder
  * Run php bin/phpunit

```

    ET DONC ON DOIT OBTENIR UN DOSSIER symfony 
    AVEC PLEIN DE CHOSES DEDANS...


## 1ERE VERIFS APRES L'INSTALLATION

    DANS LE NAVIGATEUR, ALLER SUR L'URL DU DOSSIER symfony/public/

    http://localhost:8888/symfony/public/

    => ON DOIT VOIR UNE PAGE AVEC SYMFONY ET LA VERSION 5.2.1...

    IL FAUT COMPLETER L'INSTALL AVEC .htaccess

    https://symfony.com/doc/current/setup/web_server_configuration.html#adding-rewrite-rules

    ALLER DANS LE DOSSIER symfony
    cd symfony

    ENTRER LA LIGNE DE COMMANDE

    composer require symfony/apache-pack

    OU 

    php ../composer.phar require symfony/apache-pack

    => ATTENTION: A LA QUESTION SUR LA RECETTE (recipe)
    => REPONDRE YES (y) ET ENSUITE APPUYER SUR ENTREE

    => SI TOUT SE PASSE BIEN ON LE FICHIER .htaccess
        DANS LE DOSSIER public/

    ET RE-ESSAYER DANS LE NAVIGATEUR

    http://localhost:8888/symfony/public/

    ET ON DOIT AVOIR UN BANDEAU NOIR EN BAS (PROFILER POUR LE DEBUG...)


## EN RESUME

    * INSTALLER composer
    * CREER UN PROJET

    composer create-project symfony/website-skeleton symfony

    * COMPLETER L'INSTALL POUR AVOIR symfony/public/.htaccess
        ALLER DANS LE DOSSIER symfony
        cd symfony

        ENTRER LA LIGNE DE COMMANDE
        composer require symfony/apache-pack
   
        PIEGE: REPONDRE y A LA QUESTION DE LA RECETTE (recipe...)

    ET VERIFIER QUE LA PAGE S'AFFICHE CORRECTEMENT
    http://localhost:8888/symfony/public/

    PAUSE MAINTENANT ET REPRISE 16H05...


## MA PREMIERE PAGE AVEC SYMFONY

    https://symfony.com/doc/current/page_creation.html

    https://symfony.com/doc/current/page_creation.html#creating-a-page-route-and-controller

    CREER UN FICHIER DANS src/Controller/

```php
<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
    /**
     * @Route("/lucky/number")
    */    
    public function number(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}

```

    SI LA RACINE DU SITE EST:

    http://localhost:8888/symfony/public/

    /**
     * @Route("/lucky/number")
     */    

    => DANS LE NAVIGATEUR ON POURRA VOIR LA PAGE AVEC L'URL
    http://localhost:8888/symfony/public/lucky/number



## EXEMPLE DE SITE VITRINE

    ON VEUT CREER 3 PAGES
    Accueil     /
    Galerie     /galerie
    Contact     /contact

    SI ON VEUT CREER LA PAGE Contact AVEC L'URL /contact
    => COMMENT ON FAIT ?


## TEMPLATE AVEC SYMFONY ET TWIG

    https://twig.symfony.com/

    https://symfony.com/doc/current/page_creation.html#rendering-a-template

    MODIFIER LE CODE PHP
    ET AJOUTER LES FICHIERS TWIG DANS templates/

```php
<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// POUR UTILISER TWIG ON CREE UN HERITAGE DE CLASSE 
// AVEC LA CLASSE PARENTE AbstractController
class VitrineController extends AbstractController
{
    /**
     * @Route("/")
     */    
    function accueil ()
    {
        return $this->render("vitrine/index.html.twig");
    }

    /**
     * @Route("/galerie")
     */    
    function galerie ()
    {
        return $this->render("vitrine/galerie.html.twig");
    }

    /**
     * @Route("/contact")
     */    
    function contact ()
    {
        // LA METHODE render VIENT DE LA CLASSE PARENTE AbstractController
        // ON VA CHARGER LE CODE DU TEMPLATE 
        // templates/vitrine/contact/html.twig
        // (DANS VSCODE AJOUTER UNE EXTENSION POUR LES FICHIERS .twig)
        return $this->render("vitrine/contact.html.twig");
    }

}

```


## EXERCICE: AJOUTER UNE PAGE services OU produits OU blog

    POUR VERIFIER QUE VOUS AVEZ COMPRIS LES BASES AVEC SYMFONY ET TWIG...

    FIN DE JOURNEE...
    














































































