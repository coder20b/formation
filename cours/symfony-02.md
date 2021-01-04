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

    mardi 22/12

https://prod.liveshare.vsengsaas.visualstudio.com/join?A5B97FAC4B4DE4B1EFCBA5F2BA40DB1700AF

## Questions ??

## RESUME DE L'EPISODE PRECEDENT

    * RELATIONS ENTRE 2 TABLES SQL
    ONE TO ONE              AJOUTER UNE COLONNE DE CLE ETRANGERE
    ONE TO MANY             AJOUTER UNE COLONNE DE CLE ETRANGERE
    MANY TO MANY            AJOUTER UNE TABLE TECHNIQUE ET DANS CETTE TABLE 2 COLONNES DE CLE ETRANGERE

    DANS LA PHASE DE MODELISATION DU PROJET
    => DETECTER LES MANY TO MANY RAPIDEMENT
    => CAR COUTEUX POUR LE PROJET (TEMPS ET RESSOURCES...)

    ENTRE 2 TABLES SQL SE POSER LA QUESTION:
    * POUR UNE LIGNE DE TABLE1 COMBIEN DE LIGNES SONT ASSOCIEES DANS TABLE2 ?
    * POUR UNE LIGNE DE TABLE2 COMBIEN DE LIGNES SONT ASSOCIEES DANS TABLE1 ?
    => REPONSES DONNENT LA CARDINALITE DE LA RELATION


    * SYMFONY
    
    https://symfony.com/doc/current/setup.html

    ON PASSE PAR L'OUTIL composer POUR INSTALLER LA BASE DE CODE DE symfony
    => composer OUTIL STANDARD DANS L'ECOSYSTEME PHP
    => INSTALLATION DES PACKAGES PHP DU CATALOGUE 
        https://packagist.org/

    DANS LE DOSSIER symfony
    ON A LE SOUS-DOSSIER public/
    => DOSSIER ACCESSIBLE AU NAVIGATEUR
    http://localhost:8888/symfony/public/
    => RACINE DU SITE

    (COMPLETER INSTALLER POUR AVOIR LE FICHIER public/.htaccess)

    ET ENSUITE ON COMMENCE A CREER DES PAGES...
    https://symfony.com/doc/current/page_creation.html


    LE NAVIGATEUR DEMANDE CETTE URL
    http://localhost:8888/symfony/public/galerie

    => LA MECANIQUE DE SYMFONY QUI VA CHERCHER LA ROUTE /galerie
    => ET NOUS AVONS ASSOCIE LA ROUTE /galerie AVEC LA METHODE galerie
    => SYMFONY APPELLE LA METHODE galerie
        => DECLENCHE LA METHODE render
        => CHARGE LE FICHIER DE TEMPLATE templates/vitrine/galerie.html.twig

```php

    /**
     * @Route("/galerie")
     */    
    function galerie ()
    {
        return $this->render("vitrine/galerie.html.twig");
    }

```

## PROGRAMME DE LA JOURNEE

    MATIN       symfony
    APREM       correction exam

    SQL:    jointures ??
    git:    bases ??
    ??


## SYMFONY ET MVC

    CONTROLLER ET ROUTES
    =>  src/Controller/
    
    VIEW
    =>  templates/
    
    MODEL
    =>  src/Entity/
    =>  src/Repository/

## LA CONSOLE SYMFONY

    OUTIL EN LIGNE DE COMMANDE (TERMINAL)
    => OUTIL PRATIQUE POUR LANCER DIVERS SCRIPTS
    => DONT GENERATEURS DE CODE... ;-p

    DANS LE DOSSIER bin
    OUVRIR UN TERMINAL ET ON PEUT LANCER LA COMMANDE 
    php console
    => AFFICHE LES OPTIONS

    php console make:controller
    => DONNER LE NOM DU CONTROLLER
        EXEMPLE Coucou
    => GENERE LE CODE PHP POUR LA CLASSE ET TWIG POUR LE TEMPLATE ;-p
    => BASE DE CODE ET LE DEV DOIT COMPLETER LE CODE ENSUITE...

```shell
php console make:controller

 Choose a name for your controller class (e.g. OrangeKangarooController):
 > Coucou

 created: src/Controller/CoucouController.php
 created: templates/coucou/index.html.twig


  Success!

```

## TWIG ET LES TEMPLATES PARENT ET ENFANT


    DANS LA STRUCTURE DE TWIG
    ON PEUT CREERUN SQUELETTE DE CODE HTML
    => LE TEMPLATE PARENT
    ET ON DEFINIT DES BLOCS A REMPLIR
    => LE TEMPLATE ENFANT HERITE DU TEMPLATE PARENT

    {% extends 'base.html.twig' %}

    => ET ENSUITE REMPLIT LES BLOCS DEFINIS DANS LE TEMPLATE PARENT
            AVEC SON CONTENU

    => ON PEUT CENTRALISER LE CODE COMMUN DANS LE TEMPLATE PARENT

    * DANS LE TEMPLATE PARENT

```twig
{% block stylesheets %}{% endblock %}
```

    * DANS LE TEMPLATE ENFANT

```twig
{% block stylesheets %}
<style>
h1 { 
    color orange;
}
</style>
{% endblock %}
```

    REMARQUE: SOUVENT ON AURA BESOIN DE PLUSIEURS TEMPLATES PARENTS
        (GENERALEMENT templates/base.html.twig SERVIRA POUR LA PARTIE ADMIN...)


    PAUSE ET REPRISE A 11H...

    * DOCUMENTATION SUR TWIG
    https://twig.symfony.com/doc/3.x/

    (MODULE INDEPENDANT => ON POURRAIT UTILISER TWIG SANS SYMFONY...)

## ASSETS (CSS, JS, IMAGES, etc...) AVEC TWIG ET SYMFONY

    https://symfony.com/doc/current/templates.html#linking-to-css-javascript-and-image-assets

    * asset
    https://symfony.com/doc/current/reference/twig_reference.html#asset


    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">

    <script src="{{ asset('assets/js/script.js') }}"></script>

    <img src="{{ asset('assets/img/article1.jpg') }}" alt="article1">


## MENU DE NAVIGATION ENTRE LES PAGES

    https://symfony.com/doc/current/templates.html#linking-to-pages

    DANS LA CLASSE CONTROLLER, ON DOIT DONNER A CHAQUE ROUTE UN NOM DIFFERENT POUR LES DISTINGUER
    ET ENSUITE DANS TWIG ON VA UTILISER LE NOM DE ROUTE POUR CREER LA BONNE URL

    ON VA UTILISER LA FONCTION path
    => POUR CREER DU CODE HTML AVEC DES URLS ABSOLUES

```html
            <nav>
                <a href="{{ path('accueil') }}">accueil</a>
                <a href="{{ path('galerie') }}">galerie</a>
                <a href="{{ path('contact') }}">contact</a>
            </nav>

```

    SI ON VEUT DES URLS COMPLETES (AVEC LE NOM DE DOMAINE...)
    ON PEUT UTILISER LA FONCTION url

    https://symfony.com/doc/current/reference/twig_reference.html#url


## AUTONOMIE JUSQU'A LA PAUSE DEJEUNER

    NE PAS HESITER A POSER DES QUESTIONS...

    * INDIVIDUEL: COMPRENDRE TOUTE LA MECANIQUE DE SYMFONY
        ROUTE ET CONTROLLER
        TWIG ET TEMPLATES PARENT ET ENFANT

        OBJECTIF: 
            CONSTRUIRE UN SITE VITRINE DE QUELQUES PAGES
            AVEC UN MENU POUR NAVIGUER ENTRE LES PAGES
            ET AVEC DU CSS ET DU JS EN PLUS DU HTML

    * PROJET EQUIPE:
        DETERMINER LES PAGES (URLS DES PAGES...)
        DETERMINER LES TEMPLATES
            => SEPARER LE CODE COMMUN DANS base.html.twig
        CONSTRUIRE LA MAQUETTE "VITRINE" DU SITE
            LES PAGES ET LA NAVIGATION ENTRE LES PAGES...


    PAUSE DEJEUNER ET REPRISE A 13H50

## QUESTIONS ??

## ACTIVITES POUR CET APREM...

    * correction exam
    * travail équipe
    * projet cms (login, cookie, ...)
    * git
    * autonomie
    * ???

    PAUSE ET REPRISE A 16H ?!

    => AUTONOMIE POUR L'APRES MIDI
        ET NE PAS HESITER A POSER DES QUESTIONS...

    FIN DE JOURNEE ET AUSSI FIN D'ANNEE...
    BONNES VACANCES ET BONNES FETES ;-p
    











































































