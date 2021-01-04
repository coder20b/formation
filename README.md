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

    lundi 04/01
    
https://prod.liveshare.vsengsaas.visualstudio.com/join?A7C481492523CABB7ED21B62A3D106DE7350

## Questions ??

## PLANNING DES PROCHAINES SEMAINES

MERCREDI 13/01  EXAMEN POO+SQL  FINAL

JEUDI 14/01                     PROJET
MARDI 19/ MERCEDI 20/ JEUDI 21  PROJET
MARDI 26/ MERCREDI 27/ JEUDI 28 PROJET

VENDREDI 29                     SOUTENANCE DE PROJET

COURS
* SQL JOINTURES (EXAMEN)
* CORRIGE EXAM INTERMEDIAIRE + ENTRAINEMENT (EXAM FINAL)
* PROJET CMS

* POO
* GIT
* SYMFONY


## JOINTURES SQL

    3 TYPES DE RELATIONS ENTRE TABLES SQL
    * ONE TO ONE
    * ONE TO MANY
    * MANY TO MANY

    ATTENTION: LES JOINTURES NE DEPENDENT PAS DES RELATIONS...

    LES JOINTURES SONT DES OPERATIONS DANS SQL POUR COMBINER LES INFOS DE DIFFERENTES TABLES

    https://sql.sh/cours/jointures

    AVANT ON UTILISAIT POUR LE SCENARIO READ

    SELECT * FROM article

    => LECTURE SUR UNE SEULE TABLE
    => SELECT CONSTRUIT UNE TABLE (TEMPORAIRE) DE RESULTATS

    AVEC LES JOINTURES, ON POURRA CONSTRUIRE CETTE TABLE DE RESULTATS A PARTIR DE PLUSIEURS TABLES SOURCES.

## INNER JOIN

    https://sql.sh/cours/jointures/inner-join

```sql

SELECT *
FROM table1
INNER JOIN table2 ON table1.id = table2.fk_id

```

    ON OBTIENT LES LIGNES DE table1 SI ELLES ONT UNE RELATION AVEC AU MOINS UNE LIGNE DE table2
    => IL SE PEUT QUE CERTAINES LIGNES DE table1 OU table2 SOIENT IGNOREES


    EXEMPLE PRATIQUE D'UTILISATION:
    * SI ON A UNE RELATION ONE TO MANY ENTRE user ET article
    (UN UTILISATEUR PEUT CREER PLUSIEURS ARTICLES / UN ARTICLE EST PUBLIE PAR UN SEUL USER)

    SI ON VEUT AFFICHER TOUS LES ARTICLES (titre, contenu, image) ET EN MEME TEMPS pseudo DU USER

```sql

SELECT *
FROM article
INNER JOIN user ON article.id_user = user.id

SELECT *
FROM user
INNER JOIN article ON user.id = article.id_user 

```

## LEFT JOIN

    https://sql.sh/cours/jointures/left-join


```sql

SELECT *
FROM table1
LEFT JOIN table2 ON table1.id = table2.fk_id

```

    ON OBTIENT TOUTES LES LIGNES DE table1 
        SI ELLES ONT UNE RELATION AVEC AU MOINS UNE LIGNE DE table2 ALORS LES COLONNES DE table2 SONT REMPLIES
        SINON LES COLONNES DE table2 SONT LAISSEES AVEC NULL
    => IL SE PEUT QUE CERTAINES LIGNES DE table2 SOIENT IGNOREES


## FILTRER AVEC WHERE

QUAND ON FAIT UNE JOINTURE, ON PEUT ENSUITE COMPLETER LA REQUETE 
EN FILTRANT LES LIGNES AVEC DES CONDITIONS DANS LA CLAUSE WHERE


```sql

SELECT *
FROM article
INNER JOIN user ON article.id_user = user.id
WHERE 
datePublication > '2021-01-01 00:00:00'
ORDER BY datePublication DESC
LIMIT 10
OFFSET 0

```

## RIGHT JOIN

    https://sql.sh/cours/jointures/right-join

    SYMETRIQUE DU LEFT JOIN

```sql

SELECT *
FROM table1
RIGHT JOIN table2 ON table1.id = table2.fk_id

```

## FULL JOIN

    https://sql.sh/cours/jointures/full-join

    VISION GENERALE
    => ON OBTIENT TOUTES LES LIGNES DE table1 ET AUSSI TOUTES LES LIGNES DE table2
    => MEME LES LIGNES QUI N'ONT PAS D'ASSOCIATION
    => PRATIQUE POUR DETECTER LES CAS "BIZARRES" OU AVEC ERREURS...
        (admin ou détection erreurs...)

```sql

SELECT *
FROM table1
FULL JOIN table2 ON table1.id = table2.fk_id

```

## ATTENTION: LES JOINTURES PEUVENT COMBINER N'IMPORTE QUELLES COLONNES

    EN PRATIQUE: ON UTILISE LES JOINTURES AVEC DES COLONNES DE CLE ETRANGERE
    MAIS ATTENTION: L'OUTIL DE JOINTURE FONCTIONNE AVEC N'IMPORTE QUELLE COLONNE
        => SI VOUS VOUS TROMPEZ DANS VOTRE REQUETE SQL 
        => VOUS AUREZ DES RESULTATS FAUX MAIS AUCUNE ERREUR SQL...


    PAUSE ET REPRISE A 11H20

## ONE TO MANY / ONE TO ONE : 2 TABLES

    UNE SEULE COLONNE DE CLE ETRANGERE
    => UNE REQUETE SELECT AVEC JOINTURE ENTRE 2 TABLES

## MANY TO MANY: 3 TABLES

    => REQUETE SELECT AVEC DOUBLE JOINTURES
    => LA REQUETE SQL EST COMPLIQUEE...

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


    ET LA REQUETE DOIT FAIRE 2 JOINTURES SUR 3 TABLES...

```sql

SELECT * FROM annonce
LEFT JOIN annonce_user ON annonce.id = annonce_user.id_annonce
LEFT JOIN user ON annonce_user.id_user = user.id

-- AUTRE POSSIBILITE POUR OBTENIR DES RESULTATS DIFFERENTS... ?

SELECT * FROM annonce
INNER JOIN annonce_user ON annonce.id = annonce_user.id_annonce
INNER JOIN user ON annonce_user.id_user = user.id

```

## SYMFONY ET ORM

    MVC
    CONTROLLER      src/Controller
    VIEW            templates/xxx.twig
    MODEL           => CLASSE => ENTITE (OU ENTITY EN ANGLAIS...)

    ORM
    Object          => POO Programmation Orienté Objet (PHP)
    Relation        => DATABASE SQL
    Mapping         => CORRESPONDANCE ENTRE LES 2 MONDES

    SQL                     POO
        TABLES                  Classes
            COLONNES                Propriétés d'Objet
                LIGNES                  Objets

    => DANS SYMFONY ON VA CREER DES CLASSES ET DES PROPRIETES D'OBJETS
    => ET SYMFONY FERA LA CORRESPONDANCE AVEC LES TABLES SQL...


```php
/*
    EXEMPLE:
        Table SQL user
        COLONNES
            id
            pseudo
            email
            niveau
            motDePasse
            dateCreation
*/


class User                          // => TABLE SQL
{
    // PROPRIETES D'OBJET           // => COLONNES SQL
    public $id = "";
    public $pseudo = "";
    public $email = "";
    public $niveau = "";
    public $motDePasse = "";
    public $dateCreation = "";
}   

// OBJETS                           // => LIGNES SQL
$user1 = new User;
$user1->id      = 5;
$user1->pseudo  = "test1430";
$user1->email   = "test1430@mail.me";
$user1->niveau  = 0;
$user1->motDePasse = '$2y$10$zokJgVRIlw7PilHIxIZbVOid8sOPslS6HdJb30ruRWa.M56MVlmCK';
$user1->dateCreation = "2020-12-16 14:30:56";

$user12 = new User;
$user12->id = 12;
// ...


```

## EN PRATIQUE: SYMFONY ET LE CODE MODEL...

    DOCUMENTATION OFFICIELLE AVEC SYMFONY
    https://symfony.com/doc/current/doctrine.html

    PROJET A PART...
    https://www.doctrine-project.org/

    SYMFONY S'APPUIE SUR LE CODE FOURNI PAR DOCTRINE...

    TUTO VIDEO (PAYANT...)
    https://symfonycasts.com/screencast/symfony-doctrine


### CONFIGURATION DU FICHIER .env

    https://symfony.com/doc/current/doctrine.html#configuring-the-database

    CHANGER LA LIGNE DE CONFIGURATION DANS LE FICHIER .env

```yaml

###> doctrine/doctrine-bundle ###
# Format described at https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
# IMPORTANT: You MUST configure your server version, either here or in config/packages/doctrine.yaml
#
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
# DATABASE_URL="postgresql://db_user:db_password@127.0.0.1:5432/db_name?serverVersion=13&charset=utf8"
# DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"
# modifier la ligne pour donner les bonnes infos de connexion avec SQL...
DATABASE_URL="mysql://root:@localhost:3306/symfony?serverVersion=mariadb-10.4.11&charset=utf8"
###< doctrine/doctrine-bundle ###

```

    ET ENSUITE, DANS VSCODE OUVRIR UN TERMINAL DANS LE DOSSIER DU PROJET (symfony/)
    ET ENTRER LA LIGNE DE COMMANDE

    php bin/console doctrine:database:create

    => SI TOUT SE PASSE BIEN, ON A UN MESSAGE DE CONFIRMATION
    => ET VERIFIER AVEC PHPMYADMIN QUE LA DATABASE EST BIEN CREEE...

    PS C:\xampp\htdocs\symfony> php bin/console doctrine:database:create
    Created database `symfony` for connection named default

### CREATION D'UNE ENTITE AVEC LA CONSOLE

    https://symfony.com/doc/current/doctrine.html#creating-an-entity-class

```

PS C:\xampp\htdocs\symfony> php bin/console make:entity

 Class name of the entity to create or update (e.g. VictoriousGnome):
 > Product
Product

 created: src/Entity/Product.php
 created: src/Repository/ProductRepository.php

 Entity generated! Now let's add some fields!
 You can always add more fields later manually or by re-running this command.

 New property name (press <return> to stop adding fields):
 > name

 Field type (enter ? to see all types) [string]:
 > ?
?

Main types
  * string
  * text
  * boolean
  * integer (or smallint, bigint)
  * float

Relationships / Associations
  * relation (a wizard will help you build the relation)
  * ManyToOne
  * OneToMany
  * ManyToMany
  * OneToOne

Array/Object Types
  * array (or simple_array)
  * json
  * object
  * binary
  * blob

Date/Time Types
  * datetime (or datetime_immutable)
  * datetimetz (or datetimetz_immutable)
  * date (or date_immutable)
  * time (or time_immutable)
  * dateinterval

Other Types
  * ascii_string
  * decimal
  * guid
  * json_array


 Field type (enter ? to see all types) [string]:
 > string
string  

 Field length [255]:
 >

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Product.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > price

 Field type (enter ? to see all types) [string]:
 > integer
integer
47mr
 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Product.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 >


           
  Success! 
           

 Next: When you're ready, create a migration with php bin/console make:migration

```

## CREER LE FICHIER DE MIGRATION SQL

    https://symfony.com/doc/current/doctrine.html#migrations-creating-the-database-tables-schema

    php bin/console make:migration

    ET ENSUITE EXECUTER LA MIGRATION SQL:

    php bin/console doctrine:migrations:migrate

```
PS C:\xampp\htdocs\symfony>  php bin/console make:migration


 
  Success! 
 

 Next: Review the new migration "migrations/Version20210104112705.php"
 Then: Run the migration with php bin/console doctrine:migrations:migrate
 See https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html




PS C:\xampp\htdocs\symfony> php bin/console doctrine:migrations:migrate

 WARNING! You are about to execute a database migration that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) 
[yes]:
 >

[notice] Migrating up to DoctrineMigrations\Version20210104112705
[notice] finished in 160.3ms, used 18M memory, 1 migrations executed, 1 sql queries



```

    PAUSE DEJEUNER ET REPRISE A 13H45















