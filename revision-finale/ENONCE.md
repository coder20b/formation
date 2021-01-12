## REVISION

    TOUT CODER EN POO...

    JOINTURES
    * ONE TO MANY   => 2 TABLES
    * MANY TO MANY  => 3 TABLES (DONT TABLE TECHNIQUE DE JOINTURE)

### EXO 1: CREER LA DATABASE

    DATABASE SQL revision_finale    CHARSET utf8mb4_general_ci
    * TABLE SQL user
        id                  INT                 => CLE PRIMAIRE
        pseudo              VARCHAR(160)
        email               VARCHAR(160)
        dateInscription     DATETIME

    * TABLE SQL annonce
        id                  INT             => CLE PRIMAIRE
        user_id             INT             => CLE ETRANGERE VERS TABLE user
        titre               VARCHAR(160)
        description         TEXT
        datePublication     DATETIME

    => CREER LA DATABASE ET LES 2 TABLES SQL
    => IL FAUT AJOUTER UNE PAGE CRUD POUR CHAQUE TABLE

### EXO 2: CREER LES PAGES CRUD 

    PARTIE ADMIN
        * 2 PAGES CRUD
                admin-user.php      => CRUD SUR user
                admin-annonce.php   => CRUD SUR annonce


    NE PAS OUBLIER DE PARAMETRER LE FICHIER .htaccess
    => METTRE A JOUR LE NOM DU DOSSIER

```

# SI DANS MON NAVIGATEUR
# http://localhost:8888/formation/revision-finale/
# NOUS DANS NOTRE CAS, ON A DES SOUS-DOSSIERS
# SEULE LIGNE A MODIFIER POUR NOUS ;-p
RewriteBase /formation/revision-finale/


```

    CREER LES PAGES ADMIN POUR user ET annonce
    => EN AUTONOMIE
    => CREER QUELQUES UTILISATEURS
            ET ENSUITE CREER QUELQUES ANNONCES ATTRIBUEES AUX UTILISATEURS

    => ET ENSUITE CREER LA PAGE D'ACCUEIL AVEC LES JOINTURES

    (NOTE: ECHANGE ENTRE MOI ET NICO CE VENDREDI... MOI VENDREDI ET NICOLAS MARDI 19...)
        
### EXO 3: AFFICHAGE AVEC JOINTURE

    PARTIE PUBLIQE
        *   accueil => AFFICHER LES ANNONCES ET AUSSI LE PSEUDO DE L'AUTEUR DE L'ANNONCE
                    => JOINTURE SQL ENTRE annonce ET user

    TABLE SQL 
        categorie
            id      INT
            label   VARCHAR(160)
    
    RELATION MANY TO MANY ENTRE annonce ET categorie
    * UNE ANNONCE PEUT ETRE CLASSEE DANS PLUSIEURS CATEGORIES
    * UNE CATEGORIE PEUT CONTENIR PLUSIEURS ANNONCES
    => MANY TO MANY
    => AJOUTER UNE TABLE TECHNIQUE

    TABLE SQL
        annonce_categorie
            id                  => CLE PRIMAIRE
            annonce_id          => CLE ETRANGERE VERS annonce
            categorie_id        => CLE ETRANGERE VERS categorie

    PARTIE ADMIN
        * 2 PAGES CRUD
                categorie
                annonce_categorie

    PARTIE PUBLIQE
        *   categorie => AFFICHER LES ANNONCES DANS LA CATEGORIE voiture
                => JOINTURE SQL ENTRE annonce ET categorie

