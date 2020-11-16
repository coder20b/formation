# formation

formation dev fullstack

## github

Repository Github:

https://github.com/coder20b/formation

## liveshare

https://prod.liveshare.vsengsaas.visualstudio.com/join?F7FCDDFA29808B142B1CF1D8A298A587C766

## WordPress - Jour 2

    Question: peut-on mélanger les modes non dev et dev ?
    Réponse: Oui, WP permet de progresser petit à petit vers le mode dev.
        Le choix du thème est très important, car le thème apporte des fonctionnalités spécifiques pour le dev.

## Pack Hébergement + Nom de domaine

conseil: ionos.fr Promo à 1 euro/mois pendant 1 an.
https://www.ionos.fr/


Budget à 5 euros HT/mois 
Illimité ;-p
https://www.o2switch.fr/



## SITE EN SOUS-DOMAINE

Chacun a un site en sous-domaine

Partie publique:
https://abdallah.procoder.fr/

Partie Admin:
https://abdallah.procoder.fr/wp-admin/

Login:  abdallah
mdp:    (adresse email dans cours.wf3.fr)


SITE PUBLIC:
https://maeva.procoder.fr/


SITE PUBLIC:
https://maeva.procoder.fr/wp-admin/

Login:  maeva
mdp:    (adresse email dans cours.wf3.fr)


SITE PUBLIC:
https://bilel.procoder.fr/


SITE ADMIN:
https://bilel.procoder.fr/wp-admin/

Login:  bilel

## Premier pas avec un site WP

On va utiliser le site procoder.fr pour mettre votre CV et votre portfolio

Accueil             / Votre CV en one page
Actus               / Blog
Portfolio           / Ajouter progressivement la liste de vos projets
Projet Boutique     / Exemple de page boutique en ligne (avec extension WooCommerce)
Contact             / Formulaire de Contact

## Choix Du thème WP

    CHOIX TRES IMPORTANT...
    * ENSEMBLE DE TEMPLATES
    * ENSEMBLE DE FONCTIONNALITES
        (LES FONCTIONNALITES MANQUANTES DEVRONT ETRE AJOUTEES AVEC DES EXTENSIONS/PLUGINS)

DU POINT DE VUE DU CLIENT (NON DEV...)
=> MEILLEUR CHOIX C'EST PRENDRE UN THEME SPECIALISE
=> IDEAL CHOISIR UN THEME QUI APPORTE +80% DU SITE DESIRE
=> CHOIX DANS LES THEMES GRATUITS
=> BUDGET AUTOUR DE 50 EUROS => THEME PAYANT

    https://themeforest.net/category/wordpress


DU POINT DE VUE D'UN DEV
=> MEILLEUR CHOIX C'EST PRENDRE UN PAGE BUILDER
=> THEME GENERIQUE (NON SPECIALISE...)
=> PARCE QU'UN THEME SPECIALISE NE PEUT PAS SE REUTILISER SUR DES PROJETS DIFFERENTS
=> UN THEME GENERIQUE (PAGE BUILDER) PERMET DE REUTILISER LE MEME THEME DANS PLEIN DE PROJETS DIFFERENTS
=> ON PEUT ACCUMULER UNE EXPERTISE SUR UN THEME GENERIQUE

    https://www.elegantthemes.com/documentation/divi/


    PAUSE ET REPRISE A 11H20...

## démarrer avec Divi

    Tuto en français
    https://wpformation.com/divi/

    Doc officielle en anglais
    https://www.elegantthemes.com/documentation/divi/


    STRUCTURE DANS DIVI

    SECTIONS
        LIGNES
            COLONNES
                MODULES
    SECTIONS
        LIGNES
            COLONNES
                MODULES
    SECTIONS
        LIGNES
            COLONNES
                MODULES


## EXERCICE EN AUTONOMIE

    CONSTRUIRE LA STRUCTURE DE LA PAGE D'ACCUEIL POUR AJOUTER LES SECTIONS DE VOTRE CV...


    BON APPETIT, REPRISE A 13H45 ;-p


## ARTICLE vs PAGE

    DANS WP, IL Y A UNE DIFFERENCE ENTRE LES PAGES ET LES ARTICLES.

    PAGES       => PARTIE SITE VITRINE
    ARTICLES    => PARTIE ACTUS/NEWS/BLOG

    WP VA REGROUPER LES ARTICLES POUR LES AFFICHER SUR LA PAGE DE BLOG.


## ARTICLE ET CATEGORIES ET TAGS


    QUAND ON CREE DES ARTICLES ET QU'ON LES RANGE DANS DES CATEGORIES
    => WP VA REMIXER LE CONTENU DE CES ARTICLES DANS DES NOUVELLES QUE WP CREE

    * LA PAGE QUI AFFICHE TOUS LES ARTICLES
    https://long-hai.procoder.fr/actus

    * LA PAGE CREEE PAR WP ET QUI AFFICHE SEULEMENT LES ARTICLES DANS LA CATEGORIE hebergement
    https://long-hai.procoder.fr/category/hebergement

    UX  => COOL POUR LES VISITEURS QUI PEUVENT CHOISIR LE CONTENU QUI LES INTERESSE
    SEO => PAS COOL POUR GOOGLE PARCE QU'IL CROIT QU'ON SE FOUT DE SA GUEULE
                CONSOMME DU TEMPS ET DES RESSOURCES CPU DE SCAN
                POUR DU CONTENU QUI EST SIMPLEMENT REMIXE 
                (PAS DU CONTENU NOUVEAU ET ORIGINAL... => DUPLICATE CONTENT)

    CONSEIL ACTUEL DES EXPERTS SEO:
    UTILISER LES CATEGORIES MAIS PAS LES TAGS/ETIQUETTES POUR LIMITER LES LIENS TRANSVERSES ET LE DUPLICATE CONTENT

    UN ARTICLE PEUT SE VOIR COMME UNE PAGE A PART
    (CHAQUE ARTICLE A SON URL => POUR GOOGLE UNE URL EST UNE PAGE)

    ET DANS WP, LES ARTICLES PEUVENT ETRE UTILISES COMME CONTENU D'UNE AUTRE PAGE.


## CLIENT ET ARTICLES

    LE DEV/INTEGRATEUR CONSTRUIT LES MAQUETTES AVEC DES MODULES DYNAMIQUES
    LE CLIENT VA JUSTE CREER DES ARTICLES ET LES RANGER DANS CERTAINES CATEGORIES
    WP ET LE THEME VONT DYNAMIQUEMENT REMETTRE LE CONTENU DES PAGES AVEC LES ARTICLES.
    => LE CLIENT N'A PAS A TOUCHER AUX MAQUETTES, IL SE CONCENTRE SEULEMENT SUR LE CONTENU.


## EXTENSIONS/PLUGINS ET WORDPRESS

COMPARAISON ENTRE UN SITE WP ET UNE VOITURE

MOTEUR                  NOYAU WP
CARROSSERIE VOITURE     THEME WP
OPTIONS                 EXTENSIONS WP

    UNE FOIS WORDPRESS ET LE THEME INSTALLE
    => TOUT CE QUI MANQUE DOIT ETRE FOURNI PAR LES EXTENSIONS...

    DANS WP ON NE PEUT AVOIR QU'UN SEUL THEME ACTIF
    MAIS ON POURRA ACTIVER PLUSIEURS EXTENSIONS EN MEME TEMPS.

    COMME LES THEMES
    => IL Y A DES CATALOGUES GRATUITS D'EXTENSIONS
    => ET IL Y A AUSSI DES CATALOGUES PAYANTS

    VOTRE PROJET WP EST UNE COMBINAISON DE TOUT CA
    (WP + THEME ACTIF + EXTENSIONS)

    => PEUT CREER PLEIN DE CONFLITS
    => PREMIER DANGER: TOUT PEUT EXPLOSER

    LA PLUPART DU TEMPS: UN THEME RECOMMANDE DES EXTENSIONS COMPATIBLES
    LA PLUPART DU TEMPS: UNE EXTENSION EST COMPATIBLE AVEC LES AUTRES EXTENSIONS ET AVEC LE THEME ACTIF

    => CONSEIL: IL VAUT MIEUX AVOIR UNE SAUVEGARDE DE SON SITE AVANT DE RAJOUTER UNE EXTENSION

    COMME ON PEUT ACTIVER PLEIN D'EXTENSIONS EN MEME TEMPS
    => LES CLIENTS ABUSENT
    => ON SE RETROUVE AVEC PLUSIEURS DIZAINES D'EXTENSIONS...
    => GARDER EN TETE QUE CHAQUE EXTENSION RALENTIT LE SITE
    => IDEAL: RESTER EN DESSOUS DE 10 EXTENSIONS
        ORDRE DE GRANDEUR, CHAQUE EXTENSION A UN IMPACT TRES VARIABLE SUR LES PERFORMANCES...

    => TESTER ET EVALUER SI LE SITE TIENT LE COUP...
    => SOUVENT: POUR UNE FONCTIONNALITE, ON AURA PLUSIEURS EXTENSIONS PLUS OU MOINS LEGERES...


## CATALOGUE GRATUIT DES EXTENSIONS

    https://wordpress.org/plugins/

    GOOGLE EST VOTRE AMI ;-p
    https://www.ionos.fr/digitalguide/hebergement/blogs/les-meilleurs-plugins-wordpress/



    PAUSE JUSQU'A 16H25 ET RESTE DE LA JOURNEE EN AUTONOMIE
    CREER DES ARTICLES ET DES CATEGORIES
    INSTALLER UNE EXTENSION (CALDERA FORMS...)































































































































































