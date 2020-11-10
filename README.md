# formation

formation dev fullstack

## github

Repository Github:

https://github.com/coder20b/formation

## liveshare

Lien VSCode Liveshare:

https://prod.liveshare.vsengsaas.visualstudio.com/join?B569AC6852F574B0D0A1F3C623CAD66FCB8B

## CMS: WordPress 

https://wordpress.org

## vision générale

    SITE WEB
    * langages front (navigateur) 
    ------ langages descriptifs -------
    * HTML
    * CSS
    ------ seuil de difficulté ------
    ------ langage de programmation ------
    * JS

    * langages back (serveur web)
    ------ langage de programmation ------
    * PHP
    ------ langage de requêtes ------
    * SQL


    SERVEUR WEB
    => HEBERGEMENT (ionos, ovh, gandi, etc...)
    => LAMP
    => Linux Apache MySQL PHP

    Prix : location moins de 100 euros / an
    (autour de 5 euros/mois)

## WORDPRESS est un CMS

    Content
    Management
    System

    Système
    Gestion
    Contenu

    WORDPRESS EST UN OUTIL/PROGRAMME CODE EN PHP ET SQL POUR PRODUIRE DES PAGES WEB (HTML, CSS, JS)
    WORDPRESS EST UN PROGRAMME CODE EN PHP ET SQL
    => INSTALLATION SUR LE SERVEUR WEB

    CREE EN 2003 PAR MATT MULLENWEG ET MIKE LITTLE
    OPEN SOURCE ET GRATUIT SOUS LICENCE GPL V3 
    => WORDPRESS.ORG

    MATT MULLENWEG A CREE UNE ENTREPRISE AUTOMATTIC
    CETTE ENTREPRISE UTILISE WORDPRESS POUR CREER LA PLATEFORME COMMERCIALE WORDPRESS.COM
    => WORDPRESS.COM

    WORDPRESS EST UN CMS => PERMET DE CREER DES SITES SANS CODER ;-p
    HISTORIQUEMENT => WORDPRESS SERT A CREER DES BLOGS

    DEPUIS WORDPRESS V3 => DEVENU UN VRAI CMS => POUR CREER TOUT TYPE DE SITE

https://w3techs.com/technologies/history_overview/content_management/all

https://techcrunch.com/2019/09/19/automattic-raises-300-million-at-3-billion-valuation-from-salesforce-ventures/

    WordPress vise les 80%

    WordPress rassemble un écosystème énorme
    => Communauté bienveillante d'entraide

    => WP permet à une équipe de travailler ensemble avec des compétences différentes
    => WP permet de compléter les compétences manquantes

    Meetup.com
    => DANS CHAQUE VILLE POUR S'ENTRAIDER

https://www.meetup.com/fr-FR/Marseille-WordPress-Meetup/members/?op=leaders

    WordCamp
    => JOURNEES DE CONFERENCE

https://marseille.wordcamp.org/


## LE CODE DE WP

    Dans un CMS, il y a un Framework + Back Office

https://www.openhub.net/p/wordpress

    Actuellement +1.300.000 lignes de code

## telechargement du code

https://fr.wordpress.org/download/

https://fr.wordpress.org/latest-fr_FR.zip

## TELECHARGEMENT DE XAMPP

https://www.apachefriends.org/fr/index.html

    7.4.11

    PAUSE ET REPRISE A 11H20

## INSTALLATION DE SERVEUR WEB POUR LE DEV

    * DEMARRER LE SERVEUR WEB (APACHE ET MySQL/MariaDB)
    * DANS LE NAVIGATEUR: VERIFIER LA PAGE http://localhost/
        PARFOIS IL FAUT AJOUTER LE PORT http://localhost:8888/
    * VERIFIER LA VERSION DE PHP AU MOINS 7.3, IDEALEMENT 7.4.11
        AVEC XAMPP: http://localhost:8888/dashboard/phpinfo.php
    * VERIFIER PHPMYADMIN
        AVEC XAMPP: http://localhost:8888/phpmyadmin/

    ASTUCE: AJOUTER CES URLS DANS VOS FAVORIS DE VOTRE NAVIGATEUR

## INSTALLATION DE WORDPRESS

    DEZIPPER LE FICHIER TELECHARGE .zip
    ET VERIFIER QU'ON A BIEN UN DOSSIER wordpress/ QUI CONTIENT PLEIN DE FICHIERS .php etc...

    COPIER LE DOSSIER wordpress/ DANS LE DOSSIER RACINE DU SERVEUR WEB
        SUR XAMPP: C:\xampp\htdocs\
    ON DOIT AVOIR AU FINAL
        SUR XAMPP: C:\xampp\htdocs\wordpress\
        ET TOUS LES FICHIERS...
        C:\xampp\htdocs\wordpress\index.php
        
    SI ON A COPIE LE DOSSIER AU BON ENDROIT, DANS LE NAVIGATEUR, 
    ON PEUT VOIR UNE PAGE D'INSTALLATION DE WORDPRESS
        http://localhost:8888/wordpress/


## PHPMYADMIN

    ALLER SUR LE NAVIGATEUR
    AVEC XAMPP:
    http://localhost:8888/phpmyadmin/

    CREER UNE BASE DE DONNEES wordpress 
        ET VERIFIER QUE LE CHARSET EST utf8mb4_general_ci


    GENERALEMENT LE NOM D'UTILISATEUR EST root

    SUR XAMPP:  LE MOT DE PASSE EST VIDE
    SUR MAMP: LE MOT DE PASSE EST root

    HOTE: GENERALEMENT C'EST localhost
        DES FOIS, IL FAUT METTRE 127.0.0.1

    PREFIXE DE TABLE: LAISSER TEL QUEL...

    REMPLIR LE FORMULAIRE
        ATTENTION AU MOT DE PASSE (ENLEVER LE TEXTE PAR DEFAUT...)

    ENSUITE SUR L'ECRAN SUIVANT DES INFOS DU SITE
    BIEN NOTER LES IDENTIFIANTS

    identifiant:
        long-hai
    
    mdp:
        Ytqpe#nskRiOLeO0gc

    COCHER LA CASE POUR NE PAS REFERENCER LE SITE...

    ET ENSUITE L'INSTALLATION DOIT SE FINIR
    ET SE CONNECTER AVEC LES IDENTIFIANTS...

## 2 PARTIES SEPAREES DANS WORDPRESS

    ADMIN:

http://localhost:8888/wordpress/wp-admin/

    PUBLIQUE:

http://localhost:8888/wordpress/


## PARAMETRER WORDPRESS SUIVANT LE PROJET

    ET SI ON CREE UNE BOUTIQUE EN LIGNE POUR 1500 EUROS ?

    PAGES:
    * Accueil
    * Actus
    * Boutique
    * Contact

    SITE VITRINE ET AVEC ESPACE BOUTIQUE

    => SITE DYNAMIQUE
    => A CHAQUE VISITE WORDPRESS RECONSTRUIT LA PAGE A AFFICHER

    => LE CLIENT/DEV VA CREER LE CONTENU
    => WORDPRESS VA CONSTRUIRE/ASSEMBLER LE CONTENU AVEC UN TEMPLATE
        POUR PRODUIRE LA PAGE AFFICHEE AU VISITEUR


    UN SITE INTERNET EST UN ENSEMBLE DE PAGES
    LE VISITEUR VA POUVOIR NAVIGUER ENTRE LES PAGES GRACE A DES MENUS

    * JEUX VIDEOS
    PHOTOS
    BRIC A BRAC -50 EUROS

    * PERSONA CLIENT
    JEUNE 25-35 ANS DEJA BOUTIQUE PHYSIQUE NON ESSENTIELLE ET FERME POUR CONFINEMENT
    JEUX VIDEOS
    A FOND DANS LES NOUVELLES TECHNOS
    GEEK
    RESEAUX SOCIAUX
    BUDGET 1500 EUROS
    JEUX PHYSIQUES OCCASION

    * PERSONA(S) VISITEUR(S)
    JEUNE 15-20 ANS
    JEUX VIDEOS
    GEEK
    RESEAUX SOCIAUX
    BUDGET 0 EUROS - 30 EUROS

    => REDIGER LE CONTENU DES PAGES
    => TROUVER LES PHOTOS D'ILLUSTRATION

### CONTENU DES PAGES => PAGE BUILDERS

    POUR AJOUTER DU CONTENU DANS UNE PAGE WORDPRESS
    => OUTIL PAGE BUILDER (CONSTRUCTEUR DE PAGES)
    => GUTENBERG

    DANS L'ECOSYSTEME WP, IL Y AVAIT PLEIN DE PAGE BUILDERS (COMME EXTENSIONS)
    * Divi
    * Elementor
    * Beaver Builder
    * etc...

    AUTOMATTIC A POUSSE POUR INTEGRER UN PAGE BUILDER DANS WORDPRESS
    => EN CONSTRUISANT UN NOUVEL PAGE BUILDER

    => MAUVAIS ACCUEIL
    => CONCURRENCE DIRECTE AVEC DES PAGES BUILDERS PAYANTS (ILS VONT MOURIR ?)
    => UNE PARTIE DE LA COMMUNAUTE N'A PAS BESOIN DE PAGE BUILDER
    => GUTENBERG EST ENCORE EN DEVELOPPEMENT RAPIDE
        (1 AN DEPUIS SON INTEGRATION DANS LE NOYAU...)


## ECOSYSTEME WORDPRESS

    IL Y A DES POSSIBILITES POUR TOUS LES BUDGETS

    * 0 EUROS
    * 100 EUROS
    * 1000 EUROS
    * 10.000 EUROS
    * etc...

## PERSONNALISATION D'UN PROJET

    WORDPRESS EST MODULAIRE
    SI ON COMPARE WP A UNE VOITURE
    * WP EST LE MOTEUR
    * THEME EST LA CARROSSERIE
    * EXTENSIONS SONT LES OPTIONS

    WP EST UNE BASE QU'ON VA ENRICHIR DE PLEIN DE POSSIBILITES

### THEME

    WORDPRESS DELEGUE LA CREATION DES PAGES AU THEME
    => OUVRE ENORMEMENT DE LIBERTE AUX DEVELOPPEURS ET AUX DESIGNERS

    UN THEME PROPOSE UN ENSEMBLE DE TEMPLATES
    ON PEUT AVOIR PLUSIEUS THEMES INSTALLES
    MAIS ON NE PEUT AVOIR QU'UN SEUL THEME ACTIF.

    LE CMS GARDE LE CONTENU DEJA AJOUTE
    LE THEME UTILISE CE CONTENU POUR L'INSERER DANS SES TEMPLATES

### CATALOGUE GRATUIT

    IL Y A DES MILLIERS DE THEMES DISPONIBLES

    https://wordpress.org/themes/

    ATTENTION A LA SECURITE:
    * PRENDRE UN THEME POPULAIRE (POUR NE PAS ESSUYER LES PLATRES)
    * VERIFIER LES DATES DE MISES A JOUR (EVITER SI ABANDONNE +1 AN...)

### CATALOGUES DE THEMES PAYANTS

https://themeforest.net/category/wordpress

    AUTOUR DE 50 EUROS LE THEME... POUR UN SITE

    CONSEIL AUX DEV: ALLER SUR LE SITE DE DEMO ET INSPECTER LA QUALITE DU CODE HTML, CSS ET JS

### ELEGANT THEMES ET DIVI

    PAGE BUILDER
    LICENCE LIFETIME (ILLIMITEE) A 250$


    PAUSE JUSQU'A 16H16...


    INSTALLATION A LA MAIN
    COPIER LE DOSSIER Divi DANS LE SOUS-DOSSIER

    wordpress/wp-content/themes/



















































































































