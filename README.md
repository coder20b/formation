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

## ACTIVITE EN AUTONOMIE

    * METTRE LE CODE DU PROJET BLOG A NIVEAU AVEC LES FONCTIONS
    * AJOUTER LA PAGE blog.php ET CONSTRUIRE LE HTML
    * AJOUT UNE PAGE DE CREATION DE COMPTE ET ENREGISTREMENT DANS UNE TABLE SQL user

        TABLE SQL user
            id                  INT             INDEX=PRIMARY   A_I
            pseudo              VARCHAR(160)
            email               VARCHAR(160)
            motDePasse          VARCHAR(160)
            dateCreation        DATETIME

    * EXO DISTRIBUTEUR DE BILLETS AVEC JS ET RETRAIT ARGENT QUI AFFICHE BILLETS


## MySQL AVEC WORDPRESS ET IONOS

    ON VA UTILISER UN OUTIL ALTERNATIF A PHPMYADMIN POUR GERER LA DATABASE IONOS...
    ALLER SUR MA PAGE (PAS VOTRE SITE...)

    https://long-hai.procoder.fr/adminer.php

    ET ENTREZ LES IDENTIFIANTS POUR SE CONNECTER A LA DATABASE MySQL
    (LE MOT DE PASSE SERA SUR DISCORD... NE PAS LE PUBLIER...)

    -----------------------------
    Base de données : dbs1054940
    Description
    abdallah

    Nom d'hôte
    db5001233231.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu835626

    -----------------------------
    Base de données : dbs1054948

    Description
    alexandre

    Nom d'hôte
    db5001233239.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu683957

    -----------------------------
    Base de données : dbs1054960

    Description
    arsenio

    Nom d'hôte
    db5001233255.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu486272

    -----------------------------
    Base de données : dbs1054964

    Description
    benjamin

    Nom d'hôte
    db5001233259.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu831989

    -----------------------------
    Base de données : dbs1054967

    Description
    bilel

    Nom d'hôte
    db5001233262.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu831718

    -----------------------------
    Base de données : dbs1054974

    Description
    celine

    Nom d'hôte
    db5001233269.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu833786

    -----------------------------
    Base de données : dbs1054994

    Description
    christel

    Nom d'hôte
    db5001233282.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu836262

    -----------------------------
    Base de données : dbs1055038

    Description
    elphege

    Nom d'hôte
    db5001233305.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu828286

    -----------------------------
    Base de données : dbs1055051

    Description
    flora

    Nom d'hôte
    db5001233311.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu1470964

    -----------------------------
    Base de données : dbs1055062
    Description
    joseph

    Nom d'hôte
    db5001233314.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu1470989

    -----------------------------
    Base de données : dbs1055093
    Description
    kevin

    Nom d'hôte
    db5001233340.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu1471090

    -----------------------------
    Base de données : dbs1055100
    Description
    maeva

    Nom d'hôte
    db5001233346.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu488836

    -----------------------------
    Base de données : dbs1055103

    Description
    marc

    Nom d'hôte
    db5001233348.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu1471304

    -----------------------------
    Base de données : dbs1055107

    Description
    maxime

    Nom d'hôte
    db5001233351.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu1471375

    -----------------------------
    Base de données : dbs1055113

    Description
    mehdi

    Nom d'hôte
    db5001233355.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu1471395

    -----------------------------
    Base de données : dbs1055122

    Description
    olivier

    Nom d'hôte
    db5001233365.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu830080

    -----------------------------
    Base de données : dbs1055139

    Description
    quentin

    Nom d'hôte
    db5001233369.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu834805

    -----------------------------
    Base de données : dbs1055152

    Description
    stephanie

    Nom d'hôte
    db5001233374.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu1471447

    -----------------------------
    Base de données : dbs1055153

    Description
    tony

    Nom d'hôte
    db5001233375.hosting-data.io

    Port
    3306
    Nom d'utilisateur
    dbu831417

    -----------------------------












































































