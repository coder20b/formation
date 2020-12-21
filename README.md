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

https://prod.liveshare.vsengsaas.visualstudio.com/join?0BBE4A203EA5FD91D7CEB94B90EFD6B34D23

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
    


















































