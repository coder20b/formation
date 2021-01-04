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


    AVANCEE SUR LA PARTIE MODEL
    * SOIT ON REGARDE CHAQUE PARTIE DU CRUD SEPAREMENT
    * SOIT ON REGARDE L'ENSEMBLE DU CRUD AVEC LE make:crud

## PERSISTENCE: STOCKAGE D'INFOS DE MANIERE DURABLE

    EN PRATIQUE: PERSISTENCE => ENREGISTRER LES INFOS DANS LA TABLE SQL...

    https://symfony.com/doc/current/doctrine.html#persisting-objects-to-the-database

    CREER UN CONTROLLER POUR RANGER NOTRE CODE...

    php bin/console make:controller ProductController

    => CREATION DES FICHIERS
    created: src/Controller/ProductController.php
    created: templates/product/index.html.twig

    ET DANS LE NAVIGATEUR, ON PEUT VOIR LA NOUVELLE PAGE /product
    http://localhost:8888/symfony/public/product

    ET ENSUITE AJOUTER LE CODE POUR LE SCENARIO CREATE...

```php

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="create_product")
     */
    public function createProduct(): Response
    {
        // SCENARIO: CREATE

        // ETAPE 1: JE RANGE MES INFOS DANS UN OBJET
        $product = new Product();           // JE CREE UN OBJET A PARTIR DE LA CLASSE Product
        $product->setName('Keyboard');      // JE PASSE PAR LES SETTERS POUR STOCKER LES INFOS DANS LES PROPRIETES DE L'OBJET
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // ETAPE 2: PERSISTENCE ENTRE PHP ET SQL
        // => SYNCHRONISER LA DATABASE AVEC LES INFOS PHP

        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();    // LE INSERT SQL VA CREER UN NOUVEL id 
                                    // ET SYMFONY SYNCHRONISE NOTRE OBJET $product AVEC CET id
        // ENSUITE, JE PEUX UTILISER LA METHODE GETTER getId POUR OBTENIR L'id DE LA LIGNE AJOUTE

        return new Response('Saved new product with id '.$product->getId());
    }
}

```

## READ

    https://symfony.com/doc/current/doctrine.html#fetching-objects-from-the-database

```php


    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show(int $id): Response
    {
        // DANS LE NAVIGATEUR, ON DEMANDE CETTE URL
        // http://localhost:8888/symfony/public/product/2
        // DANS SYMFONY, ON A UNE ROUTE PARAMETREE
        // @Route("/product/{id}", name="product_show")
        // => SYMFONY VA APPELER LA METHODE show(2)
        // => EN PHP, ON AURA COMME PARAMETRE $id = 2 

        // ENSUITE, ON PEUT UTILISER $id POUR FAIRE UNE REQUETE SELECT
        // => find($id)
        // SYMFONY VA CREER LA REQUETE SQL
        // SELECT * FROM product WHERE id = 2
        // => ET ENSUITE, SYMFONY RECUPERE LES INFOS SQL DANS L'OBJET $product
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        // ET ENSUITE ON PEUT UTILISER LES METHODES GETTERS POUR RECUPERER LES INFOS SQL
        return new Response('Check out this great product: '.$product->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

```


## UPDATE

    https://symfony.com/doc/current/doctrine.html#updating-an-object



## DELETE

    https://symfony.com/doc/current/doctrine.html#deleting-an-object


## EXEMPLE CRUD DANS UNE SEULE CLASSE...

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="create_product")
     */
    public function createProduct(ValidatorInterface $validator): Response
    {
        // INJECTION DE DEPENDANCE
        // => SYMFONY CREE L'OBJET $validator POUR NOUS
        // ET FOURNIT L'OBJET EN PARAMETRE DE LA METHODE
        // (ON NE FAIT LE new POUR CREER L'OBJET...)

        // SCENARIO: CREATE

        // ETAPE 1: JE RANGE MES INFOS DANS UN OBJET
        $product = new Product();           // JE CREE UN OBJET A PARTIR DE LA CLASSE Product
        $product->setName('Keyboard');      // JE PASSE PAR LES SETTERS POUR STOCKER LES INFOS DANS LES PROPRIETES DE L'OBJET
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // ETAPE 2: PERSISTENCE ENTRE PHP ET SQL
        // => SYNCHRONISER LA DATABASE AVEC LES INFOS PHP

        // VERIF DES ERREURS DANS L'OBJET $product
        $errors = $validator->validate($product);
        if (count($errors) == 0) 
        {
            // you can fetch the EntityManager via $this->getDoctrine()
            // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
            $entityManager = $this->getDoctrine()->getManager();
            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($product);
            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();    // LE INSERT SQL VA CREER UN NOUVEL id 
                                        // ET SYMFONY SYNCHRONISE NOTRE OBJET $product AVEC CET id
            // ENSUITE, JE PEUX UTILISER LA METHODE GETTER getId POUR OBTENIR L'id DE LA LIGNE AJOUTE

            return new Response('Saved new product with id '.$product->getId());
        }
        else
        {
            // ERREUR DE VALIDATION
            return new Response((string) $errors, 400);
        }
    }


    /**
     * @Route("/productV2/{id}", name="product_showV2")
     */
    public function showV2(Product $product): Response
    {
        // use the Product!
        // ...
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        // ET ENSUITE ON PEUT UTILISER LES METHODES GETTERS POUR RECUPERER LES INFOS SQL
        return new Response('Check out this great product: '.$product->getName());
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show(int $id): Response
    {
        // DANS LE NAVIGATEUR, ON DEMANDE CETTE URL
        // http://localhost:8888/symfony/public/product/2
        // DANS SYMFONY, ON A UNE ROUTE PARAMETREE
        // @Route("/product/{id}", name="product_show")
        // => SYMFONY VA APPELER LA METHODE show(2)
        // => EN PHP, ON AURA COMME PARAMETRE $id = 2 

        // ENSUITE, ON PEUT UTILISER $id POUR FAIRE UNE REQUETE SELECT
        // => find($id)
        // SYMFONY VA CREER LA REQUETE SQL
        // SELECT * FROM product WHERE id = 2
        // => ET ENSUITE, SYMFONY RECUPERE LES INFOS SQL DANS L'OBJET $product
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        // ET ENSUITE ON PEUT UTILISER LES METHODES GETTERS POUR RECUPERER LES INFOS SQL
        return new Response('Check out this great product: '.$product->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }


    /**
     * @Route("/product/edit/{id}")
     */
    public function update(int $id): Response
    {
        // DANS LE NAVIGATEUR, ON DEMANDE COMME URL
        // http://localhost:8888/symfony/public/product/edit/3
        // DANS SYMFONY, ON A UNE ROUTE AVEC PARAMETRE
        //      * @Route("/product/edit/{id}")
        // => SYMFONY APPELLE LA METHODE update(3)
        // => DANS LA METHODE JE PEUX UTILISER LE PARAMETRE $id=3

        // JE PEUX $id POUR RETROUVER LA BONNE LIGNE SQL AVEC find
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        // ENSUITE JE PEUX UTILISER LES METHODES SETTERS POUR MODIFIER LES INFORMATIONS
        $product->setName('New product name!');

        // ENFIN ON SYNCHRONISE LA TABLE SQL AVEC flush
        $entityManager->flush();

        // ON FAIT UNE REDIRECTION VERS LA ROUTE product_show
        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
    }


    /**
     * @Route("/product/delete/{id}", name="product_delete")
     */
    public function delete(int $id): Response
    {
        // DANS LE NAVIGATEUR, ON DEMANDE CETTE URL
        // http://localhost:8888/symfony/public/product/delete/2
        // DANS SYMFONY, ON A UNE ROUTE PARAMETREE
        // @Route("/product/delete/{id}", name="product_delete")
        // => SYMFONY VA APPELER LA METHODE delete(2)
        // => EN PHP, ON AURA COMME PARAMETRE $id = 2 

        // ENSUITE, ON PEUT UTILISER $id POUR FAIRE UNE REQUETE SELECT
        // => find($id)
        // SYMFONY VA CREER LA REQUETE SQL
        // SELECT * FROM product WHERE id = 2
        // => ET ENSUITE, SYMFONY RECUPERE LES INFOS SQL DANS L'OBJET $product
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        // ET ENSUITE ON PEUT UTILISER LES METHODES GETTERS POUR RECUPERER LES INFOS SQL
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($product);
        $entityManager->flush();

        return new Response('ligne supprimée: ' . $id);

    }

}



```

## GENERATEUR DE CRUD SUR UNE ENTITE

    php bin/console make:crud Product


    created: src/Controller/ProductController.php
    created: src/Form/ProductType.php
    created: templates/product/_delete_form.html.twig
    created: templates/product/_form.html.twig
    created: templates/product/edit.html.twig
    created: templates/product/index.html.twig
    created: templates/product/new.html.twig
    created: templates/product/show.html.twig

    => SYMFONY CREE TOUT UN CRUD QUI FONCTIONNE
    => IL FAUDRA LE COMPLETER...


## BOOTSTRAP v4 ET SYMFONY

https://symfony.com/doc/current/form/bootstrap4.html

    CHANGER LA CONFIG DANS LE FICHIER config/packages/twig.yaml
    (ATTENTION: UNE INDENTATION DOIT SE FAIRE AVEC 4 ESPACES EXACTEMENT...)

```yaml
twig:
    default_path: '%kernel.project_dir%/templates'
    form_themes: ['bootstrap_4_layout.html.twig']
```

https://getbootstrap.com/docs/4.5/getting-started/introduction/

    ET COMPLETER LE FICHIER templates/base.html.twig

```twig
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{% block title %}Welcome!{% endblock %}</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">

        {% block stylesheets %}{% endblock %}
    </head>
    <body>
        <header class="container">
            <h1>MON TITRE 1</h1>
            <nav>
                <a href="{{ path('accueil') }}">accueil</a>
                <a href="{{ path('galerie') }}">galerie</a>
                <a href="{{ path('contact') }}">contact</a>
            </nav>
        </header>
        <main class="container">
        {% block body %}
            CONTENU PAR DEFAUT
        {% endblock %}
        </main>
        <footer class="container">
            <p>tous droits réservés</p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <script src="{{ asset('assets/js/script.js') }}"></script>

        {% block javascripts %}{% endblock %}
    </body>
</html>

```

    PAUSE ET REPRISE A 16H05...


## PAGE 404 ET SYMFONY

    https://symfony.com/doc/current/controller/error_pages.html

## ACTIVITES FIN DE JOURNEE...

    N'HESITEZ PAS A POSER DES QUESTIONS...

    AUTONOMIE
    * INDIVIDUELLE
        JOINTURES SQL
        SYMFONY ENTITE ET CRUD
            EXERCICE:
                AVEC LA COMMANDE 
                    make:entity
                CREER UNE ENTITE Contact
                    AVEC COMME PROPRIETES
                        nom             string
                        email           string
                        message         text
                        dateMessage     datetime
                ENSUITE CREER LA TABLE SQL AVEC LES COMMANDES
                    make:migration
                    doctrine:migrations:migrate
                ENSUITE CREER LE CRUD AVEC LA COMMANDE
                    make:crud
                VERIFIER QUE LES PAGES ADMIN/CRUD FONCTIONNENT CORRECTEMENT...

    * EQUIPE PROJETS
        TEMPLATES
        TABLES SQL ET RELATIONS
        SYMFONY OK ET KO ?


    * AUTRES IDEES ??



