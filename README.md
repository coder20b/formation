# formation

Formation Dev Fullstack

## github

Repository Github:

https://github.com/coder20b/formation

## liveshare

    jeudi 26/11

https://prod.liveshare.vsengsaas.visualstudio.com/join?50B58DC1A581D0F7F48F99268580DE967589

## Questions ?

## RESUME DE L'EPISODE PRECEDENT

    BRAVO. ON A AJOUTE LE 5E LANGAGE : SQL!
    HTML
    CSS
    JS
    PHP
    SQL

    IL VOUS RESTE 2 MOIS POUR MELANGER LES 5 LANGAGES ET CREER DES SITES REALISTES.

    SQL: Structured Query Language
    Langage de Requêtes Structurées

    LE MONDE DES BASES DE DONNEES: MySQL / MariaDB

    STRUCTURE D'UNE BASE DE DONNEES:
    => EN STANDARD: 1 DATABASE POUR 1 PROJET

    Database
        Table
            colonne1    colonne2    colonne3
            ligne1
            ligne2
        newsletter
            id          nom         email           ...    
            1           nom0943     mail0943@me     ...

    AVEC PHP, ON A PHPMYADMIN
    => OUTIL TECHNIQUE POUR LES DEV
    => PERMET DE GERER NOS BDDs
    => DISPONIBLE SUR LA PLUPART DES HEBERGEUR MUTUALISES

    http://localhost:8888/phpmyadmin/

    database: blog
        tables:
            newsletter
            contact

    AVEC LE LANGAGE SQL, ON ECRIT DU CODE SQL
    => REQUETES SQL

    Create          INSERT INTO...
    Read            SELECT...
    Update          UPDATE...
    Delete          DELETE...

    https://sql.sh/
    https://sql.sh/cours/insert-into
    https://sql.sh/cours/select
    https://sql.sh/cours/update
    https://sql.sh/cours/delete

    AVEC PHP, ON VA CREER DU CODE SQL
    ET ON VA L'ENVOYER AU SERVEUR MySQL (ou MariaDB)

## DRIVER ENTRE PHP ET MYSQL

    2 POSSIBILITES
    * mysqli
        https://www.php.net/manual/fr/book.mysqli.php
        => FONCTIONNEL
        => ET AUSSI PROGRAMMATION ORIENTE OBJET
        => SPECIALISE POUR MySQL

    * PDO
        https://www.php.net/manual/fr/ref.pdo-mysql.php
        => SEULEMENT ORIENTE OBJET
        => PERMET D'UTILISER PLUS DE BDD QUE SEULEMENT MySQL
        => NOTRE CHOIX POUR PHP

## EXERCICE: FORMULAIRE DE CONTACT

    AJOUTER LE CODE PHP POUR LE FORMULAIRE DE CONTACT
    POUR ENREGISTRER LES INFOS DANS LA TABLE SQL contact

    ENSUITE COMPARER LES CODES ENTRE LES 2 TRAITEMENTS 
    ET DETECTER LES REPETITIONS
    ET REFLECHIR A UNE FONCTION POUR CENTRALISER LE CODE...


    PAUSE ET REPRISE A 11H15...

## FRAMEWORK

    BIBLIOTHEQUE DE CODE => FONCTIONS
    ET UNE ORGANISATION DU CODE EN DOSSIERS ET SOUS-DOSSIERS
    => CONSTRUIRE UN FRAMEWORK

    DANS LA REALITE, ON NE CONSTRUIT PAS SON FRAMEWORK, 
    MAIS ON UTILISE UN FRAMEWORK EXISTANT
    => EN FIN DE FORMATION, VOUS ALLEZ UTILISER SYMFONY


    PAUSE DEJEUNER ET REPRISE A 13H50...

## CODE HTML input type="hidden"


    ON PEUT AJOUTER DANS UNE BALISE form
    DES CHAMPS input AVEC type="hidden"
    POUR AJOUTER DES INFOS TECHNIQUES PRE-REMPLIS
    ET LE VISITEUR NE VERRA CES CHAMPS
    MAIS QUAND IL VA ENVOYER LE FORMULAIRE
    LES INFOS SERONT TOUTES ENVOYEES

    exemple:
            <input type="hidden" name="formIdentifiant" value="newsletter">
    
    ON VA AJOUTER UN CHAMP A CHAQUE FORMULAIRE POUR DONNER UN IDENTIFIANT DIFFERENT.

    


















































































